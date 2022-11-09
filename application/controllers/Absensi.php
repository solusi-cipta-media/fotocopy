<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
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

        $data['sess_menu'] = 'absensi';

        $this->load->view('template/header', $data);
        $this->load->view('absensi_kehadiran');
        $this->load->view('template/footer');
    }

    public function ketidakhadiran()
    {
        //ambil data notifikasi
        // $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        // $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        $data['sess_menu'] = 'ketidakhadiran';

        $this->load->view('template/header', $data);
        $this->load->view('absensi_ketidakhadiran');
        $this->load->view('template/footer');
    }

    public function periode()
    {
        //ambil data notifikasi
        // $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        // $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        $data['sess_menu'] = 'periode';

        $this->load->view('template/header', $data);
        $this->load->view('periode');
        $this->load->view('template/footer');
    }

    public function ajax_table_absensi()
    {

        // $get_role_id = $this->crud->get_all("user_role")->result_array();

        $table = 'absensi'; //nama tabel dari database
        $column_order = array('id', 'nama_karyawan', 'nomor_induk', 'tanggal', 'clock_in', 'clock_out', 'latitude_in', 'longitude_in', 'latitude_out', 'longitude_out', 'terlambat', 'pulang_cepat', 'working_hours', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'nama_karyawan', 'nomor_induk', 'tanggal', 'clock_in', 'clock_out', 'latitude_in', 'longitude_in', 'latitude_out', 'longitude_out', 'terlambat', 'pulang_cepat', 'working_hours', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, nama_karyawan, nomor_induk, tanggal, clock_in, clock_out, latitude_in, longitude_in, latitude_out,longitude_out, terlambat, pulang_cepat,working_hours, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['nama_karyawan'] = $key->nama_karyawan;
            $row['data']['nomor_induk'] = $key->nomor_induk;
            $row['data']['tanggal'] = date('d-M-Y', strtotime($key->tanggal));
            $row['data']['clock_in'] = date('d-M-Y H:i:sa', strtotime($key->clock_in));
            $row['data']['clock_out'] = date('d-M-Y H:i:sa', strtotime($key->clock_out));
            $row['data']['latitude_in'] = $key->latitude_in;
            $row['data']['longitude_in'] = $key->longitude_in;
            $row['data']['latitude_out'] = $key->latitude_out;
            $row['data']['longitude_out'] = $key->longitude_out;
            $row['data']['terlambat'] = $key->terlambat;
            $row['data']['pulang_cepat'] = $key->pulang_cepat;
            $row['data']['working_hours'] = $key->working_hours;
            $row['data']['date_created'] = $key->date_created;

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

    public function ajax_table_absensi_ketidakhadiran()
    {

        // $get_role_id = $this->crud->get_all("user_role")->result_array();

        $table = 'absensi_ketidakhadiran'; //nama tabel dari database
        $column_order = array('id', 'nama_karyawan', 'nomor_induk', 'tanggal', 'tipe', 'status', 'bukti', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'nama_karyawan', 'nomor_induk', 'tanggal', 'tipe', 'status', 'bukti',  'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, nama_karyawan, nomor_induk, tanggal, tipe, status, bukti,date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['nama_karyawan'] = $key->nama_karyawan;
            $row['data']['nomor_induk'] = $key->nomor_induk;
            $row['data']['tanggal'] = date('d-M-Y', strtotime($key->tanggal));
            $row['data']['tipe'] = $key->tipe;
            $row['data']['status'] = $key->status;
            $row['data']['bukti'] = $key->bukti;
            $row['data']['date_created'] = $key->date_created;

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

    public function ajax_table_absensi_periode()
    {

        // $get_role_id = $this->crud->get_all("user_role")->result_array();

        $table = 'absensi_periode'; //nama tabel dari database
        $column_order = array('id', 'tanggal', 'status', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'tanggal', 'status', 'date_created', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, tanggal, status, date_created,date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['tanggal'] = date('d-M-Y', strtotime($key->tanggal));
            $row['data']['status'] = $key->status;
            $row['data']['date_created'] = $key->date_created;

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

    public function approve_ketidakhadiran()
    {
        //set time jakarta WIB
        // date_default_timezone_set('Asia/Jakarta');

        $table = $this->input->post('table');
        $id = $this->input->post('id');


        $data = array(
            'status' => 'APPROVED',
        );
        $where = array(
            'id' => $id
        );


        if ($this->crud->update($table, $data, $where)) {
            $response = ['status' => 'success', 'message' => 'Success Approve Ketidakhadiran!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Approve Ketidakhadiran!'];

        echo json_encode($response);
    }

    public function reject_ketidakhadiran()
    {
        //set time jakarta WIB
        // date_default_timezone_set('Asia/Jakarta');

        $table = $this->input->post('table');
        $id = $this->input->post('id');


        $data = array(
            'status' => 'REJECTED',
        );
        $where = array(
            'id' => $id
        );


        if ($this->crud->update($table, $data, $where)) {
            $response = ['status' => 'success', 'message' => 'Success Reject Ketidakhadiran!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Reject Ketidakhadiran!'];

        echo json_encode($response);
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

    public function insert_data_periode()
    {
        $table = $this->input->post("table");


        $data = $this->input->post();
        $data['masuk'] = '08:00:00';
        $data['pulang'] = '17:00:00';
        unset($data['table']);

        $insert_data = $this->crud->insert($table, $data);

        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }
}
