<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
        
    }

    // =========================
    // ALL BOOKINGS
    // =========================
    public function index()
    {
        $this->db->select('bookings.*, customers.first_name as customer_name, customers.phone');
        $this->db->from('bookings');
        $this->db->join('customers', 'customers.customer_id = bookings.customer_id', 'left');
        $this->db->order_by('bookings.booking_id', 'DESC');

        $data['bookings'] = $this->db->get()->result();

        $this->load->view('bookings/index', $data);
    }



  public function create()
{
    $user = $this->session->userdata('user');    
    $customer_id = $user['customer_id'];

    if (!$customer_id) {
        redirect('auth/booking');
    }
    
    $data['customer'] = $this->db
        ->where('customer_id', $customer_id)
        ->get('customers')
        ->row();

    $data['tables'] = $this->db->get('tables')->result(); 

    $this->load->view('portal/booking', $data);
}

public function get_available_dates()
{
    // Parse JSON payload coming from the JavaScript Fetch API
    $input = json_decode(file_get_contents("php://input"), true);

    $table = isset($input['table_number']) ? (int)$input['table_number'] : null;
    $time  = $input['booking_time'] ?? null;

    // Fallback: If absolutely no table is provided, return empty
    if (!$table) {
        echo json_encode([
            'allow_all'       => true,
            'allowed_dates'   => [],
            'booked_dates'    => []
        ]);
        return;
    }

    $booked_dates = [];

    // 1. Fetch booked dates ONLY if a time slot is explicitly selected
    if ($time) {
        $query_booked = $this->db->select('booking_date')
            ->from('bookings')
            ->where('table_number', $table)
            ->where('booking_time', $time)
            ->where('status', 'Confirmed')
            ->get()
            ->result_array();
            
        $booked_dates = array_column($query_booked, 'booking_date');
    }

    // 2. Evaluate Seasonal Restriction Rules (Tables 38 to 42)
    if ($table >= 38 && $table <= 42) {
        
        $query_allowed = $this->db->select('available_date')
            ->from('table_available_dates')
            ->where('table_number', $table)
            ->order_by('available_date', 'ASC')
            ->get()
            ->result_array();

        $allowed_dates = array_column($query_allowed, 'available_date');

        echo json_encode([
            'allow_all'       => false, // Forces restriction to holiday/seasonal rules immediately
            'allowed_dates'   => $allowed_dates,
            'booked_dates'    => $booked_dates 
        ]);
        return;
    }

    // 3. Normal Tables configuration (1-37 and 43+)
    // If it's a normal table but no time is selected yet, we treat it as fully open until they pick a time.
    echo json_encode([
        'allow_all'       => true, 
        'allowed_dates'   => [],
        'booked_dates'    => $booked_dates
    ]);
}

