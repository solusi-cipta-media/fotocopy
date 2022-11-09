<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        //ambil data notifikasi
        $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        $data['sess_menu'] = 'dashboard';

        $this->load->view('template/header', $data);
        $this->load->view('dashboard');
        $this->load->view('template/footer');
    }

    public function profil()
    {
        //ambil data notifikasi
        // $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        // $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        $data['sess_menu'] = 'dashboard';

        $this->load->view('template/header', $data);
        $this->load->view('profil');
        $this->load->view('template/footer');
    }

    public function getdataprofil()
    {
        $table = $this->input->post('table');
        $where = array(
            'userid' => $this->session->userdata('userid')
        );

        $result = $this->crud->get_where($table, $where)->result();


        echo json_encode($result);
    }

    public function getnotif()
    {
        $table = $this->input->post('table');
        $where = array(
            'status_read' => 0
        );

        $result = $this->crud->get_where($table, $where)->num_rows();


        echo json_encode($result);
    }

    public function update_data_profil()
    {
        $table = $this->input->post("table");
        $id = $this->input->post("id");

        $config['upload_path']          = "assets/media/karyawan/";
        $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG|JPEG';
        $config['max_size']             = 1024;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        $data = $this->input->post();
        unset($data['table']);
        // unset($data['password']);

        if (count($_FILES) > 0) {
            if (!$this->upload->do_upload('file')) {
                $response = array('status' => 'failed', 'message' => $this->upload->display_errors());
                echo json_encode($response);
                die;
            }
            $data_upload = $this->upload->data();
            $data['photo'] = $data_upload['file_name'];
        }

        $update = $this->crud->update($table, $data, ['id' => $id]);

        $this->session->unset_userdata('name');
        $this->session->unset_userdata('photo');

        $data = array(
            'name' => $data['nama'],
            'photo' => $data['photo'],
        );
        //buat session
        $this->session->set_userdata($data);


        if ($update > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Edit Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Edit Data!'];

        echo json_encode($response);
    }

    public function update_data_password()
    {
        $table = $this->input->post("table");
        $id = $this->input->post("id");

        $data = $this->input->post();
        $password = password_hash($data['password_mentah'], PASSWORD_DEFAULT);

        unset($data['table']);
        unset($data['password_mentah']);

        $data['password'] = $password;

        $update = $this->crud->update($table, $data, ['id' => $id]);

        if ($update > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Edit Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Edit Data!'];

        echo json_encode($response);
    }

    public function update_data_profil_all()
    {
        $table = $this->input->post("table");
        $id = $this->input->post("id");

        $data = $this->input->post();

        unset($data['table']);

        $update = $this->crud->update($table, $data, ['id' => $id]);

        if ($update > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Edit Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Edit Data!'];

        echo json_encode($response);
    }

    public function remove()
    {
        $table = $this->input->post("table");
        $id = $this->input->post("id");


        $data = array(
            'status_read' => 1
        );


        $update = $this->crud->update($table, $data, ['id' => $id]);


        if ($update > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Remove Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Remove Data!'];

        echo json_encode($response);
    }
}
