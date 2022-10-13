<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Design extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('login');
    }

    function dashboard()
    {
        $this->load->view('template/header');
        $this->load->view('dashboard');
        $this->load->view('template/footer');
    }

    function profil()
    {
        $this->load->view('template/header');
        $this->load->view('profil');
        $this->load->view('template/footer');
    }

    function karyawan()
    {
        $this->load->view('template/header');
        $this->load->view('karyawan');
        $this->load->view('template/footer');
    }
}
