<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekanan_baru extends CI_Controller {

	public function index()
	{
		$this->load->view('validator/template_menu/header_menu');
		$this->load->view('validator/template/validasi_rekanan/rekanan_baru');
        $this->load->view('validator/template_menu/footer_menu');
        $this->load->view('validator/template/validasi_rekanan/js_rekanan');
	}
}
