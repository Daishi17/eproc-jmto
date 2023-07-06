<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_master extends CI_Model
{
    var $order =  array('id_kbli', 'kode_kbli', 'nama_kbli', 'id_kbli');

    private function _get_data_query_kbli()
    {
        $this->db->select('*');
        $this->db->from('tbl_kbli');
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_kbli.id_kbli', 'ASC');
        }
    }

    public function gettable_kbli() //nam[ilin data pake ini
    {
        $this->_get_data_query_kbli(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_kbli()
    {
        $this->_get_data_query_kbli(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_kbli()
    {
        $this->db->select('*');
        $this->db->from('tbl_kbli');
        return $this->db->count_all_results();
    }

    function add_kbli($data)
    {
        $this->db->insert('tbl_kbli', $data);
        return $this->db->affected_rows();
    }

    public function update_kbli($data, $where)
    {
        $this->db->update('tbl_kbli', $data, $where);
        return $this->db->affected_rows();
    }

    function get_row_kbli($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_kbli');
        $this->db->where('id_kbli', $id);
        $query = $this->db->get();
        return $query->row_array();
    }


    private function _get_data_query_sbu()
    {
        $this->db->select('*');
        $this->db->from('tbl_sbu');
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_sbu.id_sbu', 'ASC');
        }
    }

    public function gettable_sbu() //nam[ilin data pake ini
    {
        $this->_get_data_query_sbu(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_sbu()
    {
        $this->_get_data_query_sbu(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_sbu()
    {
        $this->db->select('*');
        $this->db->from('tbl_sbu');
        return $this->db->count_all_results();
    }

    function add_sbu($data)
    {
        $this->db->insert('tbl_sbu', $data);
        return $this->db->affected_rows();
    }

    public function update_sbu($data, $where)
    {
        $this->db->update('tbl_sbu', $data, $where);
        return $this->db->affected_rows();
    }

    function get_row_sbu($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_sbu');
        $this->db->where('id_sbu', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
}
