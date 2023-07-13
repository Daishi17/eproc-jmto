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
        if ($type == 'TERIMA-VENDOR' || $type == 'KIRIM-PESAN' || $type == 'KIRIM-UNDANGAN') {
            $data = $this->ci->M_Rekanan_tervalidasi->get_row_vendor($data);
        } else {
            $data = $this->ci->M_Rekanan_tervalidasi->get_id_vendor($data);
        }

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
        $this->ci->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN SIUP");
        if ($type == 'SIUP') {
            // Isi email
            $this->ci->email->message("$message ");
        } else if ($type == 'KBLI-SIUP') {
            $this->ci->email->message("$message ");
        } else if ($type == 'NIB') {
            $this->ci->email->message("$message ");
        } else if ($type == 'KBLI-NIB') {
            $this->ci->email->message("$message ");
        } else if ($type == 'SBU') {
            $this->ci->email->message("$message ");
        } else if ($type == 'KODE-SBU') {
            $this->ci->email->message("$message ");
        } else if ($type == 'SIUJK') {
            $this->ci->email->message("$message ");
        } else if ($type == 'KBLI-SIUJK') {
            $this->ci->email->message("$message ");
        } else if ($type == 'AKTA-PENDIRIAN') {
            $this->ci->email->message("$message ");
        } else if ($type == 'AKTA-PERUBAHAN') {
            $this->ci->email->message("$message ");
        } else if ($type == 'PEMILIK') {
            $this->ci->email->message("$message ");
        } else if ($type == 'PENGURUS') {
            $this->ci->email->message("$message ");
        } else if ($type == 'PENGALAMAN') {
            $this->ci->email->message("$message ");
        } else if ($type == 'SPPKP') {
            $this->ci->email->message("$message ");
        } else if ($type == 'NPWP') {
            $this->ci->email->message("$message ");
        } else if ($type == 'SPT') {
            $this->ci->email->message("$message ");
        } else if ($type == 'NERACA-KEUANGAN') {
            $this->ci->email->message("$message ");
        } else if ($type == 'LAPORAN-KEUANGAN') {
            $this->ci->email->message("$message ");
        } else if ($type == 'TERIMA-VENDOR') {
            $this->ci->email->message("$message ");
        } else if ($type == 'KIRIM-PESAN') {
            $this->ci->email->message("$message ");
        }  else if ($type == 'KIRIM-UNDANGAN') {
            $this->ci->email->message("$message ");
        }
        $this->ci->email->send();
    }
}
