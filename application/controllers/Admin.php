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
        $this->load->view('admin/dashboard');
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
public function logout()
{
    $this->session->sess_destroy();
    redirect('admin');
}
  
    
}//End of Admin Controller 