<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Email_send
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('M_datapenyedia/M_Rekanan_tervalidasi');
    }

    public function sen_row_email($type, $data, $message)
    {
        $data = $this->ci->M_Rekanan_tervalidasi->get_id_vendor($data);

        // var_dump($type, $data,$message);
        // die;

        $email = $data['email'];
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'kintekindo.net',
            'smtp_port' => 465,
            'smtp_user' => 'admin@kintekindo.net',
            'smtp_pass' => 'Kintekindo0902#',
            'mailtype'  => 'html',
            // 'smtp_crypto'  => 'ssl',
            'charset'   => 'iso-8859-1'
        );
        $this->ci->load->library('email', $config);
        $this->ci->email->set_newline("\r\n");
        // Email dan nama pengirim
        $this->ci->email->from('admin@kintekindo.net', 'JMTO');

        // Email penerima

        $this->ci->email->to($email); // Ganti dengan email tujuan

        // Subject email
        if ($type == 'SIUP') {
            $this->ci->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN SIUP");

            // Isi email
            $this->ci->email->message("Dokumen $message ");

            $this->ci->email->send();
        } else if ($type == 'KBLI-SIUP') {
            $this->ci->email->subject('E-PROCUREMENT JMTO :  REGISTRASI');

            // Isi email
            $this->ci->email->message("Silakan Klik Link Ini $base_url Untuk Melakukan Prosess Pendaftaran Selanjutnya ");

            $this->ci->email->send();
        }
    }
}
