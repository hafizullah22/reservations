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
    

public function index()
{
    // Customer List
    $data['users'] = $this->db
        ->order_by('customer_id', 'DESC')
        ->get('customers')
        ->result();

    // Status Counts
    $this->db->select('role, COUNT(*) as total');
    $this->db->from('customers');
    $this->db->group_by('role');

    $result = $this->db->get()->result();

    $data['booking_counts'] = array_column($result, 'total', 'role');

    $data['total_users'] = $this->db->count_all('customers');

    $this->load->view('admin/users/index', $data);
}

public function ajax_user_search()
{
    $q    = $this->input->get('q');
    $role = $this->input->get('role');

    $this->db->from('customers');

    // ================= SEARCH =================
    if (!empty($q)) {

        $this->db->group_start();

        // INT SAFE SEARCH (customer_id)
        if (is_numeric($q)) {
            $this->db->or_where('customer_id', (int)$q);
        }

        // TEXT SEARCH
        $this->db->or_like('first_name', $q);
        $this->db->or_like('last_name', $q);
        $this->db->or_like('phone', $q);
        $this->db->or_like('email', $q);

        $this->db->group_end();
    }

    // ================= ROLE FILTER =================
    if (!empty($role) && $role !== 'all') {
        $this->db->where('role', $role);
    }

    // ================= RESULT =================
    $data = $this->db->order_by('customer_id', 'DESC')
                     ->get()
                     ->result();

    echo json_encode([
        'data' => $data
    ]);
}


public function member()
{
    // Customer List
    $data['users'] = $this->db
        ->order_by('customer_id', 'DESC')
        ->where('role','Member')
        ->get('customers')
        ->result();

    // Status Counts
    $this->db->select('role, COUNT(*) as total');
    $this->db->from('customers');
    $this->db->group_by('role');

    $result = $this->db->get()->result();

    $data['booking_counts'] = array_column($result, 'total', 'role');

    $data['total_users'] = $this->db->count_all('customers');

    // ✅ IMPORTANT: required for live search
    $data['status'] = 'Member';

    $this->load->view('admin/users/member', $data);
}

public function admin()
{
    // Customer List
    $data['users'] = $this->db
        ->order_by('customer_id', 'DESC')
        ->where('role','Admin')
        ->get('customers')
        ->result();

    // Status Counts
    $this->db->select('role, COUNT(*) as total');
    $this->db->from('customers');
    $this->db->group_by('role');

    $result = $this->db->get()->result();

    $data['booking_counts'] = array_column($result, 'total', 'role');

    $data['total_users'] = $this->db->count_all('customers');

    // ✅ IMPORTANT: required for live search
    $data['status'] = 'Admin';

    $this->load->view('admin/users/admin', $data);
}

public function view($customer_id=NULL)
{
   $data['user'] = $this->db->select('*')->where('customer_id',$customer_id)->get('customers')->row();
   $this->load->view('admin/users/details',$data);
}

public function update($customer_id)
{
    // Collect profile data from the edit form
    $update_data = [
        'first_name'    => trim($this->input->post('first_name')),
        'last_name'     => trim($this->input->post('last_name')),
        'phone'         => trim($this->input->post('phone')),
        'email'         => trim($this->input->post('email')),
        'role'          => trim($this->input->post('role')),
        'customer_type' => trim($this->input->post('customer_type'))
    ];

    // Basic validation check for required profile elements
    if (empty($update_data['first_name']) || empty($update_data['last_name']) || empty($update_data['email'])) {
        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Validation Error');
        $this->session->set_flashdata('msg_text', 'First Name, Last Name, and Email are required.');
        
        redirect('admin/users/view/' . $customer_id);
        return;
    }

    // Check if a new password was provided
    $new_password = trim($this->input->post('new_password'));
    if (!empty($new_password)) {
        // Append password updates to the main array if changing it
        $update_data['password']       = password_hash($new_password, PASSWORD_BCRYPT);
        $update_data['plain_password'] = $new_password;
    }

    // Update database record using Query Builder
    $this->db->where('customer_id', $customer_id);
    $result = $this->db->update('customers', $update_data);

    if ($result) {
        $this->session->set_flashdata('msg_type', 'success');
        $this->session->set_flashdata('msg_title', 'Success');
        $this->session->set_flashdata('msg_text', 'User profile updated successfully.');
    } else {
        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Database Error');
        $this->session->set_flashdata('msg_text', 'Failed to update user profile. Please try again.');
    }

    redirect('admin/users/view/' . $customer_id);
}
}//End of Admin Controller 