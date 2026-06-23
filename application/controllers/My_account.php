<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_account extends CI_Controller {

    protected $user;
    protected $customer_id;

    public function __construct()
    {
        parent::__construct();

        // Login Check
        $this->user = $this->session->userdata('user');

        if (!$this->user || empty($this->user['customer_id'])) {
            redirect('auth/myaccount');
            exit;
        }

        $this->customer_id = $this->user['customer_id'];
    }

    public function index()
    {
        $data['user'] = $this->user;

        $this->load->view('member/profile', $data);
    }

    public function bookings()
    {
        $this->db->select('bookings.*, customers.first_name as customer_name, customers.phone');
        $this->db->from('bookings');
        $this->db->join('customers', 'customers.customer_id = bookings.customer_id', 'left');
        $this->db->where('bookings.customer_id', $this->customer_id);
        $this->db->order_by('bookings.booking_id', 'DESC');

        $data['bookings'] = $this->db->get()->result();

        $this->load->view('member/bookings', $data);
    }

    public function profile_details()
    {
        $data['user'] = $this->db
            ->where('customer_id', $this->customer_id)
            ->get('customers')
            ->row();

        $this->load->view('member/profile_details', $data);
    }

    public function update_profile()
    {
        $update_data = [
            'first_name'    => trim($this->input->post('first_name')),
            'last_name'     => trim($this->input->post('last_name')),
            'phone'         => trim($this->input->post('phone')),
            'email'         => trim($this->input->post('email')),
            'role'          => trim($this->input->post('role')),
            'customer_type' => trim($this->input->post('customer_type'))
        ];

        // Validation
        if (
            empty($update_data['first_name']) ||
            empty($update_data['last_name']) ||
            empty($update_data['email'])
        ) {
            $this->session->set_flashdata('msg_type', 'error');
            $this->session->set_flashdata('msg_title', 'Validation Error');
            $this->session->set_flashdata('msg_text', 'First Name, Last Name and Email are required.');

            redirect('my_account/profile_details');
            return;
        }

        // Password Update
        $new_password = trim($this->input->post('new_password'));

        if (!empty($new_password)) {
            $update_data['password']       = password_hash($new_password, PASSWORD_BCRYPT);
            $update_data['plain_password'] = $new_password;
        }

        $result = $this->db
            ->where('customer_id', $this->customer_id)
            ->update('customers', $update_data);

        if ($result) {

            if ($this->db->affected_rows() > 0) {

                $this->session->set_flashdata('msg_type', 'success');
                $this->session->set_flashdata('msg_title', 'Success');
                $this->session->set_flashdata('msg_text', 'Profile updated successfully.');

            } else {

                $this->session->set_flashdata('msg_type', 'info');
                $this->session->set_flashdata('msg_title', 'No Changes');
                $this->session->set_flashdata('msg_text', 'No changes were made.');

            }

        } else {

            $this->session->set_flashdata('msg_type', 'error');
            $this->session->set_flashdata('msg_title', 'Database Error');
            $this->session->set_flashdata('msg_text', 'Failed to update profile.');

        }

        redirect('my_account/profile_details');
    }
}
