<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Rekanan_baru extends CI_Controller
{

	public function index()
	{
		$data['data_vendor'] = $this->db->query("SELECT * FROM tbl_vendor WHERE sts_aktif IS NULL")->result_array();

		$this->load->view('validator/template_menu/header_menu');
		$this->load->view('validator/template_menu/sidebar_menu');
		$this->load->view('validator/template/validasi_rekanan/rekanan_baru', $data);
		$this->load->view('validator/template_menu/footer_menu');
		$this->load->view('validator/template/validasi_rekanan/js_rekanan');
	}

	public function terima($id_url_vendor)
	{
		$data = [
			'sts_aktif' => 1
		];
		$where = [
			'id_url_vendor' => $id_url_vendor
		];
		$this->db->where($where);
		$this->db->update('tbl_vendor', $data);
		$this->session->set_flashdata('berhasil', 'Penyedia Berhasil Diterima!');
		redirect('validator/rekanan_baru');
	}
}
