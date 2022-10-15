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

    function mesin()
    {
        $this->load->view('template/header');
        $this->load->view('mesin');
        $this->load->view('template/footer');
    }

    function customer()
    {
        $this->load->view('template/header');
        $this->load->view('customer');
        $this->load->view('template/footer');
    }

    function kontrak()
    {
        $this->load->view('template/header');
        $this->load->view('kontrak');
        $this->load->view('template/footer');
    }

    function cuti()
    {
        $this->load->view('template/header');
        $this->load->view('cuti');
        $this->load->view('template/footer');
    }

    function absensi()
    {
        $this->load->view('template/header');
        $this->load->view('absensi_kehadiran');
        $this->load->view('template/footer');
    }

    function ketidakhadiran()
    {
        $this->load->view('template/header');
        $this->load->view('absensi_ketidakhadiran');
        $this->load->view('template/footer');
    }

    function periode()
    {
        $this->load->view('template/header');
        $this->load->view('periode');
        $this->load->view('template/footer');
    }
}
