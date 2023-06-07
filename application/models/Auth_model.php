<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function login($username)
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('email', $username);
        $this->db->or_where('nip', $username);
        return $this->db->get()->row();
    }


    public function insert_log($data)
    {
        $this->db->insert('tbl_pegawai_log', $data);
        return $this->db->affected_rows();
    }
}
