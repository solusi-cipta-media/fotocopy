<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
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

        $data['sess_menu'] = 'customer';

        $this->load->view('template/header', $data);
        $this->load->view('customer');
        $this->load->view('template/footer');
    }

    public function ajax_table_customer()
    {

        // $get_role_id = $this->crud->get_all("user_role")->result_array();

        $table = 'customer'; //nama tabel dari database
        $column_order = array('id', 'kode', 'nama', 'alamat', 'klasifikasi', 'contact_person', 'hp_contact', 'longitude', 'latitude', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'kode', 'nama', 'alamat', 'klasifikasi', 'contact_person', 'hp_contact', 'longitude', 'latitude', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, kode, nama, alamat, klasifikasi, contact_person, hp_contact, longitude, latitude, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['kode'] = $key->kode;
            $row['data']['nama'] = $key->nama;
            $row['data']['alamat'] = $key->alamat;
            $row['data']['klasifikasi'] = $key->klasifikasi;
            $row['data']['contact_person'] = $key->contact_person;
            $row['data']['hp_contact'] = $key->hp_contact;
            $row['data']['longitude'] = $key->longitude;
            $row['data']['latitude'] = $key->latitude;
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

    public function getkodeklien()
    {

        $result = $this->Crud->get_all_limit('customer')->row_array();

        if ($this->db->affected_rows() == true) {
            // echo $this->db->last_query();
            // die;

            $a = explode("-", $result['kode']);
            $b = $a[1] + 1;
            $nomer = 'KLN-' . $b;
        } else {
            $nomer = 'KLN-100001';
        }

        echo json_encode($nomer);
    }

    public function insert_data_customer()
    {
        $table = $this->input->post("table");


        $data = $this->input->post();
        unset($data['table']);

        $insert_data = $this->crud->insert($table, $data);

        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function update_data_customer()
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

    public function editcustomer()
    {
        $table = $this->input->post('table');
        $where = array(
            'id' => $this->input->post('id')
        );

        $result = $this->crud->get_where($table, $where)->result();


        echo json_encode($result);
    }
}
