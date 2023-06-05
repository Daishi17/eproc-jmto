<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation'));
    }

    public function index()
    {
        $this->form_validation->set_rules('userName', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $email = $this->input->post('userName');
        $password = $this->input->post('password');
        if ($this->form_validation->run() == TRUE) {
            $this->role_login->login($email, $password);
        } else {
            $this->load->view('auth/index');
        }
    }

    public function logout()
    {
        $this->role_login->logout();
    }
}
