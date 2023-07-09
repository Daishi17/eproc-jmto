<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Rekanan_tervalidasi extends CI_Controller
{
	// URL GLOBAL
	var $url_dokumen_vendor = 'http://localhost/vms-jmto/';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('download');
		$this->load->model('M_datapenyedia/M_Rekanan_tervalidasi');
	}
	public function index()
	{
		$this->load->view('template_new/header');
		$this->load->view('validator/data_rekanan/rekanan_tervalidasi');
		$this->load->view('template_new/footer');
		$this->load->view('validator/data_rekanan/file_public_tervalidasi');
	}


	public function cek_dokumen($id_url_vendor)
	{
		$data['vendor'] = $this->M_Rekanan_tervalidasi->get_row_vendor($id_url_vendor);
		$id_jenis_usaha = str_split($data['vendor']['id_jenis_usaha']);
		foreach ($id_jenis_usaha as $key => $value) {
			$nm_jenis = $this->M_Rekanan_tervalidasi->get_kualifikasi_izin($value);
			$test = str_replace(",", ",", (($nm_jenis['nama_jenis_usaha'])));
			$jenis_izin[] = $test;
		}
		$data['nama_izin_usaha'] = implode(' , ', $jenis_izin);
		$this->load->view('template_new/header');
		$this->load->view('validator/data_rekanan/cek_dokumen', $data);
		$this->load->view('template_new/footer');
		$this->load->view('validator/data_rekanan/file_public_cek_dokumen');
	}


	function get_rekanan_tervalidasi()
	{
		$result = $this->M_Rekanan_tervalidasi->gettable_rekanan_tervalidasi();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$id_jenis_usaha = str_split($rs->id_jenis_usaha);
			$jenis_izin = array();
			foreach ($id_jenis_usaha as $key => $value) {
				$nm_jenis = $this->M_Rekanan_tervalidasi->get_kualifikasi_izin($value);
				$test = str_replace(",", ",", (($nm_jenis['nama_jenis_usaha'])));
				$jenis_izin[] = $test;
			}
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->nama_usaha;
			$row[] = implode(' , ', $jenis_izin);
			$row[] = $rs->kualifikasi_usaha;

			if ($rs->sts_upload_dokumen == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Sudah Upload Dokumen</span></small>';
			} else {
				$row[] = '<small><span class="badge bg-warning text-white">Belum Upload Dokumen</span></small>';
			}

			// nanti main kondisi hitung dokumen dimari
			if ($rs->sts_dokumen_cek == NULL) {
				$row[] = '<small><span class="badge swatch-orange text-white">Belum Di Periksa</span></small>';
			} else if ($rs->sts_dokumen_cek == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Sudah Valid</span></small>';
			} else if ($rs->sts_dokumen_cek == 2) {
				$row[] = '<small><span class="badge bg-danger text-white">Belum Valid</span></small>';
			}

			$row[] = '<a href="' . base_url('validator/rekanan_tervalidasi/cek_dokumen/' . $rs->id_url_vendor) . '" class="btn btn-warning btn-block btn-sm shadow-lg" ><i class="fa-solid fa-share-from-square px-1"></i> Cek Dokumen</a><br>
            <a href="javascript:;" class="btn btn-success btn-block btn-sm shadow-lg" onClick="byid_vendor(' . "'" . $rs->id_url_vendor . "','terima'" . ')"> <i class="fa-solid fa-envelope px-1"></i> Pesan</a> <a href="javascript:;" class="btn btn-primary btn-block btn-sm shadow-lg" onClick="byid_vendor(' . "'" . $rs->id_url_vendor . "','tolak'" . ')"> <i class="fa-solid fa-paper-plane px-1"></i> Undang</a>';

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Rekanan_tervalidasi->count_all_rekanan_tervalidasi(),
			"recordsFiltered" => $this->M_Rekanan_tervalidasi->count_filtered_rekanan_tervalidasi(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function get_id_rekanan_tervalidasi($id_url)
	{
		$data_vendor =  $this->M_Rekanan_tervalidasi->get_row_vendor($id_url);
		$id_jenis_usaha = str_split($data_vendor['id_jenis_usaha']);

		foreach ($id_jenis_usaha as $key => $value) {
			$nm_jenis = $this->M_Rekanan_tervalidasi->get_kualifikasi_izin($value);
			$test = str_replace(",", ",", (($nm_jenis['nama_jenis_usaha'])));
			$jenis_izin[] = $test;
		}
		$nama_izin_usaha = implode(' , ', $jenis_izin);
		$response = [
			'row_vendor' => $data_vendor,
			'jenis_izin' => $nama_izin_usaha
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function terima()
	{
		$id_url_vendor =  $this->input->post('id_vendor');

		$where = [
			'id_url_vendor' => $id_url_vendor
		];
		$data = [
			'sts_aktif' => 1
		];
		$this->M_Rekanan_tervalidasi->update_vendor($data, $where);
		$response = [
			'message' => 'success'
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	// get data semua dokumen dari vendor
	function get_dokumen_vendor($id_url_vendor)
	{
		$id_vendor = $this->M_Rekanan_tervalidasi->get_row_vendor($id_url_vendor);
		$row_siup = $this->M_Rekanan_tervalidasi->get_row_siup($id_vendor['id_vendor']);
		$row_nib = $this->M_Rekanan_tervalidasi->get_row_nib($id_vendor['id_vendor']);
		$row_sbu = $this->M_Rekanan_tervalidasi->get_row_sbu($id_vendor['id_vendor']);
		$response = [
			'row_siup' => $row_siup,
			'row_nib' => $row_nib,
			'row_sbu' => $row_sbu
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	// end get data semua dokumen dari vendor

	// siup
	function get_kbli_siup($id_vendor)
	{
		$result = $this->M_Rekanan_tervalidasi->gettable_kbli_siup($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->kode_kbli;
			$row[] = $rs->nama_kbli;
			$row[] = $rs->nama_kualifikasi;
			// nanti main kondisi hitung dokumen dimari
			if ($rs->sts_kbli_siup == 0 || $rs->sts_kbli_siup == NULL) {
				$row[] = '<small><span class="badge swatch-orange text-white">Belum Di Periksa</span></small>';
			} else if ($rs->sts_kbli_siup == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Sudah Valid</span></small>';
			} else if ($rs->sts_kbli_siup == 2) {
				$row[] = '<small><span class="badge bg-danger text-white">Belum Valid</span></small>';
			}

			if ($rs->sts_kbli_siup == 1) {
				$row[] = '<center><button type="button" disabled class="btn btn-success btn-block btn-sm shadow-lg" onClick="Valid_siup(' . "'" . $rs->id_url_kbli_siup . "','terima_kbli'" . ')"> <i class="fa-solid fa-square-check px-1"></i> Valid</button> <a href="javascript:;" class="btn btn-danger btn-block btn-sm shadow-lg" onClick="NonValid_siup(' . "'" . $rs->id_url_kbli_siup . "','tolak_kbli'" . ')"> <i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			} else {
				$row[] = '<center><a href="javascript:;" class="btn btn-success btn-block btn-sm shadow-lg" onClick="Valid_siup(' . "'" . $rs->id_url_kbli_siup . "','terima_kbli'" . ')"> <i class="fa-solid fa-square-check px-1"></i> Valid</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm shadow-lg" onClick="NonValid_siup(' . "'" . $rs->id_url_kbli_siup . "','tolak_kbli'" . ')"> <i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			}



			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Rekanan_tervalidasi->count_all_kbli_siup($id_vendor),
			"recordsFiltered" => $this->M_Rekanan_tervalidasi->count_filtered_kbli_siup($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function encryption_siup($id_url)
	{
		$type = $this->input->post('type');
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_siup_url($id_url);
		$secret_token = $this->input->post('token_dokumen');
		$chiper = "AES-128-ECB";
		$secret = $get_row_enkrip['token_dokumen'];
		if ($secret_token == $secret) {
			if ($type == 'dekrip') {
				$encryption_string = openssl_decrypt($get_row_enkrip['file_dokumen'], $chiper, $secret);
				$data = [
					'sts_token_dokumen' => 2,
					'file_dokumen' => $encryption_string,
				];
			} else {
				$encryption_string = openssl_encrypt($get_row_enkrip['file_dokumen'], $chiper, $secret);
				$data = [
					'sts_token_dokumen' => 1,
					'file_dokumen' => $encryption_string,
				];
			}
			$where = [
				'id_url' => $id_url
			];

			$response = [
				'message' => 'success'
			];
			$this->M_Rekanan_tervalidasi->update_enkrip_siup($where, $data);
		} else {
			$response = [
				'maaf' => 'Gagal!'
			];
		}


		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function validation_siup()
	{
		$type = $this->input->post('type');
		$type_kbli = $this->input->post('type_kbli');
		$alasan_validator = $this->input->post('alasan_validator');
		$id_url = $this->input->post('id_url_siup');

		$nm_validator = $this->session->userdata('nama_pegawai');

		if (!$type_kbli) {

			$id_vendor = $this->M_Rekanan_tervalidasi->get_row_siup_url($id_url);
			$get_vendor = $id_vendor['id_vendor'];
			// 1 itu sesuai 2 itu tidak sesuai 3 itu revisi
			if ($type == 'valid') {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url' => $id_url
				];

				$data_vendor = [
					'sts_dokumen_cek' => 1
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
			} else {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url' => $id_url
				];
				$data_vendor = [
					'sts_dokumen_cek' => 2
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
			}
			$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
			$data = $this->M_Rekanan_tervalidasi->update_enkrip_siup($where, $data);
		} else {
			$id_vendor = $this->M_Rekanan_tervalidasi->get_row_siup_kbli_url($id_url);
			$get_vendor = $id_vendor['id_vendor'];
			if ($type_kbli == 'terima_kbli') {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_kbli_siup' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url_kbli_siup' => $id_url
				];
				$data_vendor = [
					'sts_dokumen_cek' => 1
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
			} else {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_kbli_siup' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url_kbli_siup' => $id_url
				];
				$data_vendor = [
					'sts_dokumen_cek' => 2
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
			}
			$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
			$data = $this->M_Rekanan_tervalidasi->update_enkrip_kbli_siup($where, $data);
		}

		if ($data) {
			$response = [
				'message' => 'Berhasil!'
			];
		} else {
			$response = [
				'message' => 'Gagal!'
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function url_download_siup($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_siup_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_Rekanan_tervalidasi->get_id_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen =  $get_row_enkrip['file_dokumen'];

		// Locate.
		$file_name = $get_row_enkrip['file_dokumen'];
		$file_url = $this->url_dokumen_vendor . 'file_vms/' . $row_vendor['nama_usaha'] . '/SIUP-' . $date . '/' . $get_row_enkrip['file_dokumen'];

		// Configure.
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

		// Actual download.
		readfile($file_url);
	}
	// end siup


	// nib
	function get_kbli_nib($id_vendor)
	{
		$result = $this->M_Rekanan_tervalidasi->gettable_kbli_nib($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->kode_kbli;
			$row[] = $rs->nama_kbli;
			$row[] = $rs->nama_kualifikasi;
			// nanti main kondisi hitung dokumen dimari
			if ($rs->sts_kbli_nib == 0 || $rs->sts_kbli_nib == NULL) {
				$row[] = '<small><span class="badge swatch-orange text-white">Belum Di Periksa</span></small>';
			} else if ($rs->sts_kbli_nib == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Sudah Valid</span></small>';
			} else if ($rs->sts_kbli_nib == 2) {
				$row[] = '<small><span class="badge bg-danger text-white">Belum Valid</span></small>';
			}

			if ($rs->sts_kbli_nib == 1) {
				$row[] = '<center><button disabled type="button" class="btn btn-success btn-block btn-sm shadow-lg" onClick="Valid_nib(' . "'" . $rs->id_url_kbli_nib . "' ,'terima_kbli'" . ')"> <i class="fa-solid fa-square-check px-1"></i> Valid</button disabled> <a href="javascript:;" class="btn btn-danger btn-block btn-sm shadow-lg" onClick="NonValid_nib(' . "'" . $rs->id_url_kbli_nib . "','tolak_kbli'" . ')"> <i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			} else {
				$row[] = '<center><a href="javascript:;" class="btn btn-success btn-block btn-sm shadow-lg" onClick="Valid_nib(' . "'" . $rs->id_url_kbli_nib . "' ,'terima_kbli'" . ')"> <i class="fa-solid fa-square-check px-1"></i> Valid</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm shadow-lg" onClick="NonValid_nib(' . "'" . $rs->id_url_kbli_nib . "','tolak_kbli'" . ')"> <i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			}



			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Rekanan_tervalidasi->count_all_kbli_nib($id_vendor),
			"recordsFiltered" => $this->M_Rekanan_tervalidasi->count_filtered_kbli_nib($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function encryption_nib($id_url)
	{
		$type = $this->input->post('type');
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_nib_url($id_url);
		$secret_token = $this->input->post('token_dokumen');

		$chiper = "AES-128-ECB";
		$secret = $get_row_enkrip['token_dokumen'];
		if ($secret_token == $secret) {
			if ($type == 'dekrip') {
				$encryption_string = openssl_decrypt($get_row_enkrip['file_dokumen'], $chiper, $secret);
				$data = [
					'sts_token_dokumen' => 2,
					'file_dokumen' => $encryption_string,
				];
			} else {
				$encryption_string = openssl_encrypt($get_row_enkrip['file_dokumen'], $chiper, $secret);
				$data = [
					'sts_token_dokumen' => 1,
					'file_dokumen' => $encryption_string,
				];
			}
			$where = [
				'id_url' => $id_url
			];
			$response = [
				'message' => 'success'
			];

			$this->M_Rekanan_tervalidasi->update_enkrip_nib($where, $data);
		} else {
			$response = [
				'maaf' => 'Gagal!'
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function validation_nib()
	{
		$type = $this->input->post('type');
		$type_kbli = $this->input->post('type_kbli');
		$alasan_validator = $this->input->post('alasan_validator');
		$id_url = $this->input->post('id_url_nib');

		$nm_validator = $this->session->userdata('nama_pegawai');

		if (!$type_kbli) {

			$id_vendor = $this->M_Rekanan_tervalidasi->get_row_nib_url($id_url);
			$get_vendor = $id_vendor['id_vendor'];
			// 1 itu sesuai 2 itu tidak sesuai 3 itu revisi
			if ($type == 'valid') {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url' => $id_url
				];

				$data_vendor = [
					'sts_dokumen_cek' => 1
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
			} else {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url' => $id_url
				];
				$data_vendor = [
					'sts_dokumen_cek' => 2
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
			}
			$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
			$data = $this->M_Rekanan_tervalidasi->update_enkrip_nib($where, $data);
		} else {
			$id_vendor = $this->M_Rekanan_tervalidasi->get_row_nib_kbli_url($id_url);
			$get_vendor = $id_vendor['id_vendor'];
			if ($type_kbli == 'terima_kbli') {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_kbli_nib' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url_kbli_nib' => $id_url
				];
				$data_vendor = [
					'sts_dokumen_cek' => 1
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
			} else {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_kbli_nib' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url_kbli_nib' => $id_url
				];
				$data_vendor = [
					'sts_dokumen_cek' => 2
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
			}
			$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
			$data = $this->M_Rekanan_tervalidasi->update_enkrip_kbli_nib($where, $data);
		}

		if ($data) {
			$response = [
				'message' => 'Berhasil!'
			];
		} else {
			$response = [
				'message' => 'Gagal!'
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function url_download_nib($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_nib_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_Rekanan_tervalidasi->get_id_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen = $get_row_enkrip['file_dokumen'];

		// Locate.
		$file_name = $get_row_enkrip['file_dokumen'];
		$file_url = $this->url_dokumen_vendor . 'file_vms/' . $row_vendor['nama_usaha'] . '/NIB-' . $date . '/' . $get_row_enkrip['file_dokumen'];

		// Configure.
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

		// Actual download.
		readfile($file_url);
	}
	// end nib

	// sbu
	function get_kbli_sbu($id_vendor)
	{
		$result = $this->M_Rekanan_tervalidasi->gettable_kbli_sbu($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->kode_sbu;
			$row[] = $rs->ket_kbli_sbu;
			$row[] = $rs->nama_kualifikasi;
			// nanti main kondisi hitung dokumen dimari
			if ($rs->sts_kbli_sbu == 0 || $rs->sts_kbli_sbu == NULL) {
				$row[] = '<small><span class="badge swatch-orange text-white">Belum Di Periksa</span></small>';
			} else if ($rs->sts_kbli_sbu == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Sudah Valid</span></small>';
			} else if ($rs->sts_kbli_sbu == 2) {
				$row[] = '<small><span class="badge bg-danger text-white">Belum Valid</span></small>';
			}

			if ($rs->sts_kbli_sbu == 1) {
				$row[] = '<center><button disabled type="button" class="btn btn-success btn-block btn-sm shadow-lg" onClick="Valid_sbu(' . "'" . $rs->id_url_kbli_sbu . "' ,'terima_kbli'" . ')"> <i class="fa-solid fa-square-check px-1"></i> Valid</button disabled> <a href="javascript:;" class="btn btn-danger btn-block btn-sm shadow-lg" onClick="NonValid_sbu(' . "'" . $rs->id_url_kbli_sbu . "','tolak_kbli'" . ')"> <i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			} else {
				$row[] = '<center><a href="javascript:;" class="btn btn-success btn-block btn-sm shadow-lg" onClick="Valid_sbu(' . "'" . $rs->id_url_kbli_sbu . "' ,'terima_kbli'" . ')"> <i class="fa-solid fa-square-check px-1"></i> Valid</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm shadow-lg" onClick="NonValid_sbu(' . "'" . $rs->id_url_kbli_sbu . "','tolak_kbli'" . ')"> <i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			}



			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Rekanan_tervalidasi->count_all_kbli_sbu($id_vendor),
			"recordsFiltered" => $this->M_Rekanan_tervalidasi->count_filtered_kbli_sbu($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function encryption_sbu($id_url)
	{
		$type = $this->input->post('type');
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_sbu_url($id_url);
		$secret_token = $this->input->post('token_dokumen');

		$chiper = "AES-128-ECB";
		$secret = $get_row_enkrip['token_dokumen'];
		if ($secret_token == $secret) {
			if ($type == 'dekrip') {
				$encryption_string = openssl_decrypt($get_row_enkrip['file_dokumen'], $chiper, $secret);
				$data = [
					'sts_token_dokumen' => 2,
					'file_dokumen' => $encryption_string,
				];
			} else {
				$encryption_string = openssl_encrypt($get_row_enkrip['file_dokumen'], $chiper, $secret);
				$data = [
					'sts_token_dokumen' => 1,
					'file_dokumen' => $encryption_string,
				];
			}
			$where = [
				'id_url' => $id_url
			];
			$response = [
				'message' => 'success'
			];

			$this->M_Rekanan_tervalidasi->update_enkrip_sbu($where, $data);
		} else {
			$response = [
				'maaf' => 'Gagal!'
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function validation_sbu()
	{
		$type = $this->input->post('type');
		$type_kbli = $this->input->post('type_kbli');
		$alasan_validator = $this->input->post('alasan_validator');
		$id_url = $this->input->post('id_url_sbu');

		$nm_validator = $this->session->userdata('nama_pegawai');

		if (!$type_kbli) {

			$id_vendor = $this->M_Rekanan_tervalidasi->get_row_sbu_url($id_url);
			$get_vendor = $id_vendor['id_vendor'];
			// 1 itu sesuai 2 itu tidak sesuai 3 itu revisi
			if ($type == 'valid') {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url' => $id_url
				];

				$data_vendor = [
					'sts_dokumen_cek' => 1
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
			} else {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url' => $id_url
				];
				$data_vendor = [
					'sts_dokumen_cek' => 2
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
			}
			$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
			$data = $this->M_Rekanan_tervalidasi->update_enkrip_sbu($where, $data);
		} else {
			$id_vendor = $this->M_Rekanan_tervalidasi->get_row_sbu_kbli_url($id_url);
			$get_vendor = $id_vendor['id_vendor'];
			if ($type_kbli == 'terima_kbli') {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_kbli_sbu' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url_kbli_sbu' => $id_url
				];
				$data_vendor = [
					'sts_dokumen_cek' => 1
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
			} else {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_kbli_sbu' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url_kbli_sbu' => $id_url
				];
				$data_vendor = [
					'sts_dokumen_cek' => 2
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
			}
			$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
			$data = $this->M_Rekanan_tervalidasi->update_enkrip_kbli_sbu($where, $data);
		}

		if ($data) {
			$response = [
				'message' => 'Berhasil!'
			];
		} else {
			$response = [
				'message' => 'Gagal!'
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function url_download_sbu($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_sbu_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_Rekanan_tervalidasi->get_id_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen = $get_row_enkrip['file_dokumen'];

		// Locate.
		$file_name = $get_row_enkrip['file_dokumen'];
		$file_url = $this->url_dokumen_vendor . 'file_vms/' . $row_vendor['nama_usaha'] . '/NIB-' . $date . '/' . $get_row_enkrip['file_dokumen'];

		// Configure.
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

		// Actual download.
		readfile($file_url);
	}
	// end sbu
}
