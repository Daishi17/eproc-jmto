<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Role_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('Auth_model');
    }

    // ingat ini masih statis
    // nip dan email belom unique di database
    public function login($username, $password)
    {

        $cek = $this->ci->Auth_model->login($username);
        if (!$cek->nip) {
            $this->ci->session->set_flashdata('salah', 'Pegawai Tidak Terdaftar!');
            redirect('auth');
        } else {
            if ($cek->status == 0) {
                $this->ci->session->set_flashdata('salah', 'Pegawai Sedang Menunggu Di Aktivasi!');
                redirect('auth');
            } else {
                if ($cek && password_verify($password, $cek->password)) {
                    if ($cek->id_role == 4) {

                        $sekarang = date('Y-m-d H:i');
                        $data = [
                            'waktu_login' => $sekarang,
                            'alamat_ip' => $this->ci->input->ip_address(),
                            'id_pegawai' => $cek->id_pegawai
                        ];
                        $this->ci->Auth_model->insert_log($data);
                        $userdata = [
                            'id_pegawai' => $cek->id_pegawai,
                            'id_url_pegawai' => $cek->id_url_pegawai,
                            'nama_pegawai' => $cek->nama_pegawai,
                            'email' => $cek->email,
                            'nip' => $cek->nip,
                            'id_unit' => $cek->id_unit,
                            'id_role' => $cek->id_role
                        ];

                        // buat session
                        $this->ci->session->set_userdata($userdata);
                        redirect('validator/dashboard');
                    }
                } else {
                    $this->ci->session->set_flashdata('salah', 'Email Atau Password Salah');
                    redirect('auth');
                }
            }
        }
    }
    // public function cek_login()
    // {
    //     if ($this->ci->session->userdata('username_vendor') == "") {
    //         $this->ci->session->set_flashdata('pesan', 'Anda Belom Login !!!');
    //         redirect('auth');
    //     }
    // }
    public function logout()
    {
        $this->ci->session->sess_destroy();
        redirect(base_url(''));
    }
}
