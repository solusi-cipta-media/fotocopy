<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
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
        // $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        // $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        $data['sess_menu'] = 'karyawan';

        $this->load->view('template/header', $data);
        $this->load->view('karyawan');
        $this->load->view('template/footer');
    }

    public function ajax_table_karyawan()
    {

        // $get_role_id = $this->crud->get_all("user_role")->result_array();

        $table = 'karyawan'; //nama tabel dari database
        $column_order = array('id', 'nik', 'nama', 'alamat', 'no_ktp', 'handphone', 'jenis_kelamin', 'photo', 'reg_date', 'role_id', 'id'); //field yang ada di table user
        $column_search = array('id', 'nik', 'nama', 'alamat', 'no_ktp', 'handphone', 'jenis_kelamin', 'photo', 'reg_date', 'role_id'); //field yang diizin untuk pencarian 
        $select = 'id, nik, nama, alamat, no_ktp, handphone, jenis_kelamin, photo, reg_date, role_id';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['nik'] = $key->nik;
            $row['data']['nama'] = $key->nama;
            $row['data']['alamat'] = $key->alamat;
            $row['data']['no_ktp'] = $key->no_ktp;
            $row['data']['handphone'] = $key->handphone;
            $row['data']['jenis_kelamin'] = $key->jenis_kelamin;
            $row['data']['photo'] = $key->photo;
            $row['data']['reg_date'] = $key->reg_date;
            $row['data']['role_id'] = $key->role_id;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function delete_data()
    {
        $table = $this->input->post('table');
        // $name = $this->input->post('name');
        if ($this->crud->delete($table, ['id' => $this->input->post('id')])) {
            $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];

        echo json_encode($response);
    }

    public function reset_pass()
    {
        $id = $this->input->post('id');
        $table = $this->input->post('table');

        $where = array(
            'id' => $id
        );

        $data = array(
            'password' => password_hash('12345', PASSWORD_DEFAULT)
        );

        if ($this->crud->update($table, $data, $where)) {
            $response = ['status' => 'success', 'message' => 'Success Reset Password!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Reset Password!'];

        echo json_encode($response);
    }

    public function insert_data_user()
    {
        $table = $this->input->post("table");

        $config['upload_path']          = "assets/media/karyawan/";
        $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG|JPEG';
        $config['max_size']             = 1024;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        $data = $this->input->post();
        unset($data['table']);

        $data['password'] = password_hash('12345', PASSWORD_DEFAULT);
        $data['is_active'] = '1';
        //ambil kode terakhir
        // $getData = $this->crud->get_all_limit($table)->row_array();

        // $a = explode('-', $getData['nik']);
        // $seq = $a[1] + 1;
        // $data['nik'] = 'P-' . $seq;


        if (count($_FILES) > 0) {
            if (!$this->upload->do_upload('file')) {
                $response = array('status' => 'failed', 'message' => $this->upload->display_errors());
                echo json_encode($response);
                die;
            }
            $data_upload = $this->upload->data();
            $data['photo'] = $data_upload['file_name'];
        }

        $insert_data = $this->crud->insert($table, $data);

        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function update_data_user()
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
        $data['password'] = password_hash('12345', PASSWORD_DEFAULT);
        $data['is_active'] = '1';

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


        if ($update > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Edit Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Edit Data!'];

        echo json_encode($response);
    }

    public function edituser()
    {
        $table = $this->input->post('table');
        $where = array(
            'id' => $this->input->post('id')
        );

        $result = $this->crud->get_where($table, $where)->result();


        echo json_encode($result);
    }

    public function cek_user()
    {
        $table = $this->input->post('table');

        $where = array(
            'userid' => $this->input->post('userid')
        );

        $result = $this->crud->get_where($table, $where)->row();

        if ($result) {
            $data = 400;
        } else {
            $data = 200;
        }

        echo json_encode($data);
    }

    public function cek_user_ajax()
    {
        $table = $this->input->post('table');

        $where = array(
            'userid' => $this->input->post('userid')
        );

        $result = $this->crud->get_where($table, $where)->result();


        echo json_encode($result);
    }
}
