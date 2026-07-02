<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

    private $table = 'bookings';

    // =========================
    // GET ALL BOOKINGS (with customer join)
    // =========================
    public function get_all_bookings()
    {
        $this->db->select('bookings.*, customer.name as customer_name, customer.phone, customer.email');
        $this->db->from($this->table);
        $this->db->join('customer', 'customer.id = bookings.customer_id', 'left');
        $this->db->order_by('bookings.id', 'DESC');

        return $this->db->get()->result();
    }

    // =========================
    // GET SINGLE BOOKING
    // =========================
    public function get_booking($id)
    {
        $this->db->select('bookings.*, customer.name as customer_name');
        $this->db->from($this->table);
        $this->db->join('customer', 'customer.id = bookings.customer_id', 'left');
        $this->db->where('bookings.id', $id);

        return $this->db->get()->row();
    }

    // =========================
    // INSERT BOOKING
    // =========================
    public function insert_booking($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // =========================
    // UPDATE BOOKING
    // =========================
    public function update_booking($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // =========================
    // DELETE BOOKING
    // =========================
    public function delete_booking($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    // =========================
    // CHECK TABLE AVAILABILITY (IMPORTANT FOR RESERVATION SYSTEM)
    // Prevent double booking
    // =========================
    public function check_table_availability($table_no, $booking_date, $time_slot, $exclude_id = null)
    {
        $this->db->where('table_no', $table_no);
        $this->db->where('booking_date', $booking_date);
        $this->db->where('time_slot', $time_slot);

        if ($exclude_id != null) {
            $this->db->where('id !=', $exclude_id);
        }

        $query = $this->db->get($this->table);

        return ($query->num_rows() > 0) ? false : true;
    }

    // =========================
    // GET BOOKINGS BY DATE
    // =========================
    public function get_bookings_by_date($date)
    {
        $this->db->select('bookings.*, customer.name as customer_name');
        $this->db->from($this->table);
        $this->db->join('customer', 'customer.id = bookings.customer_id', 'left');
        $this->db->where('booking_date', $date);

        return $this->db->get()->result();
    }

    // =========================
    // UPDATE STATUS (pending / confirmed / cancelled)
    // =========================
    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, ['status' => $status]);
    }
}