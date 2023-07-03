<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Rekanan_baru extends CI_Controller
{

	public function index()
	{
		$data['data_vendor'] = $this->db->query("SELECT * FROM tbl_vendor WHERE sts_aktif IS NULL OR sts_aktif = 2")->result_array();

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

	public function tolak($id_url_vendor)
	{
		$data = [
			'sts_aktif' => 2
		];
		$where = [
			'id_url_vendor' => $id_url_vendor
		];
		$this->db->where($where);
		$this->db->update('tbl_vendor', $data);
		$this->session->set_flashdata('berhasil', 'Penyedia Berhasil Ditolak!');
		redirect('validator/rekanan_baru');
	}

	public function detil_rekanan_baru($id_url_vendor)
	{
		$data['detil_vendor'] = $this->db->query("SELECT * FROM tbl_vendor LEFT JOIN tbl_provinsi ON tbl_provinsi.id_provinsi = tbl_vendor.id_provinsi LEFT JOIN tbl_kabupaten ON tbl_kabupaten.id_kabupaten = tbl_vendor.id_kabupaten LEFT JOIN tbl_kecamatan ON tbl_kecamatan.id_kecamatan = tbl_vendor.id_kecamatan WHERE id_url_vendor = '$id_url_vendor'")->row_array();
		$data['kualifikasi'] = str_split($data['detil_vendor']['id_jenis_usaha']);
		$this->load->view('validator/template_menu/header_menu');
		$this->load->view('validator/template_menu/sidebar_menu');
		$this->load->view('validator/template/validasi_rekanan/lihat_rekanan_baru', $data);
		$this->load->view('validator/template_menu/footer_menu');
		$this->load->view('validator/template/validasi_rekanan/js_rekanan');
	}
}
