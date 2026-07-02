<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings extends CI_Controller {

      public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->helper(['url', 'form']);

       $user = $this->session->userdata('user');

    if (
        !$this->session->userdata('logged_in') ||
        !$user ||
        $user['role'] != 'Admin'
    ) {

        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Unauthorized!');
        $this->session->set_flashdata('msg_text', 'You are not authorized to access');

        redirect('auth/admin');
    }
    
    }
   
  public function index()
{
    // BOOKINGS LIST
    $this->db->select('bookings.*, customers.first_name as customer_name, customers.phone');
    $this->db->from('bookings');
    $this->db->join('customers', 'customers.customer_id = bookings.customer_id', 'left');
    $this->db->order_by('bookings.booking_id', 'DESC');

    $data['bookings'] = $this->db->get()->result();

    // 🔥 STATUS COUNTS (ONE QUERY)
    $this->db->select('status, COUNT(*) as total');
    $this->db->from('bookings');
    $this->db->group_by('status');

    $result = $this->db->get()->result();

    $data['booking_counts'] = array_column($result, 'total', 'status');

    $this->load->view('admin/bookings/index', $data);
}
   public function get_customer()
{
    $customer_id = $this->input->post('customer_id');

    $customer = $this->db
        ->where('customer_id', $customer_id)
        ->get('customers')
        ->row();

    if ($customer) {
        echo json_encode([
            'status' => true,
            'customer' => $customer
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'msg' => 'Customer not found'
        ]);
    }
}

    public function create()
    {
        $data['tables'] = $this->db->get('tables')->result();

        $this->load->view('admin/bookings/create', $data);
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
        $customer_id = $this->input->post('customer_id');

        if (!$customer_id) {
            redirect('login');
        }

        // =========================
        // CUSTOMER VALIDATION
        // =========================
        $customer = $this->db
            ->where('customer_id', $customer_id)
            ->get('customers')
            ->row();

        if (!$customer) {
            $this->session->set_flashdata('error', 'Customer account not found.');
            redirect('admin/bookings/create');
        }

        // =========================
        // INPUTS
        // =========================
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
            redirect('admin/bookings/create');
        }

        // =========================
        // TABLE VALIDATION
        // =========================
        $table = $this->db
            ->where('table_number', $table_number)
            ->get('tables')
            ->row();

        if (!$table) {
            $this->session->set_flashdata('error', 'Invalid table selected.');
            redirect('admin/bookings/create');
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
            redirect('admin/bookings/create');
        }

        if ($guests > $max_guests) {
            $this->session->set_flashdata(
                'error',
                "Maximum {$max_guests} guests allowed for this table."
            );
            redirect('admin/bookings/create');
        }

        // =========================
        // DUPLICATE BOOKING CHECK
        // =========================
        $exists = $this->db->where([
            'table_number'  => $table_number,
            'booking_date'  => $booking_date,
            'booking_time'  => $booking_time
        ])->count_all_results('bookings');

        if ($exists > 0) {
            $this->session->set_flashdata(
                'error',
                'This table is already booked for the selected time.'
            );
            redirect('admin/bookings/create');
        }

        // =========================
        // MAX ACTIVE BOOKINGS PER CUSTOMER
        // =========================
        $confirmedCount = $this->db
            ->where('customer_id', $customer_id)
            ->where('status', 'confirmed')
            ->count_all_results('bookings');

        if ($confirmedCount >= 2) {
            $this->session->set_flashdata(
                'error',
                'You can only have a maximum of 2 confirmed reservations at one time.'
            );
            redirect('admin/bookings/create');
        }

        // =========================
        // SLOT LIMIT CHECK (SAFE QUERY)
        // =========================
        $this->db->select('COUNT(*) AS total_bookings');
        $this->db->from('bookings b');
        $this->db->join('customers c', 'b.customer_id = c.customer_id');
        $this->db->where('c.role', 'Member');
        $this->db->where('c.customer_type', 'Non-Resident');
        $this->db->where('b.status', 'confirmed');
        $this->db->where('b.booking_date', $booking_date);
        $this->db->where('b.booking_time', $booking_time);

        $timeSlot = $this->db->get()->row();

        if ($timeSlot && $timeSlot->total_bookings >= 20) {
            $this->session->set_flashdata(
                'error',
                "This slot is fully booked (20 limit reached). Please choose another time."
            );
            redirect('admin/bookings/create');
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
            'status'           => 'confirmed'
        ]);
        
        if (!$insert) {
            $this->session->set_flashdata(
                'error',
                'Unable to create booking. Please try again.'
            );
            redirect('admin/bookings/create');
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

        $this->email->to($customer->email);

        $this->email->subject('Reservation Confirmation #' . $reservation_no);

        $message = '
        <html>
        <body>
            <h2>Reservation Confirmed</h2>

            <p>Dear ' . htmlspecialchars($customer->first_name) . ',</p>

            <p>Your reservation has been successfully confirmed.</p>

            <table border="1" cellpadding="8" cellspacing="0">
                <tr><td><strong>Reservation No.</strong></td><td>' . $reservation_no . '</td></tr>
                <tr><td><strong>Date</strong></td><td>' . $booking_date . '</td></tr>
                <tr><td><strong>Time Slot</strong></td><td>' . ucfirst($booking_time) . '</td></tr>
                <tr><td><strong>Table Number</strong></td><td>' . $table_number . '</td></tr>
                <tr><td><strong>Arrival Time</strong></td><td>' . $arrival_time . '</td></tr>
                <tr><td><strong>Guests</strong></td><td>' . $guests . '</td></tr>
            </table>

            <p>Thank you for your reservation.</p>
        </body>
        </html>';

        $this->email->message($message);

        $this->email->send();

    } catch (Exception $e) {
        log_message('error', $e->getMessage());
    }
        // =========================
        // SUCCESS
        // =========================
        $this->session->set_flashdata('msg_type', 'Success');
        $this->session->set_flashdata('msg_title', 'Booked!');
        $this->session->set_flashdata('msg_text', 'Successfully Created Table Reservation & Mail Sent to Member');
        redirect('admin/bookings');
        
      
       
    }


  
    public function delete($id)
{
    if (!$this->input->is_ajax_request()) {
        show_404();
        return;
    }

    // optional: get status before delete (useful for UI refresh logic)
    $this->db->select('status');
    $this->db->from('bookings');
    $this->db->where('booking_id', $id);
    $booking = $this->db->get()->row();

    $this->db->where('booking_id', $id);
    $delete = $this->db->delete('bookings');

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode([
            'status' => $delete ? 'success' : 'error',
            'booking_status' => $booking->status ?? null
        ]));
}

    // =========================
    // UPDATE STATUS
    // =========================
    public function update_status($id, $status)
    {
        $this->db->where('booking_id', $id);
        $this->db->update('bookings', ['status' => $status]);

        $this->session->set_flashdata('success', 'Status updated successfully!');
        redirect('bookings');
    }

    // =========================
    // VIEW SINGLE BOOKING
    // =========================
    public function show($id)
    {
        $this->db->select('bookings.*, customers.first_name as customer_name, customers.phone, customers.email, customers.address');
        $this->db->from('bookings');
        $this->db->join('customers', 'customers.customer_id = bookings.customer_id', 'left');
        $this->db->where('bookings.booking_id', $id);

        $data['booking'] = $this->db->get()->row();

        $this->load->view('bookings/show', $data);
    }


   

 public function update_booking($booking_id = null)
{
    if (empty($booking_id)) {
        show_404();
    }

    $data = [
        'customer_id'       => $this->input->post('customer_id', TRUE),
        'booking_date'      => $this->input->post('booking_date', TRUE),
        'booking_time'      => $this->input->post('booking_time', TRUE),
        'table_number'      => $this->input->post('table_number', TRUE),
        'number_of_guests'  => $this->input->post('number_of_guests', TRUE),
        'arrival_time'      => $this->input->post('arrival_time', TRUE),
        'guest_names'       => $this->input->post('guest_names', TRUE),
        'status'            => $this->input->post('status', TRUE),
    ];

    // Basic validation
    if (
        empty($data['customer_id']) ||
        empty($data['booking_date']) ||
        empty($data['booking_time']) ||
        empty($data['table_number'])
    ) {
        $this->session->set_flashdata('error', 'Required fields are missing.');
        redirect('admin/bookings/booking_details/' . $booking_id);
    }

    // Update record
    $this->db->where('booking_id', $booking_id);
    $update = $this->db->update('bookings', $data);

    if ($update) {
        $this->session->set_flashdata('success', 'Booking updated successfully.');
    } else {
        $this->session->set_flashdata('error', 'Unable to update booking.');
    }

    redirect('admin/bookings');
}


    // public function cancel($id)
    // {
    //     $this->db->where('booking_id', $id);
    //     $this->db->update('bookings', ['status' => 'cancelled']);

    //     $this->session->set_flashdata('success', 'Booking cancelled successfully!');
    //     redirect('bookings');
    // }


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



    public function confirmed()
    {
        $this->db->select('bookings.*, customers.first_name as customer_name, customers.phone');
        $this->db->from('bookings');
        $this->db->join('customers', 'customers.customer_id = bookings.customer_id', 'left');

        // ✅ FIX: consistent lowercase handling
        // $this->db->where('LOWER(bookings.status)', 'Confirmed');
         $this->db->where('bookings.status', 'Confirmed');
        $this->db->order_by('bookings.booking_id', 'DESC');

        $data['bookings'] = $this->db->get()->result();

        // ✅ IMPORTANT: required for live search
        $data['status'] = 'Confirmed';

          // 🔥 STATUS COUNTS (ONE QUERY)
        $this->db->select('status, COUNT(*) as total');
        $this->db->from('bookings');
        $this->db->group_by('status');

        $result = $this->db->get()->result();

        $data['booking_counts'] = array_column($result, 'total', 'status');

        $this->load->view('admin/bookings/confirmed', $data);
    }

  public function completed()
    {
        $this->db->select('bookings.*, customers.first_name as customer_name, customers.phone');
        $this->db->from('bookings');
        $this->db->join('customers', 'customers.customer_id = bookings.customer_id', 'left');

         $this->db->where('bookings.status', 'Completed');
        $this->db->order_by('bookings.booking_id', 'DESC');

        $data['bookings'] = $this->db->get()->result();

        // ✅ IMPORTANT: required for live search
        $data['status'] = 'Completed';

          // 🔥 STATUS COUNTS (ONE QUERY)
        $this->db->select('status, COUNT(*) as total');
        $this->db->from('bookings');
        $this->db->group_by('status');

        $result = $this->db->get()->result();

        $data['booking_counts'] = array_column($result, 'total', 'status');
        $this->load->view('admin/bookings/completed', $data);
    }

     public function cancelled()
    {
    $this->db->select('bookings.*, customers.first_name as customer_name, customers.phone');
        $this->db->from('bookings');
        $this->db->join('customers', 'customers.customer_id = bookings.customer_id', 'left');

         $this->db->where('bookings.status', 'Cancelled');
        $this->db->order_by('bookings.booking_id', 'DESC');

        $data['bookings'] = $this->db->get()->result();

        // ✅ IMPORTANT: required for live search
        $data['status'] = 'Cancelled';
          // 🔥 STATUS COUNTS (ONE QUERY)
        $this->db->select('status, COUNT(*) as total');
        $this->db->from('bookings');
        $this->db->group_by('status');

        $result = $this->db->get()->result();

        $data['booking_counts'] = array_column($result, 'total', 'status');
        $this->load->view('admin/bookings/cancelled', $data);
    }


 
