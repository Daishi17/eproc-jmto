<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Rekanan_baru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_datapenyedia/M_Rekanan_baru');
    }

    public function index()
    {
        $this->load->view('template_new/header');
        $this->load->view('validator/data_rekanan/rekanan_baru');
        $this->load->view('template_new/footer');
        $this->load->view('validator/data_rekanan/file_public');
    }

    function get_rekanan_baru()
    {
        $result = $this->M_Rekanan_baru->gettable_rekanan_baru();
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $id_jenis_usaha = str_split($rs->id_jenis_usaha);
            $jenis_izin = array();
            foreach ($id_jenis_usaha as $key => $value) {
                $nm_jenis = $this->M_Rekanan_baru->get_kualifikasi_izin($value);
                $test = str_replace(",", ",", (($nm_jenis['nama_jenis_usaha'])));
                $jenis_izin[] = $test;
            }
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;
            $row[] = implode(' , ', $jenis_izin);
            $row[] = $rs->bentuk_usaha;
            $row[] = $rs->kualifikasi_usaha;
            $row[] = date('d-m-Y', strtotime($rs->tgl_daftar));
            $row[] = '<a href="javascript:;" class="btn btn-info btn-sm" onClick="byid_vendor(' . "'" . $rs->id_url_vendor . "','lihat'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> Lihat</a>
            <a href="javascript:;" class="btn btn-success btn-sm" onClick="byid_vendor(' . "'" . $rs->id_url_vendor . "','terima'" . ')"><i class="fa-solid fa-square-check px-1"></i> Terima</a>';
            // <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid_vendor(' . "'" . $rs->id_url_vendor . "','tolak'" . ')"><i class="fa-solid fa-times px-1"></i> Tolak</a>
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Rekanan_baru->count_all_rekanan_baru(),
            "recordsFiltered" => $this->M_Rekanan_baru->count_filtered_rekanan_baru(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    function get_id_rekanan_baru($id_url)
    {
        $data_vendor =  $this->M_Rekanan_baru->get_row_vendor($id_url);
        $id_jenis_usaha = str_split($data_vendor['id_jenis_usaha']);

        foreach ($id_jenis_usaha as $key => $value) {
            $nm_jenis = $this->M_Rekanan_baru->get_kualifikasi_izin($value);
            $test = str_replace(",", ",", (($nm_jenis['nama_jenis_usaha'])));
            $jenis_izin[] = $test;
        }
        $nama_izin_usaha = implode(' , ', $jenis_izin);
        $response = [
            'row_vendor' => $data_vendor,
            'jenis_izin' => $nama_izin_usaha
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    function terima()
    {
        $id_url_vendor =  $this->input->post('id_vendor');

        $where = [
            'id_url_vendor' => $id_url_vendor
        ];
        $data = [
            'sts_aktif' => 1
        ];
        $this->M_Rekanan_baru->update_vendor($data, $where);
        $type_email = 'TERIMA-VENDOR';
        $message = 'Selamat! Akun Anda Telah Aktif Pada Aplikasi E-PROCUREMENT PT. Jasamarga Tollroad Operator Silahkan Login Sebagai Penyedia https://e-tender-jmto.kintekindo.net/';
        $this->email_send->sen_row_email($type_email, $id_url_vendor, $message);
        $response = [
            'message' => 'success'
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}
