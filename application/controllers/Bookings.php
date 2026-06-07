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

    $this->load->view('bookings/create', $data);
}
    // =========================
    // STORE BOOKING
    // =========================
    public function store()
    {
        $customer_id = $this->session->userdata('customer_id');

        if (!$customer_id) {
            redirect('login');
        }

        $booking_date = $this->input->post('booking_date', TRUE);
        $booking_time = $this->input->post('booking_time', TRUE);
        $table_number = $this->input->post('table_number', TRUE);
        $guests       = $this->input->post('number_of_guests', TRUE);

        // =========================
        // VALIDATION - EMPTY CHECK
        // =========================
        if (empty($booking_date) || empty($booking_time) || empty($table_number)) {
            $this->session->set_flashdata('error', 'All fields are required.');
            redirect('bookings/create');
        }

        // =========================
        // CHECK DUPLICATE BOOKING
        // =========================
        $this->db->where([
            'table_number' => $table_number,
            'booking_date' => $booking_date,
            'booking_time' => $booking_time
        ]);

        $exists = $this->db->get('bookings')->num_rows();

        if ($exists > 0) {
            $this->session->set_flashdata('error', 'This table is already booked for selected time!');
            redirect('bookings/create');
        }

        // =========================
        // INSERT BOOKING
        // =========================
        $this->db->insert('bookings', [
            'customer_id'       => $customer_id,
            'booking_date'      => $booking_date,
            'booking_time'      => $booking_time,
            'table_number'      => $table_number,
            'number_of_guests'  => $guests,
            'status'            => 'pending'
        ]);

        $this->session->set_flashdata('success', 'Booking created successfully!');
        redirect('bookings');
    }

    // =========================
    // DELETE BOOKING
    // =========================
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