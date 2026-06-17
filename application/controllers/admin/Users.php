<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
    
public function index($page = 0)
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





    
}//End of Admin Controller 