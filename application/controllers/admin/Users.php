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
        $this->session->set_flashdata('msg_text', 'First Name, Last Name, and Email are required.');

        redirect('admin/users/view/' . $customer_id);
        return;
    }

    // Password update
    $new_password = trim($this->input->post('new_password'));

    if (!empty($new_password)) {
        $update_data['password']       = password_hash($new_password, PASSWORD_BCRYPT);
        $update_data['plain_password'] = $new_password;
    }

    // Update record
    $this->db->where('customer_id', $customer_id);
    $result = $this->db->update('customers', $update_data);

    if ($result) {

        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('msg_type', 'success');
            $this->session->set_flashdata('msg_title', 'Success');
            $this->session->set_flashdata('msg_text', 'User profile updated successfully.');

        } else {

            $this->session->set_flashdata('msg_type', 'info');
            $this->session->set_flashdata('msg_title', 'No Changes');
            $this->session->set_flashdata('msg_text', 'No changes were made to the profile.');

        }

    } else {

        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Database Error');
        $this->session->set_flashdata('msg_text', 'Failed to update user profile. Please try again.');

    }

    redirect('admin/users/view/' . $customer_id);
}

public function add_user()
{
    $this->load->view('admin/users/add');
}

public function store()
{
    $first_name   = trim($this->input->post('first_name'));
    $last_name    = trim($this->input->post('last_name'));
    $email        = trim($this->input->post('email'));
    $phone        = trim($this->input->post('phone'));
    $password     = trim($this->input->post('password'));
    $role         = trim($this->input->post('role'));
    $customer_type = trim($this->input->post('customer_type'));

    // Validation
    if (
        empty($first_name) ||
        empty($last_name) ||
        empty($email) ||
        empty($password)
    ) {
        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Validation Error');
        $this->session->set_flashdata('msg_text', 'Please fill all required fields.');

        redirect('admin/users/create');
        return;
    }

    // Check existing email
    $exists = $this->db
        ->where('email', $email)
        ->count_all_results('customers');

    if ($exists > 0) {
        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Duplicate Email');
        $this->session->set_flashdata('msg_text', 'Email already exists.');

        redirect('admin/users/create');
        return;
    }

    $data = [
        'first_name'      => $first_name,
        'last_name'       => $last_name,
        'email'           => $email,
        'phone'           => $phone,
        'password'        => password_hash($password, PASSWORD_BCRYPT),
        'plain_password'  => $password,
        'role'            => $role,
        'customer_type'   => $customer_type,
        'created_at'      => date('Y-m-d H:i:s')
    ];

    $insert = $this->db->insert('customers', $data);

    if ($insert) {

        $customer_id = $this->db->insert_id();

        $this->session->set_flashdata('msg_type', 'success');
        $this->session->set_flashdata('msg_title', 'Success');
        $this->session->set_flashdata('msg_text', 'User created successfully.');

        redirect('admin/users/view/' . $customer_id);

    } else {

        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Database Error');
        $this->session->set_flashdata('msg_text', 'Failed to create user.');

        redirect('admin/users/add_user');
    }
}

public function import()
{
    $this->load->view('admin/users/import');
}

public function import_csv()
{
    if (empty($_FILES['csv_file']['name'])) {

        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'File Missing');
        $this->session->set_flashdata('msg_text', 'Please select a CSV file.');

        redirect('admin/users');
        return;
    }

    $file = $_FILES['csv_file']['tmp_name'];

    if (($handle = fopen($file, 'r')) === FALSE) {

        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'File Error');
        $this->session->set_flashdata('msg_text', 'Unable to read CSV file.');

        redirect('admin/users');
        return;
    }

    // Skip header row
    fgetcsv($handle);

    $inserted = 0;
    $skipped  = 0;

    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {

        if (count($row) < 7) {
            continue;
        }

        $first_name   = trim($row[0]);
        $last_name    = trim($row[1]);
        $email        = trim($row[2]);
        $phone        = trim($row[3]);
        $password     = trim($row[4]);
        $role         = trim($row[5]);
        $customer_type= trim($row[6]);

        if (empty($email)) {
            $skipped++;
            continue;
        }

        // Check duplicate email
        $exists = $this->db
            ->where('email', $email)
            ->count_all_results('customers');

        if ($exists > 0) {
            $skipped++;
            continue;
        }

        $data = [
            'first_name'     => $first_name,
            'last_name'      => $last_name,
            'email'          => $email,
            'phone'          => $phone,
            'password'       => password_hash($password, PASSWORD_BCRYPT),
            'plain_password' => $password,
            'role'           => $role,
            'customer_type'  => $customer_type,
            'created_at'     => date('Y-m-d H:i:s')
        ];

        $this->db->insert('customers', $data);
        $inserted++;
    }

    fclose($handle);

    $this->session->set_flashdata('msg_type', 'success');
    $this->session->set_flashdata('msg_title', 'Import Completed');
    $this->session->set_flashdata(
        'msg_text',
        $inserted . ' users imported successfully. ' .
        $skipped . ' duplicate/invalid rows skipped.'
    );

    redirect('admin/users');
}

public function export()
{
    $this->load->view('admin/users/export');
}
public function export_csv()
{
    $role = $this->input->post('role');

    if (empty($role)) {
        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'Validation Error');
        $this->session->set_flashdata('msg_text', 'Please select a role.');

        redirect('admin/users');
        return;
    }

    // Filter users by role
    $this->db->where('role', $role);
    $users = $this->db->get('customers')->result();

    if (empty($users)) {
        $this->session->set_flashdata('msg_type', 'error');
        $this->session->set_flashdata('msg_title', 'No Data');
        $this->session->set_flashdata('msg_text', 'No users found for selected role.');

        redirect('admin/users');
        return;
    }

    $filename = "users_" . strtolower($role) . "_" . date('Ymd_His') . ".csv";

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="'.$filename.'"');

    $output = fopen('php://output', 'w');

    // Header row
    fputcsv($output, [
        'ID',
        'First Name',
        'Last Name',
        'Email',
        'Phone',
        'Role',
        'Customer Type',
        'Created At'
    ]);

    // Data rows
    foreach ($users as $user) {
        fputcsv($output, [
            $user->customer_id,
            $user->first_name,
            $user->last_name,
            $user->email,
            $user->phone,
            $user->role,
            $user->customer_type,
            $user->created_at
        ]);
    }

    fclose($output);
    exit;
}

}//End of Admin Controller 