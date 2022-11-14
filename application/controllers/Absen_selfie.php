<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen_selfie extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('userid')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Please Login!</div>');
            redirect('auth');
        }

        if ($this->session->userdata('role_id') == 1) {
            redirect('dashboard');
        }
        $this->load->model("Crud", "crud");
        $this->load->model("Crud2", "crud2");
    }

    public function index()
    {
        $data['image'] = '';
        $data['tanggal'] = $this->crud->hariIndo(date('l, d-F-Y'));
        $img = '';
        $image = '';
        $img = $this->crud->get_where('karyawan', ['id' => $this->session->userdata('id')])->row_array()['photo'];
        $files = 'assets/media/karyawan/' . $img;

        if (file_exists($files)) {
            $image = $img;
        }
        $data['image'] = $image;
        $this->load->view('absen_selfie', $data);
    }

    public function getClock()
    {
        $where = array(
            'nomor_induk' => $this->input->post('nik'),
            'tanggal' => $this->input->post('attendance_date')
        );

        $result = $this->crud2->get_where('absensi', $where)->row_array();
        if ($this->db->affected_rows() == true) {
            echo json_encode($result);
        } else {
            $result = '500';
            echo json_encode($result);
        }
    }

    public function addIn()
    {
        $data_check_absen = array();
        // $id_attendance = $this->newIdAttendance();
        $current_time = date('Y-m-d H:i:s');
        $cr = explode(' ', $current_time);

        $temp = [];

        //cek dulu apakah sudah pernah absen dihari yang sama
        $where = array(
            'tanggal' => $this->input->post('attendance_date'),
            'nomor_induk' => $this->input->post('nik')
        );

        $this->crud2->get_where('absensi', $where);
        if ($this->db->affected_rows() == true) {

            $d['result'] = 400;

            $temp[] = $d;

            echo json_encode($temp);
            //end cek 

        } else {
            $this->crud2->get_where('absensi_ketidakhadiran', $where);
            if ($this->db->affected_rows() == true) {

                $d['result'] = 401;

                $temp[] = $d;

                echo json_encode($temp);
                //end cek 

            } else {
                //hitung terlambat berapa lama
                //ambil data dari shift
                $time_db = '00:00:00';
                $jika = array(
                    'tanggal' => date('Y-m-d')
                );
                $r = $this->crud2->get_where('absensi_periode', $jika)->row_array();
                $r_r = $this->crud2->get_where('absensi_periode', $jika)->result();
                //tentukan ini hari apa

                if (count($r_r) > 0) {
                    //check libur atau tidak
                    if ($r['status'] == 'LIBUR') {
                        $d['result'] = 503;

                        $temp[] = $d;
                        echo json_encode($temp);
                    } else {
                        $time_db = $r['masuk'];
                        //selesai tentukan hari
                        $telat = '00:00:00';

                        if ($current_time > date('Y-m-d') . ' ' .  $time_db) {
                            $datetime1 = new DateTime($current_time);

                            $datetime2 = new DateTime(date('Y-m-d') . ' ' .  $time_db);

                            $difference = $datetime1->diff($datetime2);
                            $se = $difference->s; //45
                            $mi = $difference->i; //23
                            $ho   = $difference->h; //8
                            $da   = $difference->d; //21
                            $mo  = $difference->m; //4
                            $ye   = $difference->y;

                            $telat = $ho . ':' . $mi . ':' . $se;
                        }

                        //selesai hitung telat
                        $data = array(
                            // 'id_attendance' => $id_attendance,
                            'nama_karyawan' => $this->session->userdata('name'),
                            'nomor_induk' => $this->input->post('nik'),
                            'tanggal' => $this->input->post('attendance_date'),
                            'clock_in' => $current_time,
                            'status_clock' => '1',
                            'latitude_in' => $this->input->post('clock_in_latitude'),
                            'longitude_in' => $this->input->post('clock_in_longitude'),
                            'terlambat' => $telat
                        );
                        $this->crud2->insert_clock_w_camera('absensi', $data);
                        $id = '';
                        $id = $this->input->post("img");
                        if ($this->db->affected_rows() == true) {
                            $b = array(
                                'tanggal' => $this->input->post('attendance_date'),
                                'nomor_induk' => $this->input->post('nik')
                            );
                            define('UPLOAD_DIR', 'assets/media/clock_in/');
                            $data = explode(',', $this->input->post("img"));
                            $image = base64_decode($data[1]);
                            $file = UPLOAD_DIR . md5($id) . '.png';
                            $success = file_put_contents($file, $image);

                            if ($success) {
                                $dt_image = array(
                                    'image_in' => md5($id) . ".png"
                                );

                                $this->crud2->update('absensi', $dt_image, $b);

                                $d['result'] = 200;
                                $d['clock'] = $cr[1];
                                $temp[] = $d;
                                echo json_encode($temp);
                            } else {
                                $this->db->delete('absensi', $b);
                                $d['result'] = 501;
                                $temp[] = $d;
                                echo json_encode($temp);
                            }
                        } else {
                            $d['result'] = 500;
                            $temp[] = $d;
                            echo json_encode($temp);
                        }
                    }
                } else {
                    $d['result'] = 502;

                    $temp[] = $d;
                    echo json_encode($temp);
                }
            }
        }
    }

    public function addOut()
    {
        $current_time = date('Y-m-d H:i:s');
        $cr = explode(' ', $current_time);

        $temp = [];

        //cek dulu apakah sudah selesai absen dihari yang sama
        $where = array(
            'tanggal' => $this->input->post('attendance_date'),
            'nomor_induk' => $this->input->post('nik'),
            'status_clock' => '0',
        );
        $where2 = array(
            'tanggal' => $this->input->post('attendance_date'),
            'nomor_induk' => $this->input->post('nik')
        );
        $this->crud2->get_where('absensi', $where);

        if ($this->db->affected_rows() == true) {


            $d['result'] = 400;

            $temp[] = $d;

            echo json_encode($temp);
            //end cek 

        } else {
            $this->crud2->get_where('absensi_ketidakhadiran', $where2);

            if ($this->db->affected_rows() == true) {


                $d['result'] = 401;

                $temp[] = $d;

                echo json_encode($temp);
                //end cek 

            } else {
                //hitung early_leaving berapa lama
                //ambil data dari shift

                $time_db = '00:00:00';
                $jika = array(
                    'tanggal' => date('Y-m-d')
                );
                $r = $this->crud2->get_where('absensi_periode', $jika)->row_array();
                $r_r = $this->crud2->get_where('absensi_periode', $jika)->result();

                if (count($r_r) > 0) {

                    //check libur atau tidak
                    if ($r['status'] == 'LIBUR') {
                        $d['result'] = 503;

                        $temp[] = $d;
                        echo json_encode($temp);
                    } else {
                        $time_db = $r['pulang'];
                        //selesai tentukan hari
                        $early = '00:00:00';
                        $overtime = '00:00:00';
                        $find_diff_end = '00:00:00';

                        $datetime1 = new DateTime($current_time);

                        $datetime2 = new DateTime(date('Y-m-d') . ' ' .  $time_db);

                        $difference = $datetime1->diff($datetime2);
                        $se = $difference->s; //45
                        $mi = $difference->i; //23
                        $ho   = $difference->h; //8
                        $da   = $difference->d; //21
                        $mo  = $difference->m; //4
                        $ye   = $difference->y;

                        $find_diff_end = $ho . ':' . $mi . ':' . $se;

                        if (date('Y-m-d') . ' ' .  $time_db > $current_time) {

                            $early = $find_diff_end;
                        }
                        if ($current_time > date('Y-m-d') . ' ' .  $time_db) {
                            $overtime = $find_diff_end;
                        }


                        //hitung time work
                        $jk = array(
                            'nomor_induk' => $this->session->userdata('nik'),
                            'status_clock' => '1'
                        );


                        $yu = $this->crud2->get_where('absensi', $jk)->row_array();
                        if ($this->db->affected_rows() == true) {
                            $h = explode(' ', $yu['clock_in']);
                            // $total_work =  strtotime($current_time) - strtotime($h[1]);
                            // $total_work =  strtotime($current_time) - strtotime($yu['clock_in']);

                            $datetime1 = new DateTime($current_time);

                            $datetime2 = new DateTime($yu['clock_in']);

                            $difference = $datetime1->diff($datetime2);
                            $se = $difference->s; //45
                            $mi = $difference->i; //23
                            $ho   = $difference->h; //8
                            $da   = $difference->d; //21
                            $mo  = $difference->m; //4
                            $ye   = $difference->y;

                            $total_work = $ho . ':' . $mi . ':' . $se;
                        } else {
                            $total_work = '00:00:00';
                        }
                        //selesai hitung total work

                        // $b = array(
                        //     'attendance_date' => $this->input->post('attendance_date'),
                        //     'nik' => $this->input->post('nik'),
                        //     'type' => 'hadir'
                        // );
                        $id = '';
                        $id = $this->input->post("img");



                        define('UPLOAD_DIR', 'assets/media/clock_out/');
                        $data = explode(',', $this->input->post("img"));
                        $image = base64_decode($data[1]);
                        $file = UPLOAD_DIR . md5($id) . '.png';
                        $success = file_put_contents($file, $image);

                        if ($success) {

                            $b = array(
                                'tanggal' => $this->input->post('attendance_date'),
                                'nomor_induk' => $this->input->post('nik')
                            );

                            $data = array(
                                // 'nomor_induk' => $this->input->post('nik'),
                                // 'tanggal' => $this->input->post('attendance_date'),
                                'clock_out' => $current_time,
                                'status_clock' => '0',
                                'latitude_out' => $this->input->post('clock_out_latitude'),
                                'longitude_out' => $this->input->post('clock_out_longitude'),
                                'pulang_cepat' => $early,
                                'working_hours' => $total_work,
                                'image_out' => md5($id) . ".png"
                            );
                            $this->crud2->update_clock_w_camera('absensi', $data, $b);

                            if ($this->db->affected_rows() == true) {
                                $d['result'] = 200;
                                $d['clock'] = $cr[1];

                                $temp[] = $d;
                            } else {
                                $d['result'] = 500;
                                $temp[] = $d;
                            }
                        } else {
                            $d['result'] = 501;
                            $temp[] = $d;
                        }

                        echo json_encode($temp);
                    }
                } else {
                    $d['result'] = 502;

                    $temp[] = $d;
                    echo json_encode($temp);
                }
            }
        }
    }

    //tidak hadir
    public function addInUpload()
    {
        $current_time = date('Y-m-d H:i:s');
        $cr = explode(' ', $current_time);

        $temp = [];

        //cek dulu apakah sudah pernah absen dihari yang sama
        $where = array(
            'tanggal' => $this->input->post('attendance_date'),
            'nomor_induk' => $this->input->post('nik'),
        );

        $this->crud2->get_where('absensi', $where);
        if ($this->db->affected_rows() == true) {
            $d['result'] = 400;

            $temp[] = $d;
            echo json_encode($temp);
            //end cek 

        } else {
            $this->crud2->get_where('absensi_ketidakhadiran', $where);
            if ($this->db->affected_rows() == true) {
                $d['result'] = 400;

                $temp[] = $d;
                echo json_encode($temp);
                //end cek 

            } else {
                //selesai hitung telat
                $nik = $this->input->post('nik');
                $data = array(
                    'nomor_induk' => $this->input->post('nik'),
                    'tanggal' => $this->input->post('attendance_date'),
                    'tipe' => strtoupper($this->input->post('alasan')),
                    'status' => 'WAITING',
                    'nama_karyawan' => $this->session->userdata('name')
                );
                $this->crud2->insert_clock_w_camera('absensi_ketidakhadiran', $data);

                if ($this->db->affected_rows() == true) {

                    $b = array(
                        'nomor_induk' => $this->input->post('nik'),
                        'tanggal' => $this->input->post('attendance_date'),
                    );

                    $fileupload = $this->input->post('fileupload');

                    if ($fileupload != 'undefined') {
                        $this->db->select('bukti');
                        $this->db->from('absensi_ketidakhadiran');
                        $this->db->where($b);
                        $data_lampiran = $this->db->get()->result();
                        foreach ($data_lampiran as $r) {
                            $file = $r->bukti;

                            $files = './assets/media/ketidakhadiran/' . $file;

                            if (file_exists($files)) :
                                if ($file != 'null') :
                                    if ($file != '') :
                                        $temp = "./assets/media/ketidakhadiran/";
                                        unlink($temp . $file);
                                    endif;
                                endif;
                            endif;
                        }
                        $countfiles = count($_FILES['fileupload']['name']);
                        $config['upload_path']          = './assets/media/ketidakhadiran/';
                        $config['allowed_types']        = 'pdf|gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG|svg|SVG';
                        $config['overwrite']            = true;
                        $config['max_size']             = 0; // unlimited
                        $config['max_width']            = 0;
                        $config['max_height']           = 0;
                        $config['encrypt_name']         = TRUE;
                        $this->load->library('upload', $config);

                        $files = $_FILES;
                        $data_file_name_encrypt = array();
                        for ($i = 0; $i < $countfiles; $i++) {
                            $_FILES['fileupload']['name'] = $files['fileupload']['name'][$i];
                            $_FILES['fileupload']['type'] = $files['fileupload']['type'][$i];
                            $_FILES['fileupload']['tmp_name'] = $files['fileupload']['tmp_name'][$i];
                            $_FILES['fileupload']['error'] = $files['fileupload']['error'][$i];
                            $_FILES['fileupload']['size'] = $files['fileupload']['size'][$i];

                            if ($this->upload->do_upload('fileupload')) {
                                $uploaded = $this->upload->data();

                                $data_file_name_encrypt = array(
                                    'bukti' => $uploaded['file_name'],
                                );
                            } else {
                                $error = array('error' => $this->upload->display_errors());
                                $response = ['status' => 'error', 'message' => $error];
                                echo json_encode($response);
                            }
                        }
                        $this->crud2->update('absensi_ketidakhadiran', $data_file_name_encrypt, $b);
                    }
                    $d['result'] = 200;
                    $d['clock'] = $cr[1];
                    $temp[] = $d;
                    echo json_encode($temp);
                } else {
                    $d['result'] = 500;
                    $temp[] = $d;
                    echo json_encode($temp);
                }
            }
        }
    }

    public function check_data_tidak_hadir()
    {
        $where = array(
            'nomor_induk' => $this->input->post('nik'),
            'tanggal' => $this->input->post('attendance_date'),
        );

        $result = $this->crud2->get_where('absensi_ketidakhadiran', $where)->row_array();
        if ($this->db->affected_rows() == true) {
            echo json_encode($result);
        } else {
            $result = '500';
            echo json_encode($result);
        }
    }

    public function check_file()
    {
        $type = $this->input->post('method');
        $get_date = date('Y-m-d');

        $check_file = '';
        $files = '';
        $url_file = '';
        $check_isset_data = '';
        $this->db->select('bukti');
        $this->db->from('absensi_ketidakhadiran');
        $this->db->where('tanggal', $get_date);
        $this->db->where('nomor_induk', $this->session->userdata('nik'));
        $check_fileDB = $this->db->get()->result();
        if (count($check_fileDB) > 0) {

            foreach ($check_fileDB as $a) {
                $url_file = 'assets/media/ketidakhadiran/';

                $files = $url_file . $a->bukti;

                if (file_exists($files)) {
                    $check_isset_data = '1';
                    $check_file = $a->bukti;
                }
            }
        }
        $data['check_file'] = $check_file;
        $data['check_isset_data'] = $check_isset_data;
        $data['type'] = $type;
        $data['url_file'] = $url_file;
        echo json_encode($data);
    }
}
