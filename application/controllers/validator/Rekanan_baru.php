<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Rekanan_baru extends CI_Controller
{

	public function index()
	{
		$this->load->view('validator/template_menu/header_menu');
		$this->load->view('validator/template/validasi_rekanan/rekanan_baru');
		$this->load->view('validator/template_menu/footer_menu');
		$this->load->view('validator/template/validasi_rekanan/js_rekanan');
	}
}
