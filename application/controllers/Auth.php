<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->library('form_validation');
    // }

    public function index()
    {

        $this->form_validation->set_rules('userid', 'Userid', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }



    private function _login()
    {
        $userid = $this->input->post('userid');
        $password = $this->input->post('password');



        //ambil data dari model
        $table = 'karyawan';
        $where = array(
            'userid' => $userid,
        );
        $user = $this->Crud->get_where($table, $where)->row_array();

        // echo $this->db->last_query();
        // die;
        // $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // var_dump($user);
        // die;
        if ($user) {
            //cek dulu member aktive atau tidak
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    //jika sukses
                    $data = array(
                        'id' => $user['id'],
                        'userid' => $user['userid'],
                        'role_id' => $user['role_id'],
                        'name' => $user['nama'],
                        'photo' => $user['photo'],
                        'nik' => $user['nik'],
                    );
                    //buat session
                    $this->session->set_userdata($data);
                    // redirect('dashboard');
                    //cek dulu apakah ada reminder kontrak hari ini, jika ada buat notifikasi
                    $where_kontrak = array(
                        'reminder' => date('Y-m-d'),
                        'status_reminder' => 0
                    );
                    $getReminder = $this->Crud->get_where('kontrak', $where_kontrak)->result_array();

                    if ($getReminder) {
                        foreach ($getReminder as $key => $value) {
                            //tuliskan ke tabel notifikasi
                            $data = array(
                                'customer' => $value['customer'],
                                'pesan' => 'Kontrak dengan ' . $value['customer'] . ' akan segera berakhir pada ' . date('d-M-Y', strtotime($value['akhir_kontrak'])) . '!',
                                'dokumen' => $value['dokumen']
                            );

                            $this->Crud->insert('notifikasi_kontrak', $data);
                            // update status_reminder di tabel kontrak
                            $data_status = array(
                                'status_reminder' => 1
                            );
                            $where_status = array(
                                'customer' => $value['customer'],
                                'reminder' => date('Y-m-d')
                            );
                            $this->Crud->update('kontrak', $data_status, $where_status);

                            // echo $this->db->last_query();
                            // die;
                        }
                    }
                    // die;
                    if ($user['role_id'] == 'ADMIN' || $user['role_id'] == '1') {
                        redirect('dashboard');
                    } else {
                        redirect('absen_selfie');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Salah Password</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Userid belum diaktifkan</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Userid belum terdaftar</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('photo');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda sudah keluar.</div>');
        redirect('auth');
    }
}
