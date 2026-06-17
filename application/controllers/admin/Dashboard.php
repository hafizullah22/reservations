<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

     public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->helper(['url', 'form']);

        // 🔒 Block access if not logged in
    if (!$this->session->userdata('logged_in')) {

        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Unauthorize!');
        $this->session->set_flashdata('msg_text', 'You are not authorized to access');

        redirect('auth/admin');
    }
    }


   

    public function index()
    {
        $data['total_bookings'] = $this->db->count_all('bookings');
        $data['total_customers'] = $this->db->count_all('customers');
        $data['total_tables']    = $this->db->count_all('tables');
        $data['recent_bookings'] = $this->db->order_by('booking_id', 'DESC')
        ->JOIN('customers', 'bookings.customer_id = customers.customer_id', 'left')
        ->limit(5)->get('bookings')->result();
        $this->load->view('admin/dashboard',$data);
    }


    //Pation Table Rules
public function tables_rules()
{
   $data['rules'] = $this->db
    ->select('available_date, GROUP_CONCAT(table_number ORDER BY table_number ASC) as tables')
    ->from('table_available_dates')
    ->group_by('available_date')
    ->order_by('available_date', 'DESC')
    ->get()
    ->result();

    $this->load->view('admin/tables_rules', $data);
}

public function set_table_rules()
{
    $table_group    = $this->input->post('table_group');
    $available_date = $this->input->post('available_date');

    // =========================
    // 1. VALIDATION
    // =========================
    if (empty($table_group) || empty($available_date)) {

        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Missing Data!');
        $this->session->set_flashdata('msg_text', 'Table group and date are required.');

        return redirect('admin/tables_rules');
    }

    // =========================
    // 2. TABLE GROUP MAP
    // =========================
    $table_numbers = [];

    switch ($table_group) {

        case 'patio_38_42':
            $table_numbers = range(38, 42);
            break;

        default:
            $table_numbers = [];
            break;
    }

    // If invalid group
    if (empty($table_numbers)) {

        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Invalid Group!');
        $this->session->set_flashdata('msg_text', 'No tables found for selected group.');

        return redirect('admin/tables_rules');
    }

    // =========================
    // 3. INSERT LOGIC
    // =========================
    $inserted = 0;
    $skipped  = 0;

    foreach ($table_numbers as $table_number) {

        $exists = $this->db->where([
            'table_number'   => $table_number,
            'available_date' => $available_date
        ])->count_all_results('table_available_dates');

        if (!$exists) {

            $this->db->insert('table_available_dates', [
                'table_number'   => $table_number,
                'available_date' => $available_date
            ]);

            $inserted++;

        } else {
            $skipped++;
        }
    }

    // =========================
    // 4. FLASH MESSAGES
    // =========================
    if ($inserted > 0) {

        $this->session->set_flashdata('msg_type', 'success');
        $this->session->set_flashdata('msg_title', 'Success!');
        $this->session->set_flashdata(
            'msg_text',
            "$inserted Patio Table rule(s) added successfully."
        );

    } elseif ($skipped > 0 && $inserted == 0) {

        $this->session->set_flashdata('msg_type', 'warning');
        $this->session->set_flashdata('msg_title', 'Already Exists!');
        $this->session->set_flashdata(
            'msg_text',
            "No new records inserted. $skipped Patio Table rule(s) already exist."
        );

    } else {

        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Failed!');
        $this->session->set_flashdata(
            'msg_text',
            'No Patio Table rules were inserted.'
        );
    }

    return redirect('admin/tables_rules');
}

public function delete_table_rule($available_date)
{
    if (!$this->input->is_ajax_request()) {
        show_404();
        return;
    }

    $this->db->where('available_date', $available_date);
    $delete = $this->db->delete('table_available_dates');

    if ($delete) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Rule deleted successfully'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to delete rule'
        ]);
    }
}


}