public function ajax_booking_search()
{
    $q = $this->input->get('q');
    $status = $this->input->get('status');

    $this->db->select('bookings.*, customers.first_name as customer_name, customers.phone');
    $this->db->from('bookings');
    $this->db->join('customers', 'customers.customer_id = bookings.customer_id', 'left');

    // 🔍 SEARCH
    if (!empty($q)) {
        $this->db->group_start();
        $this->db->like('customers.first_name', $q);
        $this->db->or_like('customers.phone', $q);
        $this->db->or_like('bookings.booking_id', $q);
        $this->db->group_end();
    }

    // ✅ STATUS FIX (CASE INSENSITIVE SAFE)
    if (!empty($status) && $status !== 'all') {
        $this->db->where('LOWER(bookings.status)', strtolower($status));
    }

    $this->db->order_by('bookings.booking_id', 'DESC');

    $result = $this->db->get()->result();

    echo json_encode([
        'data' => $result
    ]);
}

public function booking_details($booking_id = 0)
{
    $booking_id = (int) $booking_id;

    if ($booking_id <= 0) {
        redirect('admin/bookings');
    }

    $this->db->select('
        bookings.*,
        customers.*
    ');

    $this->db->from('bookings');
    $this->db->join('customers', 'customers.customer_id = bookings.customer_id', 'left');
    $this->db->where('bookings.booking_id', $booking_id);

    $booking = $this->db->get()->row();

    if (!$booking) {
        redirect('admin/bookings');
    }
    $data['booking_id'] = $booking_id;
    $data['booking'] = $booking;
    $this->load->view('admin/bookings/booking_details', $data);
}

//Code For Booking Report 
public function bookings_report()
{
    $this->load->view('admin/bookings/booking_report');
}

public function filter_ajax()
{
    $input = $this->input->post();

    $this->db->select('
        bookings.booking_id,
        bookings.booking_date,
        bookings.booking_time,
        bookings.table_number,
        bookings.number_of_guests,
        bookings.status,
        customers.first_name,
    ');

    $this->db->from('bookings');

    // JOIN customer table
    $this->db->join('customers', 'customers.customer_id = bookings.customer_id', 'left');

    // FILTERS
    if (!empty($input['start_date'])) {
        $this->db->where('bookings.booking_date >=', $input['start_date']);
    }

    if (!empty($input['end_date'])) {
        $this->db->where('bookings.booking_date <=', $input['end_date']);
    }

    if (!empty($input['booking_time'])) {
        $this->db->where('bookings.booking_time', $input['booking_time']);
    }

    if (!empty($input['status'])) {
        $this->db->where('bookings.status', $input['status']);
    }

    $result = $this->db->get()->result();

    return $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
}



public function export_pdf()
{
    $start_date  = $this->input->get('start_date');
    $end_date    = $this->input->get('end_date');
    $booking_time = $this->input->get('booking_time');
    $status      = $this->input->get('status');

    $this->db->select('
        bookings.*,
        customers.first_name
    ');
    $this->db->from('bookings');
    $this->db->join('customers', 'customers.customer_id = bookings.customer_id', 'left');

    if (!empty($start_date)) {
        $this->db->where('bookings.booking_date >=', $start_date);
    }

    if (!empty($end_date)) {
        $this->db->where('bookings.booking_date <=', $end_date);
    }

    if (!empty($booking_time)) {
        $this->db->where('bookings.booking_time', $booking_time);
    }

    if (!empty($status)) {
        $this->db->where('bookings.status', $status);
    }

    $bookings = $this->db->get()->result();

    
    $html = '
<style>
h2{
    text-align:center;
    margin-bottom:10px;
    font-family: sans-serif;
}

table{
    width:100%;
    border-collapse: collapse;
    font-family: sans-serif;
    font-size: 10pt;
}

th, td{
    border:0.5px solid #000;
    padding:5px;
}

th{
    background:#eeeeee;
    text-align:left;
}
</style>

<h2>Booking Report';

if (!empty($start_date) && !empty($end_date)) {
    $html .= ' ('.date("M d, Y", strtotime($start_date)).' - '.date("M d, Y", strtotime($end_date)).')';
}

$html .= '</h2>

<table>
    <thead>
        <tr>
            <th>SL</th>
            <th>ID</th>
            <th>Member</th>
            <th>Booking Date</th>
            <th>Time</th>
            <th>Table</th>
            <th>Persons</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>';

$sl = 1;

if (!empty($bookings)) {

    foreach ($bookings as $b) {

        $html .= '
        <tr>
            <td>'.$sl++.'</td>
            <td>'.$b->booking_id.'</td>
            <td>'.$b->first_name.'</td>
            <td>'.date('M d, Y', strtotime($b->booking_date)).'</td>
            <td>'.$b->booking_time.'</td>
            <td>'.$b->table_number.'</td>
            <td>'.$b->number_of_guests.'</td>
            <td>'.$b->status.'</td>
        </tr>';
    }

} else {

    $html .= '
    <tr>
        <td colspan="8" style="text-align:center;">No records found</td>
    </tr>';
}

$html .= '
    </tbody>
</table>';
    $mpdf = new \Mpdf\Mpdf([
        'format' => 'A4-P',
        'tempDir' => APPPATH . 'cache/mpdf'
    ]);
   

    $mpdf->WriteHTML($html);

    $mpdf->Output(
        'booking_report_'.date('Ymd_His').'.pdf',
        'I'
    );
}

// End Code For Booking Report 


}//End of Bookings controller