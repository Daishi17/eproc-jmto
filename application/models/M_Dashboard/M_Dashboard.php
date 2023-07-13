<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Dashboard extends CI_Model
{
    function count_rekanan_baru()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', NULL);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_tervalidasi()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }


    function count_rekanan_terundang()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_daftar_hitam()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_daftar_hitam', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_jan()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '01');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_feb()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '02');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_mar()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '03');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_apr()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '04');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_mei()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '05');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_jun()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '06');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_jul()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '07');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_ags()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '08');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_sep()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '09');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_okt()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '10');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_nov()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '11');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_des()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '12');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_jan()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '01');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_feb()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '02');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_mar()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '03');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_apr()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '04');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_mei()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '05');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_jun()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '06');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_jul()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '07');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_ags()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '08');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_sep()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '09');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_okt()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '10');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_nov()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '11');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_des()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '12');
        $query = $this->db->get();
        return $query->num_rows();
    }
}
