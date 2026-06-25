<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portals extends CI_Controller {

 public function index()
 {
    $this->load->view('portal/home');
 }

 public function financial()
 {
       $data['files'] = $this->db
        ->select('id,file_name, file_path,file_type')
        ->where('file_type', 'financial')
        ->get('documents')
        ->result();

    $this->load->view('portal/financial', $data);
 }

 public function tax_return()
 {
       $data['files'] = $this->db
        ->select('id,file_name, file_path,file_type')
        ->where('file_type', 'tax_return')
        ->get('documents')
        ->result();

    $this->load->view('portal/tax_return', $data);
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

public function neighbour_map()
{
    $data['files'] = $this->db
        ->select('id,file_name, file_path,file_type')
        ->where('file_type', 'neighbour_map')
        ->get('documents')
        ->result();

    $this->load->view('portal/neighbour_map', $data);
}

public function trust_deed_1912()
{
$this->load->view('portal/trust_deed');
}
public function beach_information()
{
    $this->load->view('portal/beach_information');
}
public function beach_rules()
{
    $this->load->view('portal/beach_rules');
}

public function table_map()
{
    $data['files'] = $this->db
        ->select('id,file_name, file_path,file_type')
        ->where('file_type', 'table_map')
        ->get('documents')
        ->result();

    $this->load->view('portal/table_map', $data);
}
public function contact_us()
{
$this->load->view('portal/contact_us');
}

public function historical_photos()
{
    $data['files'] = $this->db
        ->select('id,file_name, file_path,file_type')
        ->where('file_type', 'history')
        ->get('documents')
        ->result();
    $this->load->view('portal/historical-photos',$data);
}


}