public function store()
{
    //$customer_id = $this->session->userdata('customer_id');

    // if (!$customer_id) {
    //     redirect('login');
    // }

    // // =========================
    // // CUSTOMER INFO
    // // =========================
    // $customer = $this->db
    //     ->where('customer_id', $customer_id)
    //     ->get('customers')
    //     ->row();

    // if (!$customer) {
    //     $this->session->set_flashdata('error', 'Customer account not found.');
    //     redirect('login');
    // }

    // =========================
    // INPUTS
    // =========================

    $customer_id =$this->input->post('customer_id');
    $table_number  = (int) $this->input->post('table_number', TRUE);
    $guests        = (int) $this->input->post('number_of_guests', TRUE);
    $booking_date  = $this->input->post('booking_date', TRUE);
    $booking_time  = $this->input->post('booking_time', TRUE);
    $arrival_time  = $this->input->post('arrival_time', TRUE);
    $guest_names   = $this->input->post('guest_names', TRUE);

    // =========================
    // BASIC VALIDATION
    // =========================
    if (empty($booking_date) || empty($booking_time) || empty($table_number)) {
        $this->session->set_flashdata('error', 'All fields are required.');
        redirect('bookings/create');
    }

    // =========================
    // GET TABLE + TYPE
    // =========================
    $table = $this->db
        ->where('table_number', $table_number)
        ->get('tables')
        ->row();

    if (!$table) {
        $this->session->set_flashdata('error', 'Invalid table selected.');
        redirect('bookings/create');
    }

   

    // =========================
    // CAPACITY RULE
    // =========================
    if ($table_number >= 11 && $table_number <= 39) {
        $max_guests = 10;
    } elseif (
        ($table_number >= 1 && $table_number <= 10) ||
        ($table_number >= 40 && $table_number <= 50)
    ) {
        $max_guests = 15;
    } else {
        $this->session->set_flashdata('error', 'Invalid table number.');
        redirect('bookings/create');
    }

    if ($guests > $max_guests) {
        $this->session->set_flashdata(
            'error',
            "Maximum {$max_guests} guests allowed for this table."
        );
        redirect('bookings/create');
    }

    // =========================
    // DUPLICATE TABLE CHECK
    // =========================
    $exists = $this->db->where([
        'table_number' => $table_number,
        'booking_date' => $booking_date,
        'booking_time' => $booking_time
    ])->count_all_results('bookings');

    if ($exists > 0) {
        $this->session->set_flashdata(
            'error',
            'This table is already booked for the selected time.'
        );
        redirect('bookings/create');
    }

    // =========================
    // MAX CONFIRMED BOOKINGS
    // =========================
    $confirmedCount = $this->db
        ->where('customer_id', $customer_id)
        ->where('status', 'Confirmed')
        ->count_all_results('bookings');

    if ($confirmedCount >= 2) {
        $this->session->set_flashdata(
            'error',
            'You can only have a maximum of 2 confirmed reservations at one time.'
        );
        redirect('bookings/create');
    }

    // =========================
    // TIME SLOT LIMIT (FIXED SQL)
    // =========================
    $timeSlotCheck = $this->db->query("
        SELECT b.booking_date, b.booking_time, COUNT(*) AS total_bookings
        FROM bookings b
        JOIN customers c ON b.customer_id = c.customer_id
        WHERE c.role = 'Member'
          AND c.customer_type = 'Non-Resident'
          AND b.status = 'confirmed'
          AND b.booking_date = '{$booking_date}'
          AND b.booking_time = '{$booking_time}'
        GROUP BY b.booking_date, b.booking_time
    ");

    $timeSlot = $timeSlotCheck->row();

    if ($timeSlot && $timeSlot->total_bookings >= 20) {
        $this->session->set_flashdata(
    'error',
    "You Cannot Book on {$booking_date} at {$booking_time} is fully booked. Only 20 bookings allowed per time slot. Please choose a different time or date."
);
        redirect('bookings/create');
    }

    // =========================
    // INSERT BOOKING
    // =========================
    $insert = $this->db->insert('bookings', [
        'reservation_no'   => $reservation_no,
        'customer_id'      => $customer_id,
        'booking_date'     => $booking_date,
        'booking_time'     => $booking_time,
        'table_number'     => $table_number,
        'number_of_guests' => $guests,
        'arrival_time'     => $arrival_time,
        'guest_names'      => $guest_names,
        'status'           => 'Confirmed'
    ]);
    $booking_id = $this->db->insert_id();
    if (!$insert) {
        $this->session->set_flashdata(
            'error',
            'Unable to create booking. Please try again.'
        );
        redirect('bookings/create');
    }

  
    // =========================
    // SUCCESS
    // =========================
    $this->session->set_flashdata('success', 'Booking created successfully.');
   
    redirect('bookings/checkout/'.$booking_id);
}

public function checkout($booking_id = null)
{
    if ($booking_id === null) {
        show_404();
    }

    $booking = $this->db
        ->where([
            'booking_id' => $booking_id,
            'status'     => 'Confirmed'
        ])
        ->join('customers', 'customers.customer_id = bookings.customer_id', 'left')
        ->get('bookings')
        ->row();

    if (!$booking) {
        // $this->session->set_flashdata('error', 'Booking not found or not confirmed.');
        // redirect('bookings');
        show_404();
    }

    $data['booking'] = $booking;

    $this->load->view('member/checkout', $data);
}

public function send_confirmation_email($booking_id)
{
    $booking = $this->db
        ->where([
            'booking_id' => $booking_id,
            'status'     => 'Confirmed',
            'mail_sent'  => 'No'
        ])
        ->join('customers', 'customers.customer_id = bookings.customer_id', 'left')
        ->get('bookings')
        ->row();

    if (!$booking) {
        return;
    }

    // =========================
        // EMAIL
        // =========================
        try {

            $this->load->library('email');

            $this->email->from(
                'hafizulah322@gmail.com',
                'Table Reservation System'
            );

            $this->email->to($booking->email);

            $this->email->subject('Reservation Confirmation #' . $booking_id);

            $message = '
            <html>
            <body>
                <h2>Reservation Confirmed</h2>

                <p>Dear ' . htmlspecialchars($booking->first_name) . ',</p>

                <p>Your reservation has been successfully confirmed.</p>

                <table border="1" cellpadding="8" cellspacing="0">
                    <tr><td><strong>Reservation No.</strong></td><td>' . $booking->booking_id . '</td></tr>
                    <tr><td><strong>Date</strong></td><td>' . $booking->booking_date . '</td></tr>
                    <tr><td><strong>Time Slot</strong></td><td>' . ucfirst($booking->booking_time) . '</td></tr>
                    <tr><td><strong>Table Number</strong></td><td>' . $booking->table_number . '</td></tr>
                    <tr><td><strong>Arrival Time</strong></td><td>' . $booking->arrival_time . '</td></tr>
                    <tr><td><strong>Guests</strong></td><td>' . $booking->number_of_guests . '</td></tr>
                </table>

                <p>Thank you for your reservation.</p>
            </body>
            </html>';

            $this->email->message($message);

            if($this->email->send()) {
                $this->db->where('booking_id', $booking_id);
                $this->db->update('bookings', ['mail_sent' => 'Yes']);
            }
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
        }
}
   
   

 public function cancel($booking_id = null)
{
    if (!$this->input->is_ajax_request()) {
        show_404();
    }

    if (empty($booking_id) || !is_numeric($booking_id)) {
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status'  => 'error',
                'message' => 'Invalid booking ID.'
            ]));
    }

    // Check if booking exists
    $booking = $this->db
        ->where('booking_id', $booking_id)
        ->get('bookings')
        ->row();

    if (!$booking) {
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status'  => 'error',
                'message' => 'Booking not found.'
            ]));
    }

    // Update status
    $updated = $this->db
        ->where('booking_id', $booking_id)
        ->update('bookings', [
            'status' => 'Cancelled'
        ]);

    return $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode([
            'status'         => $updated ? 'success' : 'error',
            'booking_id'     => $booking_id,
            'booking_status' => $updated ? 'Cancelled' : $booking->status,
            'message'        => $updated
                ? 'Booking cancelled successfully.'
                : 'Unable to cancel booking.'
        ]));


}


