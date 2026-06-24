<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }


     public function admin()
    { 
        $this->load->view('admin/login');
    }

   public function myaccount()
    {
        $user = $this->session->userdata('user');

        if ($user && $user['role'] == 'Member') {
            redirect('my_account');
        }

        $this->load->view('login');
    }

     public function authenticate()
    {
    $email    = trim($this->input->post('email', TRUE));
    $password = $this->input->post('password', TRUE);

    // Validate input
    if (empty($email) || empty($password)) {
        $this->session->set_flashdata('error', 'Email and Password are required.');
        redirect('login');
    }

    // Get user from DB
    $user = $this->db
        ->where('email', $email)
        ->limit(1)
        ->get('customers')
        ->row_array();

    // Check user exists
    if (!$user) {
        
            $this->session->set_flashdata('msg_type', 'error');
            $this->session->set_flashdata('msg_title', 'Error');
            $this->session->set_flashdata('msg_text', 'You Are Not Authorized Person');
            redirect('auth/admin');
    }

    // Verify password
    if (!password_verify($password, $user['password'])) {
    
       
        // Role-based redirect
    if ($user['role'] == 'Admin') {


         $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Error');
        $this->session->set_flashdata('msg_text', 'Incorrect password');

        redirect('auth/admin');

    } 

     else if ($user['role'] == 'Member') {


         $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Error');
        $this->session->set_flashdata('msg_text', 'Incorrect password');

        redirect('auth/myaccount');

    } 
    
    }

    // Regenerate session
    $this->session->sess_regenerate(TRUE);

    // Set session data
    $this->session->set_userdata([
    'user' => [
        'customer_id' => $user['customer_id'],
        'first_name'  => $user['first_name'],
        'email'       => $user['email'],
        'phone'       => $user['phone'],
        'role'        => $user['role']
    ],
    'logged_in' => TRUE
]);

    // Role-based redirect
    if ($user['role'] == 'Admin') {


        $this->session->set_flashdata('msg_type', 'success');
        $this->session->set_flashdata('msg_title', 'Login');
        $this->session->set_flashdata('msg_text', 'Welcome back, ' . $user['first_name']);

        $this->db->where('customer_id', $user['customer_id']);
        $this->db->update('customers', [
        'updated_at' => date('Y-m-d H:i:s')
    ]);
        
        
        redirect('admin/dashboard');

    } 

    else if ($user['role'] == 'Member') {


        $this->session->set_flashdata('msg_type', 'success');
        $this->session->set_flashdata('msg_title', 'Login');
        $this->session->set_flashdata('msg_text', 'Welcome back, ' . $user['first_name']);
        $this->session->set_userdata('user', $user);

          $this->db->where('customer_id', $user['customer_id']);
        $this->db->update('customers', [
        'updated_at' => date('Y-m-d H:i:s')
         ]);
        
        redirect('portals/profile');

    } 
    
    
    else {

            $this->session->set_flashdata('msg_type', 'error');
            $this->session->set_flashdata('msg_title', 'Error');
            $this->session->set_flashdata('msg_text', 'You Are Not Authorized Person');

        redirect('admin');
    }
}

    public function authenticate_member()
    {
    $email    = trim($this->input->post('email', TRUE));
    $password = $this->input->post('password', TRUE);

    // Validate input
    if (empty($email) || empty($password)) {
        $this->session->set_flashdata('error', 'Email and Password are required.');
        redirect('login');
    }

    // Get user from DB
    $user = $this->db
        ->where('email', $email)
        ->limit(1)
        ->get('customers')
        ->row_array();

    // Check user exists
    if (!$user) {
        
            $this->session->set_flashdata('msg_type', 'error');
            $this->session->set_flashdata('msg_title', 'Error');
            $this->session->set_flashdata('msg_text', 'You Are Not Authorized Person');
            redirect('auth/admin');
    }

    // Verify password
    if (!password_verify($password, $user['password'])) {
    
       
        // Role-based redirect
    if (($user['role'] == 'Admin')||($user['role'] == 'Member')) {


         $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Error');
        $this->session->set_flashdata('msg_text', 'Incorrect password');

      

        redirect('auth/myaccount');

    } 

    
    }

    // Regenerate session
    $this->session->sess_regenerate(TRUE);

    // Set session data
    $this->session->set_userdata([
    'user' => [
        'customer_id' => $user['customer_id'],
        'first_name'  => $user['first_name'],
        'email'       => $user['email'],
        'phone'       => $user['phone'],
        'role'        => $user['role']
    ],
    'logged_in' => TRUE
]);

    

    if (($user['role'] == 'Member')|| ($user['role'] == 'Admin')){


        $this->session->set_flashdata('msg_type', 'success');
        $this->session->set_flashdata('msg_title', 'Login');
        $this->session->set_flashdata('msg_text', 'Welcome back, ' . $user['first_name']);
        $this->session->set_userdata('user', $user);

            $this->db->where('customer_id', $user['customer_id']);
        $this->db->update('customers', [
        'updated_at' => date('Y-m-d H:i:s')
        ]);
        redirect('my_account');

    } 
    
    
    else {

            $this->session->set_flashdata('msg_type', 'error');
            $this->session->set_flashdata('msg_title', 'Error');
            $this->session->set_flashdata('msg_text', 'You Are Not Authorized Person');

        redirect('admin');
    }
}


    // =========================
    // DASHBOARD (OPTIONAL)
    // =========================
    public function dashboard()
    {
        $this->_check_login();

        $customer_id = $this->session->userdata('customer_id');

        $data['customer'] = $this->db
            ->where('customer_id', $customer_id)
            ->get('customers')
            ->row();

        $this->load->view('bookings/create', $data);
    }

    public function logout_admin()
    {
        

        $this->session->sess_destroy();

       redirect('auth/admin');
    }

     public function logout_member()
    {
        

        $this->session->sess_destroy();

       redirect('auth/myaccount');
    }


   
}