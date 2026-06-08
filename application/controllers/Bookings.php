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

    // =========================
    // CREATE FORM (LOGGED IN CUSTOMER)
    // =========================
  public function create()
{
    $customer_id = $this->session->userdata('customer_id');

    if (!$customer_id) {
        redirect('login');
    }

    // Get all booked dates
    $booked_dates = $this->db
        ->select('booking_date')
        ->from('bookings')
        ->group_by('booking_date')
        ->get()
        ->result_array();

    // Convert to simple array
    $disabled_dates = array_column($booked_dates, 'booking_date');

    $data['customer'] = $this->db
        ->where('customer_id', $customer_id)
        ->get('customers')
        ->row();

    $data['disabled_dates'] = $disabled_dates;
    $data['tables'] = $this->db->get('tables')->result(); 

    $this->load->view('bookings/create', $data);
}
    
 public function store()
{
    $customer_id = $this->session->userdata('customer_id');

    if (!$customer_id) {
        redirect('login');
    }

    // =========================
    // CUSTOMER INFO
    // =========================
    $customer = $this->db
        ->where('customer_id', $customer_id)
        ->get('customers')
        ->row();

    if (!$customer) {
        $this->session->set_flashdata('error', 'Customer account not found.');
        redirect('login');
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
        redirect('bookings/create');
    }

    // =========================
    // TABLE CAPACITY RULE
    // =========================
    if ($table_number >= 11 && $table_number <= 34) {
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
    // MAX 2 CONFIRMED BOOKINGS
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
        redirect('bookings/create');
    }

    // =========================
    // BOOKING REFERENCE
    // =========================
    $reservation_no = 'RES-' . date('Ymd') . '-' . rand(1000, 9999);

    // =========================
    // INSERT BOOKING
    // =========================
    $insert = $this->db->insert('bookings', [
        'reservation_no'  => $reservation_no, // remove if column doesn't exist
        'customer_id'     => $customer_id,
        'booking_date'    => $booking_date,
        'booking_time'    => $booking_time,
        'table_number'    => $table_number,
        'number_of_guests'=> $guests,
        'arrival_time'    => $arrival_time,
        'guest_names'     => $guest_names,
        'status'          => 'confirmed'
    ]);

    if (!$insert) {
        $this->session->set_flashdata(
            'error',
            'Unable to create booking. Please try again.'
        );
        redirect('bookings/create');
    }

    // =========================
    // SEND EMAIL
    // =========================
    try {

        $this->load->library('email');

        $this->email->from(
            'hafizulah322@gmail.com',
            'Table Reservation System'
        );

        $this->email->to($customer->email);

        $this->email->subject(
            'Reservation Confirmation #' . $reservation_no
        );

        $message = '
        <html>
        <body>
            <h2>Reservation Confirmed</h2>

            <p>Dear ' . htmlspecialchars($customer->first_name) . ',</p>

            <p>Your reservation has been successfully confirmed.</p>

            <table border="1" cellpadding="8" cellspacing="0">
                <tr>
                    <td><strong>Reservation No.</strong></td>
                    <td>' . $reservation_no . '</td>
                </tr>
                <tr>
                    <td><strong>Date</strong></td>
                    <td>' . $booking_date . '</td>
                </tr>
                <tr>
                    <td><strong>Time Slot</strong></td>
                    <td>' . ucfirst($booking_time) . '</td>
                </tr>
                <tr>
                    <td><strong>Table Number</strong></td>
                    <td>' . $table_number . '</td>
                </tr>
                <tr>
                    <td><strong>Arrival Time</strong></td>
                    <td>' . $arrival_time . '</td>
                </tr>
                <tr>
                    <td><strong>Guests</strong></td>
                    <td>' . $guests . '</td>
                </tr>
            </table>

            <br>

            <p>Thank you for your reservation.</p>
        </body>
        </html>';

        $this->email->message($message);

        if (!$this->email->send()) {
            log_message(
                'error',
                'Booking Email Error: ' . $this->email->print_debugger()
            );
        }

    } catch (Exception $e) {
        log_message('error', 'Email Exception: ' . $e->getMessage());
    }

    // =========================
    // SUCCESS
    // =========================
    $this->session->set_flashdata(
        'success',
        'Booking created successfully.'
    );

    redirect('bookings');
}

    public function delete($id)
    {
        $this->db->where('booking_id', $id);
        $this->db->delete('bookings');

        $this->session->set_flashdata('success', 'Booking deleted successfully!');
        redirect('bookings');
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
}