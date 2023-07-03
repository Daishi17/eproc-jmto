<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");


class Dashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('template_new/header');
		$this->load->view('validator/dashboard/index');
		$this->load->view('template_new/footer');
	}
}
