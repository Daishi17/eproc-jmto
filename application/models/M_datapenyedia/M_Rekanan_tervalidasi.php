<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Rekanan_tervalidasi extends CI_Model
{
    var $order =  array('id_vendor', 'nama_usaha', 'jenis_usaha', 'bentuk_usaha', 'kualifikasi_usaha', 'tgl_daftar', 'id_vendor');

    // get nib
    private function _get_data_query_rekanan_tervalidasi()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_provinsi', 'tbl_vendor.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kecamatan', 'tbl_vendor.id_kecamatan = tbl_kecamatan.id_kecamatan', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor.sts_aktif', 1);
        $this->db->where('tbl_vendor.sts_terundang', NULL);
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

    public function gettable_rekanan_tervalidasi() //nam[ilin data pake ini
    {
        $this->_get_data_query_rekanan_tervalidasi(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_rekanan_tervalidasi()
    {
        $this->_get_data_query_rekanan_tervalidasi(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_rekanan_tervalidasi()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_provinsi', 'tbl_vendor.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kecamatan', 'tbl_vendor.id_kecamatan = tbl_kecamatan.id_kecamatan', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor.sts_aktif', NULL);
        $this->db->where('tbl_vendor.sts_terundang', NULL);
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


    function get_id_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_provinsi', 'tbl_vendor.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kecamatan', 'tbl_vendor.id_kecamatan = tbl_kecamatan.id_kecamatan', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor.id_vendor', $id_vendor);
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
        $this->db->where('tbl_vendor.id_url_vendor', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update_vendor($data, $where)
    {
        $this->db->update('tbl_vendor', $data, $where);
        return $this->db->affected_rows();
    }


    // siup
    public function get_row_siup($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siup');
        $this->db->where('tbl_vendor_siup.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_siup_kbli($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->where('tbl_vendor_kbli_siup.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_siup_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siup');
        $this->db->where('tbl_vendor_siup.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_siup_kbli_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siup.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->where('tbl_vendor_kbli_siup.id_url_kbli_siup', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_enkrip_siup($where, $data)
    {
        $this->db->update('tbl_vendor_siup', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_enkrip_kbli_siup($where, $data)
    {
        $this->db->update('tbl_vendor_kbli_siup', $data, $where);
        return $this->db->affected_rows();
    }

    var $order_kbli_siup =  array('id_vendor', 'id_vendor', 'id_vendor', 'id_vendor', 'id_vendor', 'id_vendor');
    private function _get_data_query_kbli_siup($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siup.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_siup.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_siup.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order_kbli_siup as $item) // looping awal
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

                if (count($this->order_kbli_siup) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_kbli_siup[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_kbli_siup.id_vendor', 'ASC');
        }
    }

    public function gettable_kbli_siup($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_kbli_siup($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_kbli_siup($id_vendor)
    {
        $this->_get_data_query_kbli_siup($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_kbli_siup($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siup.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_siup.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_siup.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }
    // end siup

    // nib
    public function get_row_nib($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_nib');
        $this->db->where('tbl_vendor_nib.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_nib_kbli($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->where('tbl_vendor_kbli_nib.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_nib_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_nib');
        $this->db->where('tbl_vendor_nib.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_nib_kbli_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_nib.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->where('tbl_vendor_kbli_nib.id_url_kbli_nib', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_enkrip_nib($where, $data)
    {
        $this->db->update('tbl_vendor_nib', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_enkrip_kbli_nib($where, $data)
    {
        $this->db->update('tbl_vendor_kbli_nib', $data, $where);
        return $this->db->affected_rows();
    }

    var $order_kbli_nib =  array('id_vendor', 'id_vendor', 'id_vendor', 'id_vendor', 'id_vendor', 'id_vendor');
    private function _get_data_query_kbli_nib($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_nib.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_nib.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_nib.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order_kbli_nib as $item) // looping awal
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

                if (count($this->order_kbli_nib) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_kbli_nib[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_kbli_nib.id_vendor', 'ASC');
        }
    }

    public function gettable_kbli_nib($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_kbli_nib($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_kbli_nib($id_vendor)
    {
        $this->_get_data_query_kbli_nib($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_kbli_nib($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_nib.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_nib.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_nib.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }
    // end nib


    // sbu
    public function get_row_sbu($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_sbu');
        $this->db->where('tbl_vendor_sbu.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_sbu_kbli($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->where('tbl_vendor_kbli_sbu.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_sbu_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_sbu');
        $this->db->where('tbl_vendor_sbu.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_sbu_kbli_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->join('tbl_sbu', 'tbl_vendor_kbli_sbu.id_sbu = tbl_sbu.id_sbu', 'left');
        $this->db->where('tbl_vendor_kbli_sbu.id_url_kbli_sbu', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_enkrip_sbu($where, $data)
    {
        $this->db->update('tbl_vendor_sbu', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_enkrip_kbli_sbu($where, $data)
    {
        $this->db->update('tbl_vendor_kbli_sbu', $data, $where);
        return $this->db->affected_rows();
    }


    var $order_kbli_sbu = array('id_vendor', 'id_vendor', 'id_vendor', 'id_vendor', 'id_vendor', 'id_vendor');
    private function _get_data_query_kbli_sbu($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->join('tbl_sbu', 'tbl_vendor_kbli_sbu.id_sbu = tbl_sbu.id_sbu', 'left');
        $this->db->join('tbl_kualifikasi_sbu', 'tbl_vendor_kbli_sbu.id_kualifikasi_sbu = tbl_kualifikasi_sbu.id_kualifikasi_sbu', 'left');
        $this->db->where('tbl_vendor_kbli_sbu.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order_kbli_sbu as $item) // looping awal
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

                if (count($this->order_kbli_sbu) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_kbli_sbu[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_kbli_sbu.id_vendor', 'ASC');
        }
    }

    public function gettable_kbli_sbu($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_kbli_sbu($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_kbli_sbu($id_vendor)
    {
        $this->_get_data_query_kbli_sbu($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_kbli_sbu($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->join('tbl_sbu', 'tbl_vendor_kbli_sbu.id_sbu = tbl_sbu.id_sbu', 'left');
        $this->db->join('tbl_kualifikasi_sbu', 'tbl_vendor_kbli_sbu.id_kualifikasi_sbu = tbl_kualifikasi_sbu.id_kualifikasi_sbu', 'left');
        $this->db->where('tbl_vendor_kbli_sbu.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }
    // end sbu

    // siujk
    public function get_row_siujk($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siujk');
        $this->db->where('tbl_vendor_siujk.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_siujk_kbli($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->where('tbl_vendor_kbli_siujk.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_siujk_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siujk');
        $this->db->where('tbl_vendor_siujk.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_siujk_kbli_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siujk.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->where('tbl_vendor_kbli_siujk.id_url_kbli_siujk', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_enkrip_siujk($where, $data)
    {
        $this->db->update('tbl_vendor_siujk', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_enkrip_kbli_siujk($where, $data)
    {
        $this->db->update('tbl_vendor_kbli_siujk', $data, $where);
        return $this->db->affected_rows();
    }


    var $order_kbli_siujk = array('id_vendor', 'id_vendor', 'id_vendor', 'id_vendor', 'id_vendor', 'id_vendor');
    private function _get_data_query_kbli_siujk($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siujk.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_siujk.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_siujk.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order_kbli_siujk as $item) // looping awal
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

                if (count($this->order_kbli_siujk) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_kbli_siujk[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_kbli_siujk.id_vendor', 'ASC');
        }
    }

    public function gettable_kbli_siujk($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_kbli_siujk($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_kbli_siujk($id_vendor)
    {
        $this->_get_data_query_kbli_siujk($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_kbli_siujk($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siujk.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_siujk.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_siujk.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }
    // end siujk

    // akta pendirian
    function get_row_akta_pendirian($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_akta_pendirian');
        $this->db->where('tbl_vendor_akta_pendirian.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_akta_pendirian_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_akta_pendirian');
        $this->db->where('tbl_vendor_akta_pendirian.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_enkrip_akta_pendirian($where, $data)
    {
        $this->db->update('tbl_vendor_akta_pendirian', $data, $where);
        return $this->db->affected_rows();
    }
    // end akta pendirian

    // akta perubahan
    function get_row_akta_perubahan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_akta_perubahan');
        $this->db->where('tbl_vendor_akta_perubahan.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_akta_perubahan_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_akta_perubahan');
        $this->db->where('tbl_vendor_akta_perubahan.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_enkrip_akta_perubahan($where, $data)
    {
        $this->db->update('tbl_vendor_akta_perubahan', $data, $where);
        return $this->db->affected_rows();
    }
    // end akta perubahan

    // MANAJERIAL

    public function get_row_pemilik_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('tbl_vendor_pemilik.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_pemilik_manajerial_id($id_pemilik)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('tbl_vendor_pemilik.id_pemilik', $id_pemilik);
        $query = $this->db->get();
        return $query->row_array();
    }

    var $order_pemilik =  array('id_vendor', 'nik', 'nama_pemilik', 'jns_pemilik', 'alamat_pemilik', 'npwp', 'warganegara', 'saham', 'file_ktp', 'id_vendor', 'id_vendor');

    private function _get_data_query_pemilik_manjerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('tbl_vendor_pemilik.id_vendor', $id_vendor);
        $this->db->order_by('tbl_vendor_pemilik.id_pemilik', 'DESC');
        $i = 0;
        foreach ($this->order_pemilik as $item) // looping awal
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

                if (count($this->order_pemilik) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_pemilik[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_pemilik.id_vendor', 'DESC');
        }
    }

    public function gettable_pemilik_manajerial($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_pemilik_manjerial($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_pemilik_manajerial($id_vendor)
    {
        $this->_get_data_query_pemilik_manjerial($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_pemilik_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('tbl_vendor_pemilik.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

    public function get_row_excel_pemilik_manajerial_enkription($id_url)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pemilik');
        $this->db->where('temp_vendor_pemilik.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_pemilik_manajerial_enkription($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('tbl_vendor_pemilik.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_pemilik_manajerial_enkription($where, $data)
    {
        $this->db->update('tbl_vendor_pemilik', $data, $where);
        return $this->db->affected_rows();
    }

    // pengurus
    var $order_pengurus =  array('id_vendor', 'nik', 'nama_pengurus', 'jabatan_pengurus', 'alamat_pengurus', 'npwp', 'warganegara', 'saham', 'file_ktp', 'id_vendor', 'id_vendor');

    private function _get_data_query_pengurus_manjerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('tbl_vendor_pengurus.id_vendor', $id_vendor);
        $this->db->order_by('tbl_vendor_pengurus.id_pengurus', 'DESC');
        $i = 0;
        foreach ($this->order_pengurus as $item) // looping awal
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

                if (count($this->order_pengurus) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_pengurus[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_pengurus.id_vendor', 'DESC');
        }
    }

    public function gettable_pengurus_manajerial($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_pengurus_manjerial($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_pengurus_manajerial($id_vendor)
    {
        $this->_get_data_query_pengurus_manjerial($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_pengurus_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('tbl_vendor_pengurus.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

    public function get_row_pengurus_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('tbl_vendor_pengurus.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }



    public function get_row_pengurus_manajerial_id($id_pengurus)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('tbl_vendor_pengurus.id_pengurus', $id_pengurus);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_pengurus_manajerial_enkription($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('tbl_vendor_pengurus.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_pengurus_manajerial_enkription($where, $data)
    {
        $this->db->update('tbl_vendor_pengurus', $data, $where);
        return $this->db->affected_rows();
    }
    // end pengurus
    // END MANAJERIAL

    // pengalaman
    var $order_pengalaman =  array('id_vendor', 'no_kontrak', 'nama_pekerjaan', 'id_jenis_usaha', 'tanggal_kontrak', 'instansi_pemberi', 'nilai_kontrak', 'id_vendor', 'id_vendor');

    private function _get_data_query_pengalaman($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('tbl_vendor_pengalaman.id_vendor', $id_vendor);
        $this->db->order_by('tbl_vendor_pengalaman.id_pengalaman', 'DESC');
        $i = 0;
        foreach ($this->order_pengalaman as $item) // looping awal
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

                if (count($this->order_pengalaman) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_pengalaman[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_pengalaman.id_vendor', 'DESC');
        }
    }

    public function get_row_pengalaman($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('tbl_vendor_pengalaman.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function gettable_pengalaman($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_pengalaman($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_pengalaman($id_vendor)
    {
        $this->_get_data_query_pengalaman($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_pengalaman($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('tbl_vendor_pengalaman.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }


    public function get_row_pengalaman_id($id_pengalaman)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('tbl_vendor_pengalaman.id_pengalaman', $id_pengalaman);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_pengalaman_enkription($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('tbl_vendor_pengalaman.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_pengalaman_enkription($where, $data)
    {
        $this->db->update('tbl_vendor_pengalaman', $data, $where);
        return $this->db->affected_rows();
    }

    // end pengalaman

    // pajak sppkp
    public function get_row_sppkp($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_sppkp');
        $this->db->where('tbl_vendor_sppkp.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_row_sppkp_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_sppkp');
        $this->db->where('tbl_vendor_sppkp.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update_enkrip_sppkp($where, $data)
    {
        $this->db->update('tbl_vendor_sppkp', $data, $where);
        return $this->db->affected_rows();
    }
    // end pajak sppkp

    // pajak npwp
    public function get_row_npwp($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_npwp');
        $this->db->where('tbl_vendor_npwp.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_row_npwp_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_npwp');
        $this->db->where('tbl_vendor_npwp.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update_enkrip_npwp($where, $data)
    {
        $this->db->update('tbl_vendor_npwp', $data, $where);
        return $this->db->affected_rows();
    }
    // end pajak npwp

    // pajak spt
    public function get_row_spt($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('tbl_vendor_spt.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_spt_id($id_spt)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('tbl_vendor_spt.id_vendor_spt', $id_spt);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_spt_id_url($id_spt)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('tbl_vendor_spt.id_url', $id_spt);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_row_spt_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('tbl_vendor_spt.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }


    var $order_spt = array('id_vendor', 'nomor_surat', 'tahun_lapor', 'jenis_spt', 'tgl_penyampaian', 'file_dokumen', 'sts_validasi', 'id_vendor');

    private function _get_data_query_spt($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('tbl_vendor_spt.id_vendor', $id_vendor);
        $this->db->order_by('tbl_vendor_spt.id_vendor_spt', 'DESC');
        $i = 0;
        foreach ($this->order_spt as $item) // looping awal
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

                if (count($this->order_spt) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_spt[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_spt.id_vendor', 'DESC');
        }
    }

    public function gettable_spt($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_spt($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_spt($id_vendor)
    {
        $this->_get_data_query_spt($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_spt($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('tbl_vendor_spt.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }


    public function get_row_spt_enkription($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('tbl_vendor_spt.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_spt($where, $data)
    {
        $this->db->update('tbl_vendor_spt', $data, $where);
        return $this->db->affected_rows();
    }
    // end pajak spt



    // pajak neraca
    public function get_row_neraca($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_neraca_id($id_neraca)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.id_neraca', $id_neraca);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_neraca_id_url($id_url_neraca)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.id_url_neraca', $id_url_neraca);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_row_neraca_url($id_url_neraca)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.id_url_neraca', $id_url_neraca);
        $query = $this->db->get();
        return $query->row_array();
    }


    var $order_neraca = array('id_vendor', 'nama_akuntan_public', 'tangga_laporan', 'id_vendor', 'id_vendor', 'id_vendor', 'id_vendor', 'id_vendor');

    private function _get_data_query_neraca($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.id_vendor', $id_vendor);
        $this->db->order_by('tbl_vendor_neraca_keuangan.id_vendor', 'DESC');
        $i = 0;
        foreach ($this->order_neraca as $item) // looping awal
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

                if (count($this->order_neraca) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_neraca[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_neraca_keuangan.id_vendor', 'DESC');
        }
    }

    public function gettable_neraca($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_neraca($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_neraca($id_vendor)
    {
        $this->_get_data_query_neraca($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_neraca($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }


    public function get_row_neraca_enkription($id_url_neraca)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.id_url_neraca', $id_url_neraca);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_neraca($where, $data)
    {
        $this->db->update('tbl_vendor_neraca_keuangan', $data, $where);
        return $this->db->affected_rows();
    }
    // end pajak spt




    // pajak keuangan
    public function get_row_keuangan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_keuangan_id($id_keuangan)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_vendor_keuangan', $id_keuangan);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_keuangan_id_url($id_keuangan)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_url', $id_keuangan);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_row_keuangan_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }


    var $order_keuangan = array('id_vendor', 'tahun_lapor', 'id_vendor', 'id_vendor', 'id_vendor', 'id_vendor');

    private function _get_data_query_keuangan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_vendor', $id_vendor);
        $this->db->order_by('tbl_vendor_keuangan.id_vendor_keuangan', 'DESC');
        $i = 0;
        foreach ($this->order_keuangan as $item) // looping awal
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

                if (count($this->order_keuangan) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_keuangan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_keuangan.id_vendor', 'DESC');
        }
    }

    public function gettable_keuangan($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_keuangan($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_keuangan($id_vendor)
    {
        $this->_get_data_query_keuangan($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_keuangan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }
    public function get_row_keuangan_enkription($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_keuangan($where, $data)
    {
        $this->db->update('tbl_vendor_keuangan', $data, $where);
        return $this->db->affected_rows();
    }
    // end pajak keuangan

    // insert monitoring
    function insert_monitoring($data_monitoring)
    {
        $this->db->insert('monitoring_dokumen', $data_monitoring);
        return $this->db->affected_rows();
    }
    // end insert monitoring


    // RAJA TERAKHIR
    function cek_vendor_tervalidasi_siup($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_siup');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_kbli_siup($id_vendor)
    {
        $this->db->select('sts_kbli_siup');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->where('sts_kbli_siup', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_nib($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_nib');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_kbli_nib($id_vendor)
    {
        $this->db->select('sts_kbli_nib');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->where('sts_kbli_nib', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_sbu($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_sbu');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_kbli_sbu($id_vendor)
    {
        $this->db->select('sts_kbli_sbu');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->where('sts_kbli_sbu', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }


    function cek_vendor_tervalidasi_siujk($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_siujk');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_kbli_siujk($id_vendor)
    {
        $this->db->select('sts_kbli_siujk');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->where('sts_kbli_siujk', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_akta_pendirian($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_akta_pendirian');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_akta_perubahan($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_akta_perubahan');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_pemilik($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_pengurus($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_pengalaman($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }


    function cek_vendor_tervalidasi_sppkp($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_sppkp');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_npwp($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_npwp');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_spt($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_neraca_keuangan($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tervalidasi_keuangan($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('sts_validasi', 1);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    // tidak valid
    function cek_vendor_tdk_valid_siup($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_siup');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_kbli_siup($id_vendor)
    {
        $this->db->select('sts_kbli_siup');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->where('sts_kbli_siup', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_nib($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_nib');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_kbli_nib($id_vendor)
    {
        $this->db->select('sts_kbli_nib');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->where('sts_kbli_nib', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_sbu($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_sbu');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_kbli_sbu($id_vendor)
    {
        $this->db->select('sts_kbli_sbu');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->where('sts_kbli_sbu', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }


    function cek_vendor_tdk_valid_siujk($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_siujk');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_kbli_siujk($id_vendor)
    {
        $this->db->select('sts_kbli_siujk');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->where('sts_kbli_siujk', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_akta_pendirian($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_akta_pendirian');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_akta_perubahan($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_akta_perubahan');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_pemilik($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_pengurus($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_pengalaman($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }


    function cek_vendor_tdk_valid_sppkp($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_sppkp');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_npwp($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_npwp');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_spt($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_neraca_keuangan($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function cek_vendor_tdk_valid_keuangan($id_vendor)
    {
        $this->db->select('sts_validasi');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('sts_validasi', 2);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }


    // END RAJA TERAKHIR
}
