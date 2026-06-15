<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
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
    $table_group   = $this->input->post('table_group');
    $available_date = $this->input->post('available_date');

    $table_numbers = [];

    if ($table_group == 'patio_38_42') {
        $table_numbers = range(38, 42);
    }

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
    // Flash Messages (Correct)
    // =========================
    if ($inserted > 0) {

        $this->session->set_flashdata('msg_type', 'success');
        $this->session->set_flashdata('msg_title', 'Success!');
        $this->session->set_flashdata(
            'msg_text',
            "$inserted table rule(s) added successfully."
        );

    } elseif ($skipped > 0) {

        $this->session->set_flashdata('msg_type', 'warning');
        $this->session->set_flashdata('msg_title', 'Already Exists!');
        $this->session->set_flashdata(
            'msg_text',
            "No new records added. $skipped rule(s) already exist."
        );

    } else {

        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Failed!');
        $this->session->set_flashdata(
            'msg_text',
            'No table rules were inserted.'
        );
    }

   redirect('admin/tables_rules');
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

public function users($page = 0)
{
    $this->load->library('pagination');

    $per_page = 10;

    // Total users
    $config['total_rows'] = $this->db->count_all('customers');

    $config['base_url'] = site_url('admin/users');
    $config['per_page'] = $per_page;

    // Pagination UI (Bootstrap style)
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';

    $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close'] = '</span></li>';

    $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close'] = '</span></li>';

    $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['next_tag_close'] = '</span></li>';

    $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['prev_tag_close'] = '</span></li>';

    $this->pagination->initialize($config);

    // Get paginated users
    $data['users'] = $this->db
        ->limit($per_page, $page)
        ->order_by('customer_id', 'DESC')
        ->get('customers')
        ->result();

    $data['pagination'] = $this->pagination->create_links();

    $this->load->view('admin/users/all_users', $data);
}
public function bookings()
    {
        $this->db->select('bookings.*, customers.first_name as customer_name, customers.phone');
        $this->db->from('bookings');
        $this->db->join('customers', 'customers.customer_id = bookings.customer_id', 'left');
        $this->db->order_by('bookings.booking_id', 'DESC');

        $data['bookings'] = $this->db->get()->result();

        $this->load->view('/admin/bookings/index', $data);
    }

public function logout()
{
    $this->session->sess_destroy();
    redirect('admin');
}
  
    
}//End of Admin Controller 