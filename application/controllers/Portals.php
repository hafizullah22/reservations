<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portals extends CI_Controller {

 public function index()
 {
    $this->load->view('portal/home');
 }

 public function meetings()
{
    $files = $this->db
        ->select('id, year, file_name, file_path, file_type')
        ->where('file_type', 'meeting')
        ->order_by('year', 'DESC')
        ->order_by('id', 'DESC')
        ->get('documents')
        ->result();

    // group by year in PHP
    $data['files_by_year'] = [];

    foreach ($files as $file) {
        $data['files_by_year'][$file->year][] = $file;
    }

    $this->load->view('portal/meetings', $data);
}

}

