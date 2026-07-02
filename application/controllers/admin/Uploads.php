<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploads extends CI_Controller {

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

public function upload_file()
{
    $file_name = trim($this->input->post('file_name', true));
    $file_type = trim($this->input->post('file_type', true));

    if (!$file_name || !$file_type) {
        $this->session->set_flashdata('msg_text', 'File title and type are required.');
        redirect('admin/uploads/upload_file');
        return;
    }

    $year  = date('Y');
    $month = date('m');

    $relativePath = "uploads/$year/$month/";
    $absolutePath = FCPATH . $relativePath;

    // Create folder if not exists
    // if (!is_dir($absolutePath)) {
    //     mkdir($absolutePath, 0775, true);
    // }
    if (!is_dir($absolutePath)) {
    if (!mkdir($absolutePath, 0775, true)) {
        die('Failed to create directory: ' . $absolutePath);
    }
}
    $config = [
        'upload_path'   => $absolutePath,
        'allowed_types' => 'pdf|doc|docx|xls|xlsx',
        'max_size'      => 10240,
        'encrypt_name'  => FALSE // ✅ IMPORTANT: keep original filename
    ];

    $this->load->library('upload');
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('file')) {
        $this->session->set_flashdata(
            'msg_text',
            strip_tags($this->upload->display_errors())
        );
        redirect('/');
        return;
    }

    $uploadData = $this->upload->data();

    // ✅ actual original file name
    $originalFileName = $uploadData['orig_name'];

    $data = [
        'file_name'  => $file_name,
        'file_type'  => $file_type,
        'file_path'  => $relativePath . $originalFileName,
        'created_at' => date('Y-m-d H:i:s')
    ];

    $this->db->insert('documents', $data);

    

    $this->session->set_flashdata('msg_text', 'File uploaded successfully!');
    if( $file_type=='financial')
        {
    redirect('admin/uploads/financial_report');
        }
    
    else if( $file_type=='tax_return')
        {
    redirect('admin/uploads/tax_return');
        }
}



public function financial_report()
{
    $data['files'] = $this->db
        ->select('id,file_name, file_path,file_type')
        ->where('file_type', 'financial')
        ->get('documents')
        ->result();

    $this->load->view('admin/uploads/financial', $data);
}

public function tax_return()
{
    $data['files'] = $this->db
        ->select('file_name, file_path,file_type')
        ->where('file_type', 'tax_return')
        ->get('documents')
        ->result();

    $this->load->view('admin/uploads/tax_return', $data);
}

public function meeting()
{
    $data['files'] = $this->db
        ->select('id,year,file_name, file_path,file_type')
        ->where('file_type', 'meeting')
        ->get('documents')
        ->result();

    $this->load->view('admin/uploads/meeting', $data);
}




public function delete($id)
{
    // Get file info
    $file = $this->db->get_where('documents', ['id' => $id])->row();

    if (!$file) {
        $this->session->set_flashdata('msg_text', 'File not found.');
        redirect('admin/uploads');
        return;
    }

    // Full file path
    $filePath = FCPATH . $file->file_path;

    // Delete physical file if exists
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    // Delete database record
    $this->db->where('id', $id);
    $this->db->delete('documents');

    $this->session->set_flashdata('msg_text', 'File deleted successfully!');
    redirect('admin/uploads');
}

}// End of Upload Controller 