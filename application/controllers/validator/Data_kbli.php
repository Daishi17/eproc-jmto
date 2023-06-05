<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Data_kbli extends CI_Controller
{

	public function index()
	{
		$this->load->view('validator/template_menu/header_menu');
		$this->load->view('validator/template_menu/sidebar_menu');
		$this->load->view('validator/template/data_master/data_kbli');
		$this->load->view('validator/template_menu/footer_menu');
		$this->load->view('validator/template/data_master/js_master');
	}
}
