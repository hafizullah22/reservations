<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    // =========================
    // LOGIN PAGE
    // =========================
    public function index()
    {
        // If already logged in, redirect to bookings
        if ($this->session->userdata('logged_in')) {
            redirect('bookings');
        }

        $this->load->view('login');
    }

    // =========================
    // AUTHENTICATE USER
    // =========================
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

            $this->session->set_flashdata('error', 'Invalid email or password.');
            redirect('login');
        }

        // Verify password
        if (!password_verify($password, $user['password'])) {

            $this->session->set_flashdata('error', 'Invalid email or password.');
            redirect('login');
        }

        // Regenerate session (security)
        $this->session->sess_regenerate(TRUE);

        // Set session data
        $this->session->set_userdata([
            'customer_id' => $user['customer_id'],
            'name'        => $user['first_name'],
            'email'       => $user['email'],
            'phone'       => $user['phone'],
            'role'        => $user['role'],
            'logged_in'   => TRUE
        ]);

        $this->session->set_flashdata('success', 'Welcome back, '.$user['first_name']);

        redirect('bookings');
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

    // =========================
    // LOGOUT
    // =========================
    public function logout()
    {
        $this->session->sess_destroy();

        redirect('login');
    }

    // =========================
    // CHECK LOGIN
    // =========================
    private function _check_login()
    {
        if (!$this->session->userdata('logged_in')) {

            $this->session->set_flashdata('error', 'Please login first.');
            redirect('login');
        }
    }
}