//     public function update_status_cron()
// {
//     if (!$this->input->is_cli_request()) {
//         return;
//     }

//     $today = date('Y-m-d');

//     // Get all expired bookings
//     $bookings = $this->db
//         ->where('booking_date <', $today)
//         ->where('status', 'Confirmed')
//         ->get('bookings')
//         ->result();

//     if (empty($bookings)) {
//         log_message('info', 'Cron: No bookings found');
//         return;
//     }

//     $this->load->library('email');

//     foreach ($bookings as $booking) {

//         // OPTIONAL: fetch customer if stored separately
//         $customer = $this->db
//             ->where('customer_id', $booking->customer_id)
//             ->get('customers')
//             ->row();

//         if (!$customer) {
//             log_message('error', 'Customer not found for booking ID ' . $booking->booking_id);
//             continue;
//         }

//         // Email config
//         $this->email->clear();
//         $this->email->from('hafizulah322@gmail.com', 'Table Reservation System');
//         $this->email->to($customer->email);

//         $this->email->subject('Reservation Completed #' . $booking->reservation_no);

//         $message = '
//         <html>
//         <body>
//             <h2>Reservation Completed</h2>

//             <p>Dear ' . htmlspecialchars($customer->first_name) . ',</p>

//             <p>Your reservation has been marked as completed.</p>

//             <table border="1" cellpadding="8" cellspacing="0">
//                 <tr><td><strong>Reservation No</strong></td><td>' . $booking->reservation_no . '</td></tr>
//                 <tr><td><strong>Date</strong></td><td>' . $booking->booking_date . '</td></tr>
//                 <tr><td><strong>Time</strong></td><td>' . $booking->booking_time . '</td></tr>
//                 <tr><td><strong>Table</strong></td><td>' . $booking->table_number . '</td></tr>
//             </table>

//             <br>
//             <p>Thank you.</p>
//         </body>
//         </html>';

//         $this->email->message($message);

//         if ($this->email->send()) {

//             // Update only this booking
//             $this->db->where('booking_id', $booking->booking_id)
//                      ->update('bookings', ['status' => 'Completed']);

//         } else {
//             log_message('error', 'Email failed for booking ID ' . $booking->booking_id);
//         }
//     }
// }






}//End of Bookings controller