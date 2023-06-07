<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Rekanan_blm_validasi extends CI_Controller
{

	public function index()
	{
		$data['vendor'] = $this->db->query("SELECT * FROM tbl_vendor WHERE sts_aktif = 1")->result_array();
		$this->load->view('validator/template_menu/header_menu');
		$this->load->view('validator/template_menu/sidebar_menu');
		$this->load->view('validator/template/validasi_rekanan/rekanan_blm_validasi', $data);
		$this->load->view('validator/template_menu/footer_menu');
		$this->load->view('validator/template/validasi_rekanan/js_rekanan');
	}
}
