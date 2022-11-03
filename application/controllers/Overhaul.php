<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Overhaul extends CI_Controller
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

        //ambil data teknisi
        $data['teknisi'] = $this->crud->get_where('karyawan', ['role_id' => 'TEKNISI'])->result_array();

        $data['sess_menu'] = 'listoh';

        $this->load->view('template/header', $data);
        $this->load->view('list_overhaul');
        $this->load->view('template/footer');
    }

    public function prosesoh()
    {
        //ambil data notifikasi
        $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        //ambil data teknisi
        $data['teknisi'] = $this->crud->get_where('karyawan', ['role_id' => 'TEKNISI'])->result_array();

        $data['sess_menu'] = 'prosesoh';

        $this->load->view('template/header', $data);
        $this->load->view('proses_overhaul');
        $this->load->view('template/footer');
    }

    function prosesohform()
    {
        //ambil data notifikasi
        $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        //ambil data teknisi
        // $data['teknisi'] = $this->crud->get_where('karyawan', ['role_id' => 'TEKNISI'])->result_array();

        $data['sess_menu'] = 'prosesoh';

        $this->load->view('template/header', $data);
        $this->load->view('prosesohform');
        $this->load->view('template/footer');
    }

    public function selesaioh()
    {
        //ambil data notifikasi
        $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        $data['sess_menu'] = 'selesaioh';

        $this->load->view('template/header', $data);
        $this->load->view('list_overhaul_selesai');
        $this->load->view('template/footer');
    }

    function prosesohdetail()
    {
        //ambil data notifikasi
        $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        //ambil Serial number dan nomor mesin
        $data['sn'] = $this->crud->get_where('overhaul', ['id' => $_GET["id"]])->row_array();

        //ambil data dari tabel
        $a = [];

        $record2 = $this->crud->get_where('overhaul_record2', ['id_overhaul' => $_GET["id"]])->result_array();

        foreach ($record2 as $key => $value) {
            $d['komponen_check'] = $value['komponen_check'];
            $d['check_awal'] = $value['check_awal'];
            $d['finishing'] = $value['finishing'];
            $d['penggantian_barang'] = $value['penggantian_barang'];

            $a[] = $d;
        }

        $record = $this->crud->get_where('overhaul_record', ['id_overhaul' => $_GET["id"]])->result_array();

        foreach ($record as $key => $value) {
            $d['komponen_check'] = 'Caver Body';
            $d['check_awal'] = $value['caver_body_awal'];
            $d['finishing'] = $value['caver_body_akhir'];
            $d['penggantian_barang'] = $value['caver_body_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'DADF';
            $d['check_awal'] = $value['dadf_awal'];
            $d['finishing'] = $value['dadf_akhir'];
            $d['penggantian_barang'] = $value['dadf_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Kaca Platen';
            $d['check_awal'] = $value['kaca_platen_awal'];
            $d['finishing'] = $value['kaca_platen_akhir'];
            $d['penggantian_barang'] = $value['kaca_platen_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Tombol Panel';
            $d['check_awal'] = $value['tombol_panel_awal'];
            $d['finishing'] = $value['tombol_planel_akhir'];
            $d['penggantian_barang'] = $value['tombol_planel_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Paper Supply';
            $d['check_awal'] = $value['paper_supply_awal'];
            $d['finishing'] = $value['paper_supply_akhir'];
            $d['penggantian_barang'] = $value['paper_supply_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Drum Catridge';
            $d['check_awal'] = $value['drum_catridge_awal'];
            $d['finishing'] = $value['drum_catridge_akhir'];
            $d['penggantian_barang'] = $value['drum_catridge_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Toner Catridge';
            $d['check_awal'] = $value['toner_catridge_awal'];
            $d['finishing'] = $value['toner_catridge_akhir'];
            $d['penggantian_barang'] = $value['toner_catridge_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Drum Catridge';
            $d['check_awal'] = $value['drum_opc_awal'];
            $d['finishing'] = $value['drum_opc_akhir'];
            $d['penggantian_barang'] = $value['drum_opc_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Chip Drum';
            $d['check_awal'] = $value['chip_drum_awal'];
            $d['finishing'] = $value['chip_drum_akhir'];
            $d['penggantian_barang'] = $value['chip_drum_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Chip Toner';
            $d['check_awal'] = $value['chip_toner_awal'];
            $d['finishing'] = $value['chip_toner_akhir'];
            $d['penggantian_barang'] = $value['chip_toner_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Pemanas';
            $d['check_awal'] = $value['pemanas_awal'];
            $d['finishing'] = $value['pemanas_akhir'];
            $d['penggantian_barang'] = $value['pemanas_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Print';
            $d['check_awal'] = $value['print_awal'];
            $d['finishing'] = $value['print_akhir'];
            $d['penggantian_barang'] = $value['print_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Fax';
            $d['check_awal'] = $value['fax_awal'];
            $d['finishing'] = $value['fax_akhir'];
            $d['penggantian_barang'] = $value['fax_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Scan';
            $d['check_awal'] = $value['scan_awal'];
            $d['finishing'] = $value['scan_akhir'];
            $d['penggantian_barang'] = $value['scan_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'OCT';
            $d['check_awal'] = $value['oct_awal'];
            $d['finishing'] = $value['oct_akhir'];
            $d['penggantian_barang'] = $value['oct_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Bypass Tray';
            $d['check_awal'] = $value['bypass_tray_awal'];
            $d['finishing'] = $value['bypass_tray_akhir'];
            $d['penggantian_barang'] = $value['bypass_tray_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Caver A sd E';
            $d['check_awal'] = $value['caver_ae_awal'];
            $d['finishing'] = $value['caver_ae_akhir'];
            $d['penggantian_barang'] = $value['caver_ae_ganti'];

            $a[] = $d;
        }

        $data['details'] = $a;

        $data['sess_menu'] = 'prosesoh';

        $this->load->view('template/header', $data);
        $this->load->view('prosesohdetail');
        $this->load->view('template/footer');
    }

    function cekqr()
    {
        //ambil data notifikasi
        $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        $data['sess_menu'] = 'cekqr';

        $this->load->view('template/header', $data);
        $this->load->view('cekqr');
        $this->load->view('template/footer');
    }

    function cetakhasiloverhaul()
    {
        //ambil data dari tabel
        $a = [];

        $data['identitas'] = $this->crud->get_where('overhaul', ['id' => $_GET["id"]])->row_array();

        $record2 = $this->crud->get_where('overhaul_record2', ['id_overhaul' => $_GET["id"]])->result_array();

        foreach ($record2 as $key => $value) {
            $d['komponen_check'] = $value['komponen_check'];
            $d['check_awal'] = $value['check_awal'];
            $d['finishing'] = $value['finishing'];
            $d['penggantian_barang'] = $value['penggantian_barang'];

            $a[] = $d;
        }

        $record = $this->crud->get_where('overhaul_record', ['id_overhaul' => $_GET["id"]])->result_array();

        foreach ($record as $key => $value) {
            $d['komponen_check'] = 'Caver Body';
            $d['check_awal'] = $value['caver_body_awal'];
            $d['finishing'] = $value['caver_body_akhir'];
            $d['penggantian_barang'] = $value['caver_body_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'DADF';
            $d['check_awal'] = $value['dadf_awal'];
            $d['finishing'] = $value['dadf_akhir'];
            $d['penggantian_barang'] = $value['dadf_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Kaca Platen';
            $d['check_awal'] = $value['kaca_platen_awal'];
            $d['finishing'] = $value['kaca_platen_akhir'];
            $d['penggantian_barang'] = $value['kaca_platen_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Tombol Panel';
            $d['check_awal'] = $value['tombol_panel_awal'];
            $d['finishing'] = $value['tombol_planel_akhir'];
            $d['penggantian_barang'] = $value['tombol_planel_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Paper Supply';
            $d['check_awal'] = $value['paper_supply_awal'];
            $d['finishing'] = $value['paper_supply_akhir'];
            $d['penggantian_barang'] = $value['paper_supply_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Drum Catridge';
            $d['check_awal'] = $value['drum_catridge_awal'];
            $d['finishing'] = $value['drum_catridge_akhir'];
            $d['penggantian_barang'] = $value['drum_catridge_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Toner Catridge';
            $d['check_awal'] = $value['toner_catridge_awal'];
            $d['finishing'] = $value['toner_catridge_akhir'];
            $d['penggantian_barang'] = $value['toner_catridge_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Drum Catridge';
            $d['check_awal'] = $value['drum_opc_awal'];
            $d['finishing'] = $value['drum_opc_akhir'];
            $d['penggantian_barang'] = $value['drum_opc_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Chip Drum';
            $d['check_awal'] = $value['chip_drum_awal'];
            $d['finishing'] = $value['chip_drum_akhir'];
            $d['penggantian_barang'] = $value['chip_drum_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Chip Toner';
            $d['check_awal'] = $value['chip_toner_awal'];
            $d['finishing'] = $value['chip_toner_akhir'];
            $d['penggantian_barang'] = $value['chip_toner_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Pemanas';
            $d['check_awal'] = $value['pemanas_awal'];
            $d['finishing'] = $value['pemanas_akhir'];
            $d['penggantian_barang'] = $value['pemanas_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Print';
            $d['check_awal'] = $value['print_awal'];
            $d['finishing'] = $value['print_akhir'];
            $d['penggantian_barang'] = $value['print_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Fax';
            $d['check_awal'] = $value['fax_awal'];
            $d['finishing'] = $value['fax_akhir'];
            $d['penggantian_barang'] = $value['fax_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Scan';
            $d['check_awal'] = $value['scan_awal'];
            $d['finishing'] = $value['scan_akhir'];
            $d['penggantian_barang'] = $value['scan_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'OCT';
            $d['check_awal'] = $value['oct_awal'];
            $d['finishing'] = $value['oct_akhir'];
            $d['penggantian_barang'] = $value['oct_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Bypass Tray';
            $d['check_awal'] = $value['bypass_tray_awal'];
            $d['finishing'] = $value['bypass_tray_akhir'];
            $d['penggantian_barang'] = $value['bypass_tray_ganti'];

            $a[] = $d;

            $d['komponen_check'] = 'Caver A sd E';
            $d['check_awal'] = $value['caver_ae_awal'];
            $d['finishing'] = $value['caver_ae_akhir'];
            $d['penggantian_barang'] = $value['caver_ae_ganti'];

            $a[] = $d;
        }

        $data['details'] = $a;

        $this->load->view('report/hasiloh2', $data);
    }

    function cetakqr()
    {
        date_default_timezone_set('Asia/Jakarta');

        //ambil data notifikasi
        // $data['notifikasi'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->result_array();
        // $data['jumlah_notif'] = $this->crud->get_where('notifikasi_kontrak', ['status_read' => 0])->num_rows();
        //end

        //ambil data teknisi
        // $data['teknisi'] = $this->crud->get_where('karyawan', ['role_id' => 'TEKNISI'])->result_array();

        // $data['sess_menu'] = 'prosesoh';

        //generate QR CODE berisi SN

        $qrcode = $_GET['SN'];

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

        $data['qrcode'] = $qrcode;
        $data['qrcode_pict'] = $image_name;
        $data['tanggal'] = date('d-M-Y H:i:sa', strtotime(date('Y-m-d H:i:s')));

        // $this->load->view('template/header', $data);
        $this->load->view('report/qrcode', $data);
        // $this->load->view('template/footer');
    }

    public function ajax_table_mesin()
    {

        // $get_role_id = $this->crud->get_all("user_role")->result_array();

        $table = 'overhaul'; //nama tabel dari database
        $column_order = array('id', 'nomor_mesin', 'model', 'serial_number', 'asal', 'meter', 'teknisi', 'approval_pengajuan', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'nomor_mesin', 'model', 'serial_number', 'asal', 'meter', 'teknisi', 'approval_pengajuan', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, nomor_mesin, model, serial_number, asal, meter, teknisi, approval_pengajuan, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['nomor_mesin'] = $key->nomor_mesin;
            $row['data']['model'] = $key->model;
            $row['data']['serial_number'] = $key->serial_number;
            $row['data']['asal'] = $key->asal;
            $row['data']['meter'] = $key->meter;
            $row['data']['teknisi'] = $key->teknisi;
            $row['data']['approval_pengajuan'] = $key->approval_pengajuan;
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

    public function ajax_table_listoh()
    {

        $where = array(
            'status' => 'IMPORT'
        );

        $table = 'overhaul'; //nama tabel dari database
        $column_order = array('id', 'nomor_mesin', 'model', 'serial_number', 'asal', 'meter', 'teknisi', 'approval_pengajuan', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'nomor_mesin', 'model', 'serial_number', 'asal', 'meter', 'teknisi', 'approval_pengajuan', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, nomor_mesin, model, serial_number, asal, meter, teknisi, approval_pengajuan, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['nomor_mesin'] = $key->nomor_mesin;
            $row['data']['model'] = $key->model;
            $row['data']['serial_number'] = $key->serial_number;
            $row['data']['asal'] = $key->asal;
            $row['data']['meter'] = $key->meter;
            $row['data']['teknisi'] = $key->teknisi;
            $row['data']['approval_pengajuan'] = $key->approval_pengajuan;
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

    public function ajax_table_prosesoh()
    {

        $where = array(
            'status' => 'OVERHAUL'
        );

        $table = 'overhaul'; //nama tabel dari database
        $column_order = array('id', 'nomor_mesin', 'model', 'serial_number', 'asal', 'meter', 'tegangan', 'teknisi', 'id_karyawan', 'approval_pengajuan', 'approval_selesai', 'status', 'tgl_masuk', 'start_oh', 'finish_oh', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'nomor_mesin', 'model', 'serial_number', 'asal', 'meter', 'tegangan', 'teknisi', 'id_karyawan', 'approval_pengajuan', 'approval_selesai', 'status', 'tgl_masuk', 'start_oh', 'finish_oh', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, nomor_mesin, model, serial_number, asal, meter, tegangan, teknisi, id_karyawan, approval_pengajuan, approval_selesai, status, tgl_masuk, start_oh, finish_oh, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['nomor_mesin'] = $key->nomor_mesin;
            $row['data']['model'] = $key->model;
            $row['data']['serial_number'] = $key->serial_number;
            $row['data']['asal'] = $key->asal;
            $row['data']['meter'] = $key->meter;
            $row['data']['tegangan'] = $key->tegangan;
            $row['data']['teknisi'] = $key->teknisi;
            $row['data']['id_karyawan'] = $key->id_karyawan;
            $row['data']['approval_pengajuan'] = $key->approval_pengajuan;
            $row['data']['approval_selesai'] = $key->approval_selesai;
            $row['data']['status'] = $key->status;
            $row['data']['tgl_masuk'] = $key->tgl_masuk;
            $row['data']['start_oh'] = $key->start_oh;
            $row['data']['finish_oh'] = $key->finish_oh;
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

    public function ajax_table_selesaioh()
    {

        $where = array(
            'finish_oh !=' => '0000-00-00 00:00:00'
        );

        $table = 'overhaul'; //nama tabel dari database
        $column_order = array('id', 'nomor_mesin', 'model', 'serial_number', 'asal', 'meter', 'teknisi', 'approval_pengajuan', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'nomor_mesin', 'model', 'serial_number', 'asal', 'meter', 'teknisi', 'approval_pengajuan', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, nomor_mesin, model, serial_number, asal, meter, teknisi, approval_pengajuan, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['nomor_mesin'] = $key->nomor_mesin;
            $row['data']['model'] = $key->model;
            $row['data']['serial_number'] = $key->serial_number;
            $row['data']['asal'] = $key->asal;
            $row['data']['meter'] = $key->meter;
            $row['data']['teknisi'] = $key->teknisi;
            $row['data']['approval_pengajuan'] = $key->approval_pengajuan;
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

    public function ajax_table_qrdata()
    {
        // echo $this->input->post->input('serial_number');
        // die;

        $where = array(
            'serial_number' => $this->input->post('serial_number')
        );

        $table = 'overhaul'; //nama tabel dari database
        $column_order = array('id', 'nomor_mesin', 'model', 'serial_number', 'asal', 'meter', 'teknisi', 'approval_pengajuan', 'start_oh', 'finish_oh', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'nomor_mesin', 'model', 'serial_number', 'asal', 'meter', 'teknisi', 'approval_pengajuan', 'start_oh', 'finish_oh', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, nomor_mesin, model, serial_number, asal, meter, teknisi, approval_pengajuan,start_oh,finish_oh, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['nomor_mesin'] = $key->nomor_mesin;
            $row['data']['model'] = $key->model;
            $row['data']['serial_number'] = $key->serial_number;
            $row['data']['asal'] = $key->asal;
            $row['data']['meter'] = $key->meter;
            $row['data']['teknisi'] = $key->teknisi;
            $row['data']['approval_pengajuan'] = $key->approval_pengajuan;
            $row['data']['date_created'] = $key->date_created;
            $row['data']['start_oh'] = $key->start_oh;
            $row['data']['finish_oh'] = $key->finish_oh;

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

    public function ajax_table_list_add_item()
    {

        $where = array(
            'id_overhaul' => $this->input->post('id_overhaul')
        );

        $table = 'overhaul_record2'; //nama tabel dari database
        $column_order = array('id', 'id_overhaul', 'nomor_mesin', 'serial_number', 'komponen_check', 'check_awal', 'finishing', 'penggantian_barang', 'date_created', 'id'); //field yang ada di table user
        $column_search = array('id', 'id_overhaul', 'nomor_mesin', 'serial_number', 'komponen_check', 'check_awal', 'finishing', 'penggantian_barang', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, id_overhaul, nomor_mesin, serial_number, komponen_check, check_awal, finishing, penggantian_barang, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['id_overhaul'] = $key->id_overhaul;
            $row['data']['nomor_mesin'] = $key->nomor_mesin;
            $row['data']['serial_number'] = $key->serial_number;
            $row['data']['komponen_check'] = $key->komponen_check;
            $row['data']['check_awal'] = $key->check_awal;
            $row['data']['finishing'] = $key->finishing;
            $row['data']['penggantian_barang'] = $key->penggantian_barang;
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

    public function pilih_mesin()
    {
        $table = $this->input->post('table');
        $id = $this->input->post('id');

        $data = array(
            'teknisi' => $this->session->userdata('name'),
            'id_karyawan' => $this->session->userdata('id'),
        );
        $where = array(
            'id' => $id
        );


        if ($this->crud->update($table, $data, $where)) {
            $response = ['status' => 'success', 'message' => 'Success Pilih Mesin!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Pilih Mesin!'];

        echo json_encode($response);
    }

    public function setujui_proses()
    {
        //set time jakarta WIB
        date_default_timezone_set('Asia/Jakarta');

        $table = $this->input->post('table');
        $id = $this->input->post('id');

        $data = array(
            'approval_pengajuan' => 1,
            'status' => 'OVERHAUL',
            'start_oh' => date('Y-m-d H:i:sa'),
        );
        $where = array(
            'id' => $id
        );


        if ($this->crud->update($table, $data, $where)) {
            $response = ['status' => 'success', 'message' => 'Success Approve Overhaul!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Approve Overhaul!'];

        echo json_encode($response);
    }

    public function selesai_proses()
    {
        //set time jakarta WIB
        date_default_timezone_set('Asia/Jakarta');

        $table = $this->input->post('table');
        $id = $this->input->post('id');

        $data = array(
            'finish_oh' => date('Y-m-d H:i:sa'),
        );
        $where = array(
            'id' => $id
        );


        if ($this->crud->update($table, $data, $where)) {
            $response = ['status' => 'success', 'message' => 'Success Mengajukan Selesai Overhaul!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Mengajukan Selesai Overhaul!'];

        echo json_encode($response);
    }

    public function approve_selesai()
    {
        //set time jakarta WIB
        date_default_timezone_set('Asia/Jakarta');

        $table = $this->input->post('table');
        $id = $this->input->post('id');

        $data = array(
            'approval_selesai' => 1,
            'status' => 'READY',
            'finish_oh' => date('Y-m-d H:i:sa'),
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

    // public function update_data_teknisi()
    // {
    //     $table = $this->input->post("table");
    //     $id = $this->input->post("id");



    //     $data = $this->input->post();
    //     $a = explode('-', $data['teknisi_all']);
    //     $id_karyawan = $a[0];
    //     $teknisi = $a[1];
    //     $data['id_karyawan'] = $id_karyawan;
    //     $data['teknisi'] = $teknisi;
    //     unset($data['table']);
    //     unset($data['teknisi_all']);


    //     $update = $this->crud->update($table, $data, ['id' => $id]);


    //     if ($update > 0) {
    //         $response = ['status' => 'success', 'message' => 'Berhasil Tambah Teknisi!'];
    //     } else
    //         $response = ['status' => 'error', 'message' => 'Gagal Tambah Teknisi!'];

    //     echo json_encode($response);
    // }

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
        $data['approval_pengajuan'] = 1;
        $data['status'] = 'OVERHAUL';
        $data['start_oh'] = date('Y-m-d H:i:sa');
        unset($data['table']);
        unset($data['teknisi_all']);


        $update = $this->crud->update($table, $data, ['id' => $id]);


        if ($update > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Teknisi!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Teknisi!'];

        echo json_encode($response);
    }

    public function editmesin()
    {
        $table = $this->input->post('table');
        $where = array(
            'id' => $this->input->post('id')
        );

        $result = $this->crud->get_where($table, $where)->result();


        echo json_encode($result);
    }

    public function getidmesin()
    {
        $table = $this->input->post('table');
        $where = array(
            'id' => $this->input->post('id')
        );

        $result = $this->crud->get_where($table, $where)->result();


        echo json_encode($result);
    }

    // public function tambah_item_overhaul()
    // {
    //     $data1 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'CAVER BODY',
    //         'check_awal' => $this->input->post('caver_body_awal'),
    //         'finishing' => $this->input->post('caver_body_akhir'),
    //         'penggantian_barang' => $this->input->post('caver_body_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data1);

    //     $data2 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'DADF',
    //         'check_awal' => $this->input->post('dadf_awal'),
    //         'finishing' => $this->input->post('dadf_akhir'),
    //         'penggantian_barang' => $this->input->post('dadf_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data2);

    //     $data3 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'KACA PLATEN',
    //         'check_awal' => $this->input->post('kaca_platen_awal'),
    //         'finishing' => $this->input->post('kaca_platen_akhir'),
    //         'penggantian_barang' => $this->input->post('kaca_platen_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data3);

    //     $data4 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'TOMBOL PANEL',
    //         'check_awal' => $this->input->post('tombol_panel_awal'),
    //         'finishing' => $this->input->post('tombol_planel_akhir'),
    //         'penggantian_barang' => $this->input->post('tombol_planel_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data4);

    //     $data5 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'PAPER SUPPLY',
    //         'check_awal' => $this->input->post('paper_supply_awal'),
    //         'finishing' => $this->input->post('paper_supply_akhir'),
    //         'penggantian_barang' => $this->input->post('paper_supply_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data5);

    //     $data6 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'DRUM CATRIDGE',
    //         'check_awal' => $this->input->post('drum_catridge_awal'),
    //         'finishing' => $this->input->post('drum_catridge_akhir'),
    //         'penggantian_barang' => $this->input->post('drum_catridge_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data6);

    //     $data7 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'TONER CATRIDGE',
    //         'check_awal' => $this->input->post('toner_catridge_awal'),
    //         'finishing' => $this->input->post('toner_catridge_akhir'),
    //         'penggantian_barang' => $this->input->post('toner_catridge_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data7);

    //     $data8 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'DRUM OPC',
    //         'check_awal' => $this->input->post('drum_opc_awal'),
    //         'finishing' => $this->input->post('drum_opc_akhir'),
    //         'penggantian_barang' => $this->input->post('drum_opc_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data8);

    //     $data9 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'CHIP DRUM',
    //         'check_awal' => $this->input->post('chip_drum_awal'),
    //         'finishing' => $this->input->post('chip_drum_akhir'),
    //         'penggantian_barang' => $this->input->post('chip_drum_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data9);

    //     $data10 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'CHIP TONER',
    //         'check_awal' => $this->input->post('chip_toner_awal'),
    //         'finishing' => $this->input->post('chip_toner_akhir'),
    //         'penggantian_barang' => $this->input->post('chip_toner_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data10);

    //     $data11 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'PEMANAS AWAL',
    //         'check_awal' => $this->input->post('pemanas_awal'),
    //         'finishing' => $this->input->post('pemanas_akhir'),
    //         'penggantian_barang' => $this->input->post('pemanas_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data11);

    //     $data12 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'PRINT',
    //         'check_awal' => $this->input->post('print_awal'),
    //         'finishing' => $this->input->post('print_akhir'),
    //         'penggantian_barang' => $this->input->post('print_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data12);

    //     $data13 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'FAX',
    //         'check_awal' => $this->input->post('fax_awal'),
    //         'finishing' => $this->input->post('fax_akhir'),
    //         'penggantian_barang' => $this->input->post('fax_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data13);

    //     $data14 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'SCAN',
    //         'check_awal' => $this->input->post('scan_awal'),
    //         'finishing' => $this->input->post('scan_akhir'),
    //         'penggantian_barang' => $this->input->post('scan_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data14);

    //     $data15 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'OCT',
    //         'check_awal' => $this->input->post('oct_awal'),
    //         'finishing' => $this->input->post('oct_akhir'),
    //         'penggantian_barang' => $this->input->post('oct_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data15);

    //     $data16 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'BYPASS TRAY',
    //         'check_awal' => $this->input->post('bypass_tray_awal'),
    //         'finishing' => $this->input->post('bypass_tray_akhir'),
    //         'penggantian_barang' => $this->input->post('bypass_tray_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data16);

    //     $data17 = array(
    //         'id_overhaul' => $this->input->post('id_overhaul'),
    //         'nomor_mesin' => $this->input->post('nomor_mesin'),
    //         'serial_number' => $this->input->post('serial_number'),

    //         'komponen_check' => 'CAVER A sd E',
    //         'check_awal' => $this->input->post('caver_ae_awal'),
    //         'finishing' => $this->input->post('caver_ae_akhir'),
    //         'penggantian_barang' => $this->input->post('caver_ae_ganti'),

    //     );
    //     //insert data manual
    //     $this->crud->insert('overhaul_record2', $data17);
    // }

    public function tambah_item_overhaul()
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

    public function update_item_overhaul()
    {
        $table = $this->input->post("table");

        $data = $this->input->post();

        $where = array(
            'id_overhaul' => $data['id_overhaul']
        );

        unset($data['table']);

        $update_data = $this->crud->update($table, $data, $where);

        if ($update_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Update Data!'];
        } else
            $response = ['status' => 'success', 'message' => 'Tidak ada data yang diubah!'];

        echo json_encode($response);
    }

    public function getitemdata()
    {
        $table = $this->input->post("table");
        $id_overhaul = $this->input->post("id_overhaul");

        $where = array(
            'id_overhaul' => $id_overhaul
        );

        $result = $this->crud->get_where($table, $where)->result();

        // var_dump($result);
        // die;


        echo json_encode($result);
    }

    public function insert_data_item_add()
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

    public function getdataqr()
    {
        $table = $this->input->post("table");
        $serial_number = $this->input->post("serial_number");

        $where = array(
            'serial_number' => $serial_number
        );

        $result = $this->crud->get_where($table, $where)->result();

        // var_dump($result);
        // die;


        echo json_encode($result);
    }
}
