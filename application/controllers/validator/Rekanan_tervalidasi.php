<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Rekanan_tervalidasi extends CI_Controller
{

	public function index()
	{
		$this->load->view('template_new/header');
		$this->load->view('validator/data_rekanan/rekanan_tervalidasi');
		$this->load->view('template_new/footer');
	}
}
