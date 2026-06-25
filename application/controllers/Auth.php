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

     public function booking()
    {
        $user = $this->session->userdata('user');

        if ($user && $user['role'] == 'Member') {
            redirect('bookings/create');
        }

        $this->load->view('blogin');
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


 public function authenticate_booking()
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
            redirect('auth/booking');
    }

    // Verify password
    if (!password_verify($password, $user['password'])) {
    
       
        // Role-based redirect
    if (($user['role'] == 'Admin')||($user['role'] == 'Member')) {


         $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Error');
        $this->session->set_flashdata('msg_text', 'Incorrect password');

      

        redirect('auth/booking');

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
        redirect('bookings/create');

    } 
    
    
    else {

            $this->session->set_flashdata('msg_type', 'error');
            $this->session->set_flashdata('msg_title', 'Error');
            $this->session->set_flashdata('msg_text', 'You Are Not Authorized Person');

        redirect('auth');
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


    public function forgot_password()
    {
        $this->load->view('forgot-password');
    }

public function send_reset_link()
{
    $email = $this->input->post('email');

    $user = $this->db
        ->where('email', $email)
        ->get('customers')
        ->row();

    if (!$user)
    {
        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Error');
        $this->session->set_flashdata('msg_text', 'You are not a member of Clifton Park Trustees.');

        redirect('auth/forgot_password');
    }

    $token = bin2hex(random_bytes(32));

    $this->db->where('customer_id', $user->customer_id)->update('customers', [
        'reset_token'   => $token,
        'reset_expires' => date('Y-m-d H:i:s', strtotime('+1 hour'))
    ]);

    $link = site_url('auth/reset_password/' . $token);

    $this->load->library('email');

    $this->email->from('hafizulah322@gmail.com', 'Clifton Park Trustees');
    $this->email->to($email);
    $this->email->subject('Password Reset Request');

    $this->email->message("
        <p>Hello {$user->first_name},</p>

        <p>We received a request to reset your password.</p>

        <p>
            <a href='{$link}'>
                Click Here to Reset Your Password
            </a>
        </p>

        <p>This link will expire in 1 hour.</p>

        <p>If you did not request a password reset, please ignore this email.</p>
    ");

    if ($this->email->send())
    {
        $this->session->set_flashdata('msg_type', 'success');
        $this->session->set_flashdata('msg_title', 'Email Sent');
        $this->session->set_flashdata(
            'msg_text',
            'A password reset link has been sent to your email address.'
        );

        redirect('auth/forgot_password');
    }
    else
    {
        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Email Failed');
        $this->session->set_flashdata(
            'msg_text',
            'Unable to send email. Please try again later.'
        );

        redirect('auth/forgot_password');
    }
}

    public function reset_password($token)
    {
        $user = $this->db
            ->where('reset_token',$token)
            ->where('reset_expires >', date('Y-m-d H:i:s'))
            ->get('customers')
            ->row();

        if(!$user){
            show_error('Invalid or expired link');
        }

        $data['token'] = $token;
        $this->load->view('reset_password',$data);
    }


    public function update_password()
{
    $token = $this->input->post('token');

    $this->form_validation->set_rules(
        'password',
        'Password',
        'required|min_length[8]'
    );

    $this->form_validation->set_rules(
        'confirm_password',
        'Confirm Password',
        'required|matches[password]'
    );

    if ($this->form_validation->run() == FALSE)
    {
        $data['token'] = $token;
        $this->load->view('reset_password', $data);
        return;
    }

    $user = $this->db
        ->where('reset_token', $token)
        ->where('reset_expires >', date('Y-m-d H:i:s'))
        ->get('customers')
        ->row();

    if (!$user)
    {
        show_error('Invalid or expired reset link.');
    }

    $password = $this->input->post('password');

    $this->db->where('customer_id', $user->customer_id)->update('customers', [
        'password'      => password_hash($password, PASSWORD_DEFAULT),
        'reset_token'   => NULL,
        'reset_expires' => NULL,
        'plain_password'=>$password
    ]);

    $this->session->set_flashdata('msg_type', 'success');
    $this->session->set_flashdata('msg_title', 'Success');
    $this->session->set_flashdata(
        'msg_text',
        'Password changed successfully. Please login.'
    );

    redirect('auth/myaccount');
}
   
}