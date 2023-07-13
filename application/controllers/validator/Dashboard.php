<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");


class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dashboard/M_Dashboard');
	}

	public function index()
	{
		$data['rekanan_baru'] = $this->M_Dashboard->count_rekanan_baru();
		$data['rekanan_tervalidasi'] = $this->M_Dashboard->count_rekanan_tervalidasi();
		$data['rekanan_terundang'] = $this->M_Dashboard->count_rekanan_terundang();
		$data['rekanan_daftar_hitam'] = $this->M_Dashboard->count_rekanan_daftar_hitam();

		$chart = [
			'rekanan_baru_jan' => $this->M_Dashboard->count_rekanan_jan(),
			'rekanan_baru_feb' => $this->M_Dashboard->count_rekanan_feb(),
			'rekanan_baru_mar' => $this->M_Dashboard->count_rekanan_mar(),
			'rekanan_baru_apr' => $this->M_Dashboard->count_rekanan_apr(),
			'rekanan_baru_mei' => $this->M_Dashboard->count_rekanan_mei(),
			'rekanan_baru_jun' => $this->M_Dashboard->count_rekanan_jun(),
			'rekanan_baru_jul' => $this->M_Dashboard->count_rekanan_jul(),
			'rekanan_baru_ags' => $this->M_Dashboard->count_rekanan_ags(),
			'rekanan_baru_sep' => $this->M_Dashboard->count_rekanan_sep(),
			'rekanan_baru_okt' => $this->M_Dashboard->count_rekanan_okt(),
			'rekanan_baru_nov' => $this->M_Dashboard->count_rekanan_nov(),
			'rekanan_baru_des' => $this->M_Dashboard->count_rekanan_des(),

			'rekanan_terundang_jan' => $this->M_Dashboard->count_terundang_jan(),
			'rekanan_terundang_feb' => $this->M_Dashboard->count_terundang_feb(),
			'rekanan_terundang_mar' => $this->M_Dashboard->count_terundang_mar(),
			'rekanan_terundang_apr' => $this->M_Dashboard->count_terundang_apr(),
			'rekanan_terundang_mei' => $this->M_Dashboard->count_terundang_mei(),
			'rekanan_terundang_jun' => $this->M_Dashboard->count_terundang_jun(),
			'rekanan_terundang_jul' => $this->M_Dashboard->count_terundang_jul(),
			'rekanan_terundang_ags' => $this->M_Dashboard->count_terundang_ags(),
			'rekanan_terundang_sep' => $this->M_Dashboard->count_terundang_sep(),
			'rekanan_terundang_okt' => $this->M_Dashboard->count_terundang_okt(),
			'rekanan_terundang_nov' => $this->M_Dashboard->count_terundang_nov(),
			'rekanan_terundang_des' => $this->M_Dashboard->count_terundang_des(),
		];

		$this->load->view('template_new/header');
		$this->load->view('validator/dashboard/index', $data);
		$this->load->view('template_new/footer');
		$this->load->view('validator/dashboard/file_public', $chart);
	}
}
