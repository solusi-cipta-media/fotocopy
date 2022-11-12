<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen_selfie extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('userid')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Please Login!</div>');
            redirect('auth');
        }
        $this->load->model("Crud", "crud");
    }

    public function index()
    {
        $data['image'] = '';
        $data['tanggal'] = $this->crud->hariIndo(date('l, d-F-Y'));
        $this->load->view('absen_selfie', $data);
    }
}
