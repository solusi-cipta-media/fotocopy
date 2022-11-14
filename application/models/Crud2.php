<?php

class Crud2 extends CI_Model
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
    public function update2($table, $data, $where)
    {
        $this->db->trans_start();
        $this->db->where($where);
        $this->db->update($table, $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    public function insert_clock_w_camera(string $table, array $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function update_clock_w_camera(string $table, array $data, array $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->insert_id();
    }

    public function join_data($select, $table1, $table2, $like, $where)
    {
        $this->db->select($select);
        $this->db->from($table1);
        $this->db->join($table2, $like);
        $this->db->where($where);
        return $this->db->get();
    }

    private function _get_datatables_query($table, $select, $join, $joinA, $joinA1, $joinB, $joinB1, $column_order, $column_search, $order, $where, $where_orTable, $where_orColumn, $where_orA, $where_orB, $where_orC, $like1, $like2, $where_NotNull, $group_by)
    {
        // $this->db->select("id, invoice_number, invoice_date, reference2");
        $this->db->select($select);
        $this->db->from($table);
        if (!empty($join)) :
            $this->db->join($join);
        endif;
        if (!empty($joinA)) :
            $this->db->join("$joinA", "$joinA1", "LEFT");
        endif;
        if (!empty($joinB)) :
            $this->db->join("$joinB", "$joinB1", "LEFT");
        endif;

        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($where_orTable)) :
            if (!empty($where_orC)) :
                $this->db->where(" (`" . $where_orTable . "`.`" . $where_orColumn . "` = '" . $where_orA . "' or `" . $where_orTable . "`.`" . $where_orColumn . "` = '" . $where_orB . "' or `" . $where_orTable . "`.`" . $where_orColumn . "` = '" . $where_orC . "')");
            else :
                if ($where_orB == 'null') :
                    $this->db->where(" (`" . $where_orTable . "`.`" . $where_orColumn . "` = '" . $where_orA . "' or `" . $where_orTable . "`.`" . $where_orColumn . "` IS NULL )");
                else :
                    $this->db->where(" (`" . $where_orTable . "`.`" . $where_orColumn . "` = '" . $where_orA . "' or `" . $where_orTable . "`.`" . $where_orColumn . "` = '" . $where_orB . "')");
                endif;
            endif;

        endif;
        if (!empty($like1)) :
            $this->db->like("`$like1`", "$like2");
        endif;
        if (!empty($where_NotNull)) :
            $this->db->where("`$where_NotNull` is not null");
        endif;
        if (!empty($group_by)) :
            $this->db->group_by($group_by);
        endif;

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

    function get_datatables($table, $select, $join, $joinA, $joinA1, $joinB, $joinB1, $column_order, $column_search, $order = null, $where = null, $where_orTable = null, $where_orColumn = null, $where_orA = null, $where_orB = null, $where_orC = null, $like1 = null, $like2 = null, $where_NotNull = null, $group_by = null)
    {
        $this->_get_datatables_query($table, $select, $join, $joinA, $joinA1, $joinB, $joinB1, $column_order, $column_search, $order, $where, $where_orTable, $where_orColumn, $where_orA, $where_orB, $where_orC, $like1, $like2, $where_NotNull, $group_by);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        return $this->db->get()->result();
    }

    function count_filtered($table, $select, $join, $joinA, $joinA1, $joinB, $joinB1, $column_order, $column_search, $order = null, $where = null, $where_orTable = null, $where_orColumn = null, $where_orA = null, $where_orB = null, $where_orC = null, $like1 = null, $like2 = null, $where_NotNull = null, $group_by = null)
    {
        $this->_get_datatables_query($table, $select, $join, $joinA, $joinA1, $joinB, $joinB1, $column_order, $column_search, $order, $where, $where_orTable, $where_orColumn, $where_orA, $where_orB, $where_orC, $like1, $like2, $where_NotNull, $group_by);
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
}
