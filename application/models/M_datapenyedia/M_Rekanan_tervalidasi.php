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
}
