<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat_rekanan_baru extends CI_Controller {

	public function index()
	{
		$this->load->view('validator/template_menu/header_menu');
		$this->load->view('validator/template/validasi_rekanan/lihat_rekanan_baru');
        $this->load->view('validator/template_menu/footer_menu');
        $this->load->view('validator/template/validasi_rekanan/js_rekanan');
	}
}
