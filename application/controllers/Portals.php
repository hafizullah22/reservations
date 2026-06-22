<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portals extends CI_Controller {

    public function profile()
    {
        $user = $this->session->userdata('user');

        if (!$user) {
            redirect('login');
        }

        $data['user'] = $user;

        $this->load->view('member/profile', $data);
    }

    public function bookings()
    {
        $user = $this->session->userdata('user');

        // 🔒 Login check
        if (!$user || empty($user['customer_id'])) {
            redirect('auth/myaccount');
        }

        $customer_id = $user['customer_id'];

        $this->db->select('bookings.*, customers.first_name as customer_name, customers.phone');
        $this->db->from('bookings');
        $this->db->join('customers', 'customers.customer_id = bookings.customer_id', 'left');
        $this->db->where('bookings.customer_id', $customer_id);
        $this->db->order_by('bookings.booking_id', 'DESC');

        $data['bookings'] = $this->db->get()->result();

        $this->load->view('member/bookings', $data);
    }
}

