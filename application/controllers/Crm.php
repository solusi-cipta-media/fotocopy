<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crm extends CI_Controller
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
        $this->load->model("M_crm", "m_crm");
    }

    public function index()
    {
        //ambil data customer
        $data['customer'] = $this->crud->get_all('customer')->result_array();

        $data['sess_menu'] = 'aktivitascrm';

        $this->load->view('template/header', $data);
        $this->load->view('aktivitascrm');
        $this->load->view('template/footer');
    }

    public function daily()
    {
        //ambil data customer
        $data['karyawan'] = $this->crud->get_all('karyawan')->result_array();

        $data['sess_menu'] = 'dailyreport';

        $this->load->view('template/header', $data);
        $this->load->view('dailyreport');
        $this->load->view('template/footer');
    }

    public function ajax_table_crm()
    {


        $table = 'crm'; //nama tabel dari database
        $column_order = array('id', 'customer', 'pic_customer', 'no_hp', 'status', 'uraian', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'customer', 'pic_customer', 'no_hp', 'status',  'uraian', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, customer, pic_customer, no_hp, status, uraian, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['customer'] = $key->customer;
            $row['data']['pic_customer'] = $key->pic_customer;
            $row['data']['no_hp'] = $key->no_hp;
            $row['data']['status'] = $key->status;
            $row['data']['uraian'] = $key->uraian;
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

    public function ajax_table_report()
    {

        $where = [];

        $table = 'daily_report'; //nama tabel dari database
        $column_order = array('id', 'nama_karyawan', 'nomor_induk', 'tanggal', 'aktivitas', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'nama_karyawan', 'nomor_induk', 'tanggal', 'aktivitas',  'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, nama_karyawan, nomor_induk, tanggal, aktivitas, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->m_crm->get_datatables($table, $select, $column_order, $column_search, $order, $where);
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
            $row['data']['aktivitas'] = $key->aktivitas;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_crm->count_all($table),
            "recordsFiltered" => $this->m_crm->count_filtered($table, $select, $column_order, $column_search, $order, $where),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function approve_selesai()
    {
        //set time jakarta WIB
        // date_default_timezone_set('Asia/Jakarta');

        $table = $this->input->post('table');
        $id = $this->input->post('id');

        $data = array(
            'status' => 'CLOSED',
        );
        $where = array(
            'id' => $id
        );


        if ($this->crud->update($table, $data, $where)) {
            $response = ['status' => 'success', 'message' => 'Success Approve Selesai Overhaul!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Approve Selesai Overhaul!'];

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

    public function insert_kasus()
    {
        $table = $this->input->post("table");

        $data = $this->input->post();

        $a = explode('-', $data['customer_all']);

        $data['customer'] = $a[0];
        $data['pic_customer'] = $a[1];
        $data['no_hp'] = $a[2];
        $data['status'] = 'OPEN';

        unset($data['table']);
        unset($data['customer_all']);

        $insert_data = $this->crud->insert($table, $data);

        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function insert_aktivitas()
    {
        $table = $this->input->post("table");

        $data = $this->input->post();

        $a = explode('-', $data['karyawan_all']);

        $data['nama_karyawan'] = $a[0];
        $data['nomor_induk'] = $a[1];

        unset($data['table']);
        unset($data['karyawan_all']);

        $insert_data = $this->crud->insert($table, $data);

        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }
}
