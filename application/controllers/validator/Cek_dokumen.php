<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_dokumen extends CI_Controller
{

	public function index()
	{
		$this->load->view('template_new/header');
		$this->load->view('validator/data_rekanan/cek_dokumen');
		$this->load->view('template_new/footer');
	}
}
