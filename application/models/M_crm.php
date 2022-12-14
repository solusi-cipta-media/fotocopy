<?php

class M_crm extends CI_Model
{
    private function _get_datatables_query($table, $select, $column_order, $column_search, $order, $where)
    {
        // $this->db->select("id, invoice_number, invoice_date, reference2");
        $this->db->select($select);
        $this->db->from($table);

        if (!empty($where))
            $this->db->where($where);

        // echo "<pre>";
        // print_r($this->input->post('search_nomor'));
        // echo "</pre>";
        // $this->db->where('jenis <>', 'INVOICE');
        if ($this->input->post('search_nama') != '') $this->db->like('nama_karyawan', $this->input->post('search_nama'));
        if ($this->input->post('search_tanggal') != '') $this->db->like('tanggal', $this->input->post('search_tanggal'));
        if ($this->input->post('search_aktivitas') != '') $this->db->like('aktivitas', $this->input->post('search_aktivitas'));

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
}
