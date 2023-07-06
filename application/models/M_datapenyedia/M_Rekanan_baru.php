<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Rekanan_baru extends CI_Model
{
    var $order =  array('id_vendor', 'nama_usaha', 'jenis_usaha', 'bentuk_usaha', 'kualifikasi_usaha', 'tgl_daftar', 'id_vendor');

    // get nib
    private function _get_data_query_rekanan_baru()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_provinsi', 'tbl_vendor.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kecamatan', 'tbl_vendor.id_kecamatan = tbl_kecamatan.id_kecamatan', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor.sts_aktif', NULL);
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
            $this->db->order_by('tbl_vendor.id_vendor', 'ASC');
        }
    }

    public function gettable_rekanan_baru() //nam[ilin data pake ini
    {
        $this->_get_data_query_rekanan_baru(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_rekanan_baru()
    {
        $this->_get_data_query_rekanan_baru(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_rekanan_baru()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_provinsi', 'tbl_vendor.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kecamatan', 'tbl_vendor.id_kecamatan = tbl_kecamatan.id_kecamatan', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor.sts_aktif', NULL);
        return $this->db->count_all_results();
    }

    public function get_kualifikasi_izin($value)
    {
        $this->db->select('*');
        $this->db->from('tbl_jenis_usaha');
        $this->db->where('id_jenis_usaha', $value);
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_row_vendor($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_provinsi', 'tbl_vendor.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kecamatan', 'tbl_vendor.id_kecamatan = tbl_kecamatan.id_kecamatan', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor.sts_aktif', NULL);
        $this->db->where('tbl_vendor.id_url_vendor', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update_vendor($data, $where)
    {
        $this->db->update('tbl_vendor', $data);
        $this->db->where($where);
        return $this->db->affected_rows();
    }
}
