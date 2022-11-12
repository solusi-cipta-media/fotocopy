<?php

class Crud extends CI_Model
{
    public function get_where($table, $where)
    {
        $this->db->order_by("id", "DESC");
        return $this->db->get_where($table, $where);
    }

    public function get_all($table)
    {
        $this->db->order_by("id", "DESC");
        return $this->db->get($table);
    }

    public function get_all_limit($table)
    {
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        return $this->db->get($table);
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    public function delete($table, $data)
    {
        $this->db->delete($table, $data);
        return $this->db->affected_rows();
    }

    public function update($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    public function join_data($select, $table1, $table2, $like, $where)
    {
        $this->db->select($select);
        $this->db->from($table1);
        $this->db->join($table2, $like);
        $this->db->where($where);
        return $this->db->get();
    }

    private function _get_datatables_query($table, $select, $column_order, $column_search, $order, $where)
    {
        // $this->db->select("id, invoice_number, invoice_date, reference2");
        $this->db->select($select);
        $this->db->from($table);

        if (!empty($where))
            $this->db->where($where);

        $i = 0;
        foreach ($column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else
                    $this->db->or_like($item, $_POST['search']['value']);


                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order']))
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        else if (isset($this->order))
            $this->db->order_by(key($order), $order[key($order)]);
    }

    function get_datatables($table, $select, $column_order, $column_search, $order = null, $where = null)
    {
        $this->_get_datatables_query($table, $select, $column_order, $column_search, $order, $where);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        return $this->db->get()->result();
    }

    function count_filtered($table, $select, $column_order, $column_search, $order = null, $where = null)
    {
        $this->_get_datatables_query($table, $select, $column_order, $column_search, $order, $where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($table)
    {
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    public function count_where($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->count_all_results();
    }

    public function sum_where($table, $where, $select)
    {
        $this->db->select_sum($select);
        $this->db->where($where);
        return $this->db->get($table);
    }

    function get_task_autocomplete($title, $table, $where)
    {
        $this->db->like('name', $title, 'both');
        $this->db->order_by('name', 'ASC');
        $this->db->where($where);
        $this->db->limit(10);
        return $this->db->get($table)->result();
    }

    function get_task_autocomplete_sampah($title, $table)
    {
        $this->db->like('nama_sampah', $title, 'both');
        $this->db->order_by('nama_sampah', 'ASC');
        $this->db->limit(10);
        return $this->db->get($table)->result();
    }

    function get_nomor_transaksi_terakhir($select, $table, $where)
    {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->limit(1);
        $this->db->order_by('id', 'desc');
        return $this->db->get();
    }


    //all about template date
    //buat function konversi tanggal indo
    function hariIndo($x)
    {

        $pisah = explode(',', $x);
        $hari = $pisah[0];

        $pisah2 = explode('-', $pisah[1]);
        $bulan = $pisah2[1];

        //konversi penamaan hari
        if ($hari == 'Monday') {
            $day = "Senin";
        } else if ($hari == 'Tuesday') {
            $day = "Selasa";
        } else if ($hari == 'Wednesday') {
            $day = "Rabu";
        } else if ($hari == 'Thursday') {
            $day = "Kamis";
        } else if ($hari == 'Friday') {
            $day = "Jumat";
        } else if ($hari == 'Saturday') {
            $day = "Sabtu";
        } else if ($hari == 'Sunday') {
            $day = "Minggu";
        }

        //konversi penamaan bulan
        if ($bulan == 'January') {
            $month = "Januari";
        } else if ($bulan == 'February') {
            $month = "Februari";
        } else if ($bulan == 'March') {
            $month = "Maret";
        } else if ($bulan == 'April') {
            $month = "April";
        } else if ($bulan == 'May') {
            $month = "Mei";
        } else if ($bulan == 'June') {
            $month = "Juni";
        } else if ($bulan == 'July') {
            $month = "Juli";
        } else if ($bulan == 'August') {
            $month = "Agustus";
        } else if ($bulan == 'September') {
            $month = "September";
        } else if ($bulan == 'October') {
            $month = "Oktober";
        } else if ($bulan == 'November') {
            $month = "November";
        } else if ($hari == 'December') {
            $month = "Desember";
        }



        $waktuIndo = $day . "," . $pisah2[0] . "-" . $month . "-" . $pisah2[2];
        return $waktuIndo;
    }

    //buat function konversi tanggal indo
    function dateIndo($x)
    {

        $pisah = explode('-', $x);
        $tahun = $pisah[0];
        $bulan = $pisah[1];
        $tgl = $pisah[2];

        //buat penamaan bulan
        if ($pisah[1] == 1) {
            $bln = "Jan";
        } else if ($pisah[1] == 2) {
            $bln = "Feb";
        } else if ($pisah[1] == 3) {
            $bln = "Mar";
        } else if ($pisah[1] == 4) {
            $bln = "Apr";
        } else if ($pisah[1] == 5) {
            $bln = "May";
        } else if ($pisah[1] == 6) {
            $bln = "Jun";
        } else if ($pisah[1] == 7) {
            $bln = "Jul";
        } else if ($pisah[1] == 8) {
            $bln = "Aug";
        } else if ($pisah[1] == 9) {
            $bln = "Sep";
        } else if ($pisah[1] == 10) {
            $bln = "Oct";
        } else if ($pisah[1] == 11) {
            $bln = "Nov";
        } else if ($pisah[1] == 12) {
            $bln = "Dec";
        } else if ($pisah[1] == 00) {
            $bln = "00";
        }

        $tglIndo = $pisah[2] . "-" . $bln . "-" . $pisah[0];
        return $tglIndo;
    }

    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = $this->penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai / 10) . " puluh" . $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai / 100) . " ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai / 1000) . " ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai / 1000000) . " juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai / 1000000000) . " milyar" . $this->penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai / 1000000000000) . " trilyun" . $this->penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil;
    }
}
