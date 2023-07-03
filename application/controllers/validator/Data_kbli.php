<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Data_kbli extends CI_Controller
{

	public function index()
	{
		$this->load->view('template_new/header');
		$this->load->view('validator/data_master/data_kbli');
		$this->load->view('template_new/footer');
	}
}
