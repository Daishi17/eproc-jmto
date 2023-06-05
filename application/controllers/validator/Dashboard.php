<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->view('validator/template_menu/header_menu');
		$this->load->view('validator/template/dashboard/dashboard');
        $this->load->view('validator/template_menu/footer_menu');
        $this->load->view('validator/template/dashboard/js_dashboard');
	}
}
