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

    function listoh()
    {
        $this->load->view('template/header');
        $this->load->view('list_overhaul');
        $this->load->view('template/footer');
    }

    function prosesoh()
    {
        $this->load->view('template/header');
        $this->load->view('proses_overhaul');
        $this->load->view('template/footer');
    }

    function generate_qr() //nanti digunakan untuk generate QR
    {
        $qrcode = 'AGUS';

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name = $qrcode . '.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = $qrcode; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        // $this->mahasiswa_model->simpan_mahasiswa($nim, $nama, $prodi, $image_name); //simpan ke database
        redirect('mahasiswa'); //redirect ke mahasiswa usai simpan data
    }

    function cetakqr()
    {
        $this->load->view('template/header');
        $this->load->view('report/qrcode');
        $this->load->view('template/footer');
    }
}
