<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak extends CI_Controller
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

        //ambil data customer
        $data['customer'] = $this->crud->get_all('customer')->result_array();

        $data['sess_menu'] = 'kontrak';

        $this->load->view('template/header', $data);
        $this->load->view('kontrak');
        $this->load->view('template/footer');
    }

    public function notifikasi()
    {
        //ambil data notifikasi
        // $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        // $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        $data['sess_menu'] = 'kontrak';

        $this->load->view('template/header', $data);
        $this->load->view('notifikasi');
        $this->load->view('template/footer');
    }

    public function notifikasidetails()
    {
        //ambil data notifikasi
        // $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        // $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        //ambil data untuk notifikasi details
        $data['details'] = $this->crud->get_where('notifikasi_kontrak', ['id' => $_GET["id"]])->row_array();

        //update status read
        $this->crud->update('notifikasi_kontrak', ['status_read' => 1], ['id' => $_GET["id"]]);

        $data['sess_menu'] = 'kontrak';

        $this->load->view('template/header', $data);
        $this->load->view('notifikasidetails');
        $this->load->view('template/footer');
    }

    public function ajax_table_kontrak()
    {

        // $get_role_id = $this->crud->get_all("user_role")->result_array();

        $table = 'kontrak'; //nama tabel dari database
        $column_order = array('id', 'nomor_kontrak', 'customer', 'awal_kontrak', 'akhir_kontrak', 'reminder', 'dokumen', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'nomor_kontrak', 'customer', 'awal_kontrak', 'akhir_kontrak', 'reminder', 'dokumen', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, nomor_kontrak, customer, awal_kontrak, akhir_kontrak, reminder, dokumen, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['nomor_kontrak'] = $key->nomor_kontrak;
            $row['data']['customer'] = $key->customer;
            $row['data']['awal_kontrak'] = date('d-M-Y', strtotime($key->awal_kontrak));
            $row['data']['akhir_kontrak'] = date('d-M-Y', strtotime($key->akhir_kontrak));
            $row['data']['reminder'] = date('d-M-Y', strtotime($key->reminder));
            $row['data']['dokumen'] = $key->dokumen;
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

    public function ajax_table_notifikasi_kontrak()
    {

        // $get_role_id = $this->crud->get_all("user_role")->result_array();

        $table = 'notifikasi_kontrak'; //nama tabel dari database
        $column_order = array('id', 'customer', 'pesan', 'dokumen', 'status_read', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'customer', 'pesan', 'dokumen', 'status_read', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, customer, pesan, dokumen, status_read, date_created';
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
            $row['data']['pesan'] = $key->pesan;
            $row['data']['dokumen'] = $key->dokumen;
            $row['data']['status_read'] = $key->status_read;
            $row['data']['date_created'] = date('d-M-Y', strtotime($key->date_created));

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

    public function insert_data_kontrak()
    {
        $table = $this->input->post("table");

        $config['upload_path']          = "assets/media/kontrak/";
        $config['allowed_types']        = 'pdf|PDF';
        $config['max_size']             = 1024;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        $data = $this->input->post();
        unset($data['table']);


        if (count($_FILES) > 0) {
            if (!$this->upload->do_upload('file')) {
                $response = array('status' => 'failed', 'message' => $this->upload->display_errors());
                echo json_encode($response);
                die;
            }
            $data_upload = $this->upload->data();
            $data['dokumen'] = $data_upload['file_name'];
        }

        $insert_data = $this->crud->insert($table, $data);

        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function update_data_kontrak()
    {
        $table = $this->input->post("table");
        $id = $this->input->post("id");

        $config['upload_path']          = "assets/media/kontrak/";
        $config['allowed_types']        = 'pdf|PDF';
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
            $data['dokumen'] = $data_upload['file_name'];
        }

        $update = $this->crud->update($table, $data, ['id' => $id]);


        if ($update > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Edit Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Edit Data!'];

        echo json_encode($response);
    }

    public function editkontrak()
    {
        $table = $this->input->post('table');
        $where = array(
            'id' => $this->input->post('id')
        );

        $result = $this->crud->get_where($table, $where)->result();


        echo json_encode($result);
    }

    function select2_group()
    {
        $q = $this->input->get('q');
        $page = $this->input->get('page');

        $limit = 10;
        $offset = $page * $limit;
        $this->db->select("*, nama as id, nama as text");
        $this->db->from("customer");
        $this->db->like("nama", $q);
        $this->db->limit($limit, $offset);
        $data = $this->db->get()->result();

        $output =  [
            "items" => $data,
            "count" => count($data)
        ];

        // $this->res->json200($output);
        echo json_encode($output);
    }
}
