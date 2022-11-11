<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kerjaluar extends CI_Controller
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
        $this->load->model("M_kerja", "m_kerja");
    }

    public function index()
    {
        //ambil data notifikasi
        // $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        // $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        //ambil data teknisi
        $data['teknisi'] = $this->crud->get_where('karyawan', ['role_id' => 'TEKNISI'])->result_array();
        //ambil data customer
        $data['customer'] = $this->crud->get_all('customer')->result_array();
        //ambil data mesin
        $data['mesin'] = $this->crud->get_where('overhaul', ['status' => 'READY'])->result_array();

        $data['sess_menu'] = 'jadwalspk';

        $this->load->view('template/header', $data);
        $this->load->view('jadwalspk');
        $this->load->view('template/footer');
    }

    public function proseskerja()
    {
        //ambil data notifikasi
        // $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        // $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        //ambil data teknisi
        $data['teknisi'] = $this->crud->get_where('karyawan', ['role_id' => 'TEKNISI'])->result_array();
        //ambil data customer
        $data['customer'] = $this->crud->get_all('customer')->result_array();

        $data['sess_menu'] = 'proseskerja';

        $this->load->view('template/header', $data);
        $this->load->view('proseskerja');
        $this->load->view('template/footer');
    }

    public function machinerecord()
    {
        //ambil data notifikasi
        // $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        // $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end


        $data['sess_menu'] = 'machinerecord';

        $this->load->view('template/header', $data);
        $this->load->view('machinerecord');
        $this->load->view('template/footer');
    }

    public function catatanmeter()
    {
        //ambil data notifikasi
        // $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        // $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        $data['customer'] = $this->crud->get_all('customer')->result_array();


        $data['sess_menu'] = 'catatanmeter';

        $this->load->view('template/header', $data);
        $this->load->view('catatanmeter');
        $this->load->view('template/footer');
    }

    public function cetakmeter()
    {
        //ambil data
        $data['customer'] = $this->crud->get_where('catatan_meter', ['id' => $this->input->get('id')])->row_array();

        $this->load->view('report/catatanmeter', $data);
    }

    public function listtraining()
    {

        $this->load->view('report/listtraining');
    }

    public function formkirim()
    {
        //ambil data
        $data['customer'] = $this->crud->get_where('kerjaluar', ['id' => $this->input->get('id')])->row_array();

        $this->load->view('report/formkirim', $data);
    }

    public function ajax_table_spk()
    {


        $table = 'kerjaluar'; //nama tabel dari database
        $column_order = array('id', 'customer', 'jenis', 'tgl_kerja', 'lokasi', 'latitude', 'longitude', 'id_karyawan', 'teknisi', 'time_in', 'time_out', 'status', 'date_created', 'uraian', 'model', 'id'); //field yang ada di table user
        $column_search = array('id', 'customer', 'jenis', 'tgl_kerja', 'lokasi', 'latitude', 'longitude', 'id_karyawan', 'teknisi', 'time_in', 'time_out', 'status', 'date_created', 'uraian', 'model'); //field yang diizin untuk pencarian 
        $select = 'id, customer, jenis, tgl_kerja, lokasi, latitude, longitude, teknisi, id_karyawan, time_in, time_out, status, date_created, uraian, model';
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
            $row['data']['jenis'] = $key->jenis;
            $row['data']['tgl_kerja'] = date('d-M-Y', strtotime($key->tgl_kerja));
            $row['data']['lokasi'] = $key->lokasi;
            $row['data']['latitude'] = $key->latitude;
            $row['data']['longitude'] = $key->longitude;
            $row['data']['id_karyawan'] = $key->id_karyawan;
            $row['data']['teknisi'] = $key->teknisi;
            $row['data']['time_in'] = $key->time_in;
            $row['data']['time_out'] = $key->time_out;
            $row['data']['status'] = $key->status;
            $row['data']['date_created'] = $key->date_created;
            $row['data']['uraian'] = $key->uraian;
            $row['data']['model'] = $key->model;

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

    public function ajax_table_catatanmeter()
    {


        $table = 'catatan_meter'; //nama tabel dari database
        $column_order = array('id', 'customer', 'alamat', 'kolektor', 'status', 'tgl_instal', 'model', 'lokasi', 'telp', 'fax', 'nomor_kontrak', 'awal', 'akhir', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'customer', 'alamat', 'kolektor', 'status', 'tgl_instal', 'model', 'lokasi', 'telp', 'fax', 'nomor_kontrak', 'awal', 'akhir', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, customer, alamat, kolektor, status, tgl_instal, model, telp, lokasi, fax, nomor_kontrak, awal, akhir, date_created';
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
            $row['data']['alamat'] = $key->alamat;
            $row['data']['kolektor'] = $key->kolektor;
            $row['data']['status'] = $key->status;
            $row['data']['tgl_instal'] = date('d-M-Y', strtotime($key->tgl_instal));
            $row['data']['model'] = $key->model;
            $row['data']['lokasi'] = $key->lokasi;
            $row['data']['telp'] = $key->telp;
            $row['data']['fax'] = $key->fax;
            $row['data']['nomor_kontrak'] = $key->nomor_kontrak;
            $row['data']['awal'] = date('d-M-Y', strtotime($key->awal));
            $row['data']['akhir'] = date('d-M-Y', strtotime($key->akhir));
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

    public function ajax_table_histori()
    {
        $where = array(
            'id_karyawan' => $this->input->post('id_karyawan')
        );

        $table = 'kerjaluar'; //nama tabel dari database
        $column_order = array('id', 'customer', 'jenis', 'tgl_kerja', 'lokasi', 'latitude', 'longitude', 'id_karyawan', 'teknisi', 'time_in', 'time_out', 'status', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'customer', 'jenis', 'tgl_kerja', 'lokasi', 'latitude', 'longitude', 'id_karyawan', 'teknisi', 'time_in', 'time_out', 'status', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, customer, jenis, tgl_kerja, lokasi, latitude, longitude, teknisi, id_karyawan, time_in, time_out, status, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['customer'] = $key->customer;
            $row['data']['jenis'] = $key->jenis;
            $row['data']['tgl_kerja'] = date('d-M-Y', strtotime($key->tgl_kerja));
            $row['data']['lokasi'] = $key->lokasi;
            $row['data']['latitude'] = $key->latitude;
            $row['data']['longitude'] = $key->longitude;
            $row['data']['id_karyawan'] = $key->id_karyawan;
            $row['data']['teknisi'] = $key->teknisi;
            $row['data']['time_in'] = $key->time_in;
            $row['data']['time_out'] = $key->time_out;
            $row['data']['status'] = $key->status;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order, $where),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_proses_kerja()
    {
        if ($this->session->userdata('role_id') == 'ADMIN') {
            $where = null;
        } else {
            $where = array(
                'id_karyawan' => $this->session->userdata('id')
            );
        }

        $table = 'kerjaluar'; //nama tabel dari database
        $column_order = array('id', 'customer', 'jenis', 'tgl_kerja', 'lokasi', 'latitude', 'longitude', 'id_karyawan', 'teknisi', 'time_in', 'time_out', 'status', 'nomor_mesin', 'model', 'uraian', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'customer', 'jenis', 'tgl_kerja', 'lokasi', 'latitude', 'longitude', 'id_karyawan', 'teknisi', 'time_in', 'time_out', 'status', 'nomor_mesin', 'model', 'uraian', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, customer, jenis, tgl_kerja, lokasi, latitude, longitude, teknisi, id_karyawan, time_in, time_out, status, nomor_mesin, model, uraian, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['customer'] = $key->customer;
            $row['data']['jenis'] = $key->jenis;
            $row['data']['tgl_kerja'] = date('d-M-Y', strtotime($key->tgl_kerja));
            $row['data']['lokasi'] = $key->lokasi;
            $row['data']['latitude'] = $key->latitude;
            $row['data']['longitude'] = $key->longitude;
            $row['data']['id_karyawan'] = $key->id_karyawan;
            $row['data']['teknisi'] = $key->teknisi;
            $row['data']['time_in'] = date('d-M-Y H:i:sa', strtotime($key->time_in));
            $row['data']['time_out'] = date('d-M-Y H:i:sa', strtotime($key->time_in));
            $row['data']['status'] = $key->status;
            $row['data']['uraian'] = $key->uraian;
            $row['data']['nomor_mesin'] = $key->nomor_mesin;
            //ambil status mesin
            $where1 = array(
                'nomor_mesin' => $key->nomor_mesin
            );
            $getstatus = $this->crud->get_where('overhaul', $where1)->row_array();
            $row['data']['status_mesin'] = $getstatus['status'];
            //end status mesin

            $row['data']['model'] = $key->model;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order, $where),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_machinerecord()
    {
        // echo $this->input->post('search_nomor');
        // die;

        $where = [];

        $table = 'kerjaluar'; //nama tabel dari database
        $column_order = array('id', 'customer', 'jenis', 'tgl_kerja', 'lokasi', 'latitude', 'longitude', 'id_karyawan', 'teknisi', 'nomor_mesin', 'serial_number', 'model', 'meter', 'uraian', 'time_in', 'time_out', 'status', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'customer', 'jenis', 'tgl_kerja', 'lokasi', 'latitude', 'longitude', 'id_karyawan', 'teknisi', 'nomor_mesin', 'serial_number', 'model', 'meter', 'uraian', 'time_in', 'time_out', 'status', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, customer, jenis, tgl_kerja, lokasi, latitude, longitude, teknisi, nomor_mesin, serial_number, model, meter, uraian, id_karyawan, time_in, time_out, status, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->m_kerja->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['customer'] = $key->customer;
            $row['data']['jenis'] = $key->jenis;
            $row['data']['tgl_kerja'] = date('d-M-Y', strtotime($key->tgl_kerja));
            $row['data']['lokasi'] = $key->lokasi;
            $row['data']['latitude'] = $key->latitude;
            $row['data']['longitude'] = $key->longitude;
            $row['data']['id_karyawan'] = $key->id_karyawan;
            $row['data']['teknisi'] = $key->teknisi;
            $row['data']['nomor_mesin'] = $key->nomor_mesin;
            $row['data']['serial_number'] = $key->serial_number;
            $row['data']['model'] = $key->model;
            $row['data']['meter'] = $key->meter;
            $row['data']['uraian'] = $key->uraian;
            $row['data']['time_in'] = $key->time_in;
            $row['data']['time_out'] = $key->time_out;
            $row['data']['status'] = $key->status;
            $row['data']['date_created'] = $key->date_created;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_kerja->count_all($table),
            "recordsFiltered" => $this->m_kerja->count_filtered($table, $select, $column_order, $column_search, $order, $where),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function update_data_teknisi_langsung()
    {
        //set time jakarta WIB
        date_default_timezone_set('Asia/Jakarta');

        $table = $this->input->post("table");
        $id = $this->input->post("id");



        $data = $this->input->post();
        $a = explode('-', $data['teknisi_all']);
        $id_karyawan = $a[0];
        $teknisi = $a[1];

        $data['id_karyawan'] = $id_karyawan;
        $data['teknisi'] = $teknisi;
        unset($data['table']);
        unset($data['teknisi_all']);


        $update = $this->crud->update($table, $data, ['id' => $id]);


        if ($update > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Teknisi!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Teknisi!'];

        echo json_encode($response);
    }

    public function ubah_status()
    {

        $table = $this->input->post("table");
        $nomor_mesin = $this->input->post("nomor_mesin");
        $status = $this->input->post("status");




        $data = array(
            'status' => $status
        );

        $where = array(
            'nomor_mesin' => $nomor_mesin
        );


        $update = $this->crud->update($table, $data, $where);


        if ($update > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Ubah Status!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Ubah Status!'];

        echo json_encode($response);
    }

    public function input_catatan_meter()
    {
        $table = $this->input->post("table");


        $data = $this->input->post();
        $a = explode('-', $data['customer_all']);
        $customer = $a[0];
        $alamat = $a[1];
        $status = $a[2];
        $telp = $a[3];

        $data['customer'] = $customer;
        $data['alamat'] = $alamat;
        $data['lokasi'] = $alamat;
        $data['status'] = $status;
        $data['telp'] = $telp;

        unset($data['table']);
        unset($data['customer_all']);


        $insert = $this->crud->insert($table, $data);


        if ($insert > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Membuat Form Catatan Meter!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Membuat Form Catatan Meter!'];

        echo json_encode($response);
    }

    public function register_spk()
    {
        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        //ambil data customer
        $customer = $this->crud->get_where('customer', ['id' => $this->input->post('customer')])->row_array();

        $a = explode('-', $data['nomor_mesin']);

        if ($data['jenis'] != 'INVOICE') {
            $data['serial_number'] = $a[0];
            $data['nomor_mesin'] = $a[1];
            $data['model'] = $a[2];
            $data['tegangan'] = $a[3];
        }

        $data['customer'] = $customer['nama'];
        $data['lokasi'] = $customer['alamat'];
        $data['latitude'] = $customer['latitude'];
        $data['longitude'] = $customer['longitude'];
        $data['status'] = 'OPEN';


        $insert_data = $this->crud->insert($table, $data);

        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function get_timein()
    {
        //set time jakarta WIB
        date_default_timezone_set('Asia/Jakarta');

        $table = $this->input->post('table');
        $id = $this->input->post('id');

        $data = array(
            'status' => 'PROSES',
            'time_in' => date('Y-m-d H:i:sa'),
        );
        $where = array(
            'id' => $id
        );


        if ($this->crud->update($table, $data, $where)) {
            $response = ['status' => 'success', 'message' => 'Success record Time IN!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Gagal record Time IN!'];

        echo json_encode($response);
    }
    public function get_timeout()
    {
        //set time jakarta WIB
        date_default_timezone_set('Asia/Jakarta');

        $table = $this->input->post('table');
        $id = $this->input->post('id');

        $data = array(
            'time_out' => date('Y-m-d H:i:sa'),
        );
        $where = array(
            'id' => $id
        );


        if ($this->crud->update($table, $data, $where)) {
            $response = ['status' => 'success', 'message' => 'Success record Time OUT!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Gagal record Time OUT!'];

        echo json_encode($response);
    }

    public function machine_record()
    {

        $table = $this->input->post("table");
        $id = $this->input->post("id");



        $data = $this->input->post();

        $data['uraian'] = $this->input->post("uraian");
        $data['meter'] = $this->input->post("meter");
        unset($data['table']);


        $update = $this->crud->update($table, $data, ['id' => $id]);


        if ($update > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Update Machine Record!'];
        } else
            $response = ['status' => 'success', 'message' => 'Tidak ada data berubah di Machine Record!'];

        echo json_encode($response);
    }

    public function get_machinerecord()
    {
        $table = $this->input->post('table');
        $where = array(
            'id' => $this->input->post('id')
        );

        $result = $this->crud->get_where($table, $where)->result();


        echo json_encode($result);
    }

    public function selesai_proses()
    {


        $table = $this->input->post('table');
        $id = $this->input->post('id');

        $data = array(
            'status' => 'SELESAI',
        );
        $where = array(
            'id' => $id
        );


        if ($this->crud->update($table, $data, $where)) {
            $response = ['status' => 'success', 'message' => 'Success Mengajukan Selesai Kerja!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Mengajukan Selesai Kerja!'];

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

    function cetakmachinerecord()
    {
        $where = array(
            'nomor_mesin' => $_GET['nomor']
        );
        $data['customer'] = $this->crud->get_where('kerjaluar', $where)->row_array();
        $data['details'] = $this->crud->get_where('kerjaluar', $where)->result_array();


        $this->load->view('report/machinerecord', $data);
    }
}
