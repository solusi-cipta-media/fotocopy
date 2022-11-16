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
        $this->load->model("Crud2", "crud2");
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

        $list = [];

        $where  = [];
        $where_orTable = [];
        $where_orA = [];
        $where_orB = [];
        $where_orColumn = [];
        $where_orC = [];
        $like1 = [];
        $like2 = [];
        $where_NotNull = [];
        $joinA = [];
        $joinA1 =  [];
        $joinB = [];
        $joinB1 =  [];
        $group_by  = [];
        $join = [];
        $table = 'karyawan a';
        $column_order = ['a.id', 'a.nik', 'a.nama', 'a.alamat', 'a.no_ktp', 'a.handphone', 'a.jenis_kelamin', 'a.photo', 'a.reg_date', 'b.role', 'a.id'];
        $column_search = $column_order;

        $data_select = ['id', 'nik', 'nama', 'alamat', 'no_ktp', 'handphone', 'jenis_kelamin', 'photo', 'reg_date', 'role_id', 'role'];
        $select = 'a.id, a.nik, a.nama, a.alamat, a.no_ktp, a.handphone, a.jenis_kelamin, a.photo, a.reg_date, a.role_id, b.role';
        // foreach ($data_select as $key => $value) {
        //     $select .= $value . ",";
        // }
        // $select = substr($select, 0, -1);

        $order = array('a.id' => 'desc'); // default order 
        $joinA = 'user_role b';
        $joinA1 =  'b.id=a.role_id';
        $list = $this->crud2->get_datatables($table, $select, $join, $joinA, $joinA1, $joinB, $joinB1, $column_order, $column_search, $order, $where, $where_orTable, $where_orColumn, $where_orA, $where_orB, $where_orC, $like1, $like2, $where_NotNull, $group_by);

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            foreach ($data_select as $data_key => $data_value) {
                $row['data'][$data_value] = $key->$data_value;
            }
            $row['data']['role'] = strtoupper($key->role);
            $data[] = $row;
        }

        // var_dump($data);
        // die();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud2->count_all($table, $where),
            "recordsFiltered" => $this->crud2->count_filtered($table, $select, $join, $joinA, $joinA1, $joinB, $joinB1, $column_order, $column_search, $order, $where, $where_orTable, $where_orColumn, $where_orA, $where_orB, $where_orC, $like1, $like2, $where_NotNull, $group_by),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function delete_data()
    {
        $table = $this->input->post('table');
        $id = $this->input->post('id');
        $data = $this->db->from('karyawan')
            ->where('id', $id)
            ->get()->result();
        $name_upload_edit = '';
        if (count($data) > 0) {
            foreach ($data as $dt) {
                $name_upload_edit = $dt->photo;
            }
            $image = $name_upload_edit;
            if ($image != '' && $image != 'null') {
                $files = 'assets/media/karyawan/' . $image;
                if (file_exists($files)) :
                    if ($image != 'null') :
                        if ($image != '') :
                            $temp = "assets/media/karyawan/";
                            unlink($temp . $image);
                        endif;
                    endif;
                endif;
            }
        }
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
        unset($data['name_upload_edit']);

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
        unset($data['userid']);
        $data['password'] = password_hash('12345', PASSWORD_DEFAULT);
        $data['is_active'] = '1';

        if (count($_FILES) > 0) {
            $image = $data['name_upload_edit'];
            if ($image != '' && $image != 'null') {
                $files = 'assets/media/karyawan/' . $image;
                if (file_exists($files)) :
                    if ($image != 'null') :
                        if ($image != '') :
                            $temp = "assets/media/karyawan/";
                            unlink($temp . $image);
                        endif;
                    endif;
                endif;
            }
            if (!$this->upload->do_upload('file')) {
                $response = array('status' => 'failed', 'message' => $this->upload->display_errors());
                echo json_encode($response);
                die;
            }
            $data_upload = $this->upload->data();
            $data['photo'] = $data_upload['file_name'];
        } else {
            $data['photo'] = $data['name_upload_edit'];
        }
        unset($data['name_upload_edit']);

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
        $this->db->select('a.*,b.role,b.id');
        $this->db->from('karyawan a');
        $this->db->where('a.id', $this->input->post('id'));
        $this->db->join('user_role b', 'b.id=a.role_id', 'LEFT');
        $this->db->order_by("a.id", "DESC");
        $result = $this->db->get()->result();


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

    public function select2_role()
    {
        $data = [];
        $q = $this->input->get("q");
        $page = $this->input->get("page");

        $this->db->select('role,id as id');
        $this->db->from("user_role");
        $this->db->like("role", $q);
        $this->db->order_by('id', 'desc');
        $this->db->limit(10, (10 * $page));
        $data = $this->db->get()->result();

        exit(json_encode(["items" => $data, "count" => count($data)]));
    }


    // public function ajax_table_karyawan()
    // {

    //     // $get_role_id = $this->crud->get_all("user_role")->result_array();

    //     $table = 'karyawan'; //nama tabel dari database
    //     $column_order = array('id', 'nik', 'nama', 'alamat', 'no_ktp', 'handphone', 'jenis_kelamin', 'photo', 'reg_date', 'role_id', 'id'); //field yang ada di table user
    //     $column_search = array('id', 'nik', 'nama', 'alamat', 'no_ktp', 'handphone', 'jenis_kelamin', 'photo', 'reg_date', 'role_id'); //field yang diizin untuk pencarian 
    //     $select = 'id, nik, nama, alamat, no_ktp, handphone, jenis_kelamin, photo, reg_date, role_id';
    //     $order = array('id' => 'asc'); // default order 
    //     $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
    //     $data = array();
    //     $no = $_POST['start'];
    //     foreach ($list as $key) {
    //         $no++;
    //         $row = array();
    //         $row['data']['no'] = $no;
    //         $row['data']['id'] = $key->id;
    //         $row['data']['nik'] = $key->nik;
    //         $row['data']['nama'] = $key->nama;
    //         $row['data']['alamat'] = $key->alamat;
    //         $row['data']['no_ktp'] = $key->no_ktp;
    //         $row['data']['handphone'] = $key->handphone;
    //         $row['data']['jenis_kelamin'] = $key->jenis_kelamin;
    //         $row['data']['photo'] = $key->photo;
    //         $row['data']['reg_date'] = $key->reg_date;
    //         $row['data']['role_id'] = $key->role_id;

    //         $data[] = $row;
    //     }

    //     $output = array(
    //         "draw" => $_POST['draw'],
    //         "recordsTotal" => $this->crud->count_all($table),
    //         "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
    //         "data" => $data,
    //         "query" => $this->db->last_query()
    //     );
    //     //output to json format
    //     echo json_encode($output);
    // }
}
