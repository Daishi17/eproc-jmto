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
			if ($rs->sts_dokumen_cek == null) {
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
		$row_siujk = $this->M_Rekanan_tervalidasi->get_row_siujk($id_vendor['id_vendor']);
		$row_akta_pendirian = $this->M_Rekanan_tervalidasi->get_row_akta_pendirian($id_vendor['id_vendor']);
		$row_akta_perubahan = $this->M_Rekanan_tervalidasi->get_row_akta_perubahan($id_vendor['id_vendor']);
		$get_row_pemilik_manajerial = $this->M_Rekanan_tervalidasi->get_row_pemilik_manajerial($id_vendor['id_vendor']);
		$get_row_pengurus_manajerial = $this->M_Rekanan_tervalidasi->get_row_pengurus_manajerial($id_vendor['id_vendor']);
		$row_pengalaman = $this->M_Rekanan_tervalidasi->get_row_pengalaman($id_vendor['id_vendor']);
		$row_sppkp = $this->M_Rekanan_tervalidasi->get_row_sppkp($id_vendor['id_vendor']);
		$row_npwp = $this->M_Rekanan_tervalidasi->get_row_npwp($id_vendor['id_vendor']);
		$row_spt = $this->M_Rekanan_tervalidasi->get_row_spt($id_vendor['id_vendor']);
		$row_neraca = $this->M_Rekanan_tervalidasi->get_row_neraca($id_vendor['id_vendor']);
		$row_keuangan = $this->M_Rekanan_tervalidasi->get_row_keuangan($id_vendor['id_vendor']);
		$response = [
			'id_vendor' => $id_vendor,
			'row_siup' => $row_siup,
			'row_nib' => $row_nib,
			'row_sbu' => $row_sbu,
			'row_siujk' => $row_siujk,
			'row_akta_pendirian' => $row_akta_pendirian,
			'row_akta_perubahan' => $row_akta_perubahan,
			'row_pemilik_manajerial' => $get_row_pemilik_manajerial,
			'row_pengurus_manajerial' => $get_row_pengurus_manajerial,
			'row_pengalaman' => $row_pengalaman,
			'row_sppkp' => $row_sppkp,
			'row_npwp' => $row_npwp,
			'row_spt' => $row_spt,
			'row_neraca' => $row_neraca,
			'row_keuangan' => $row_keuangan,
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
			if ($rs->sts_kbli_siup == 0 || $rs->sts_kbli_siup == null) {
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

				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url'],
					'jenis_dokumen' => 'SIUP',
					'nomor_surat' => $id_vendor['nomor_surat'],
					'id_dokumen' => $id_vendor['id_vendor_siup'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
				];
				$message = "Dokumen dengan nomor surat "  . $id_vendor['nomor_surat'] . " Telah Berhasil Di Validasi";
				$type_email = 'SIUP';
				$this->email_send->sen_row_email($type_email, $id_vendor['id_vendor'], $message);
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
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url'],
					'jenis_dokumen' => 'SIUP',
					'nomor_surat' => $id_vendor['nomor_surat'],
					'id_dokumen' => $id_vendor['id_vendor_siup'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
				];
				$message = "Dokumen dengan nomor surat "  . $id_vendor['nomor_surat'] . " Gagal Di Validasi Silahkan Segera Upload Ulang Dokumen SIUP Anda";
				$type_email = 'SIUP';
				$this->email_send->sen_row_email($type_email, $id_vendor['id_vendor'], $message);
			}
			$this->M_Rekanan_tervalidasi->insert_monitoring($data_monitoring);
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
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url_kbli_siup'],
					'jenis_dokumen' => 'SIUP-KBLI',
					'nomor_kbli' => $id_vendor['kode_kbli'],
					'id_dokumen' => $id_vendor['id_vendor_kbli_siup'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
				];
				$type_email = 'KBLI-SIUP';
				$message = "Jenis KBLI dengan kode KBLI "  . $id_vendor['kode_kbli'] . "-". $id_vendor['nama_kbli'] . " Telah Berhasil Di Validasi";
				$this->email_send->sen_row_email($type_email, $id_vendor['id_vendor'], $message);
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
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url_kbli_siup'],
					'jenis_dokumen' => 'SIUP-KBLI',
					'nomor_kbli' => $id_vendor['kode_kbli'],
					'id_dokumen' => $id_vendor['id_vendor_kbli_siup'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
				];
				$type_email = 'KBLI-SIUP';
				$message = "Jenis KBLI dengan kode KBLI "  . $id_vendor['kode_kbli'] . "-". $id_vendor['nama_kbli'] . " Gagal Di Validasi Silahkan Segera Ubah KODE KBLI anda pada dokumen SIUP";
				$this->email_send->sen_row_email($type_email, $id_vendor['id_vendor'], $message);
			}
			$this->M_Rekanan_tervalidasi->insert_monitoring($data_monitoring);
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
			if ($rs->sts_kbli_nib == 0 || $rs->sts_kbli_nib == null) {
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
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url'],
					'jenis_dokumen' => 'NIB',
					'nomor_surat' => $id_vendor['nomor_surat'],
					'id_dokumen' => $id_vendor['id_vendor_nib'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
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
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url'],
					'jenis_dokumen' => 'NIB',
					'nomor_surat' => $id_vendor['nomor_surat'],
					'id_dokumen' => $id_vendor['id_vendor_nib'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
				];
			}
			$this->M_Rekanan_tervalidasi->insert_monitoring($data_monitoring);
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
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url_kbli_nib'],
					'jenis_dokumen' => 'NIB-KBLI',
					'nomor_kbli' => $id_vendor['kode_kbli'],
					'id_dokumen' => $id_vendor['id_vendor_kbli_nib'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
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
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url_kbli_nib'],
					'jenis_dokumen' => 'NIB-KBLI',
					'nomor_kbli' => $id_vendor['kode_kbli'],
					'id_dokumen' => $id_vendor['id_vendor_kbli_nib'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
				];
			}
			$this->M_Rekanan_tervalidasi->insert_monitoring($data_monitoring);
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
			if ($rs->sts_kbli_sbu == 0 || $rs->sts_kbli_sbu == null) {
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
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url'],
					'jenis_dokumen' => 'SBU',
					'nomor_surat' => $id_vendor['nomor_surat'],
					'id_dokumen' => $id_vendor['id_vendor_sbu'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
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
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url'],
					'jenis_dokumen' => 'SBU',
					'nomor_surat' => $id_vendor['nomor_surat'],
					'id_dokumen' => $id_vendor['id_vendor_sbu'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
				];
			}
			$this->M_Rekanan_tervalidasi->insert_monitoring($data_monitoring);
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
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url_kbli_sbu'],
					'jenis_dokumen' => 'KODE-SBU',
					'nomor_kbli' => $id_vendor['kode_sbu'],
					'id_dokumen' => $id_vendor['id_vendor_kbli_sbu'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
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
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url_kbli_sbu'],
					'jenis_dokumen' => 'KODE-SBU',
					'nomor_kbli' => $id_vendor['kode_sbu'],
					'id_dokumen' => $id_vendor['id_vendor_kbli_sbu'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
				];
			}
			$this->M_Rekanan_tervalidasi->insert_monitoring($data_monitoring);
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
		$file_url = $this->url_dokumen_vendor . 'file_vms/' . $row_vendor['nama_usaha'] . '/SBU-' . $date . '/' . $get_row_enkrip['file_dokumen'];

		// Configure.
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

		// Actual download.
		readfile($file_url);
	}
	// end sbu

	// siujk
	function get_kbli_siujk($id_vendor)
	{
		$result = $this->M_Rekanan_tervalidasi->gettable_kbli_siujk($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->kode_kbli;
			$row[] = $rs->nama_kbli;
			$row[] = $rs->nama_kualifikasi;
			// nanti main kondisi hitung dokumen dimari
			if ($rs->sts_kbli_siujk == 0 || $rs->sts_kbli_siujk == null) {
				$row[] = '<small><span class="badge swatch-orange text-white">Belum Di Periksa</span></small>';
			} else if ($rs->sts_kbli_siujk == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Sudah Valid</span></small>';
			} else if ($rs->sts_kbli_siujk == 2) {
				$row[] = '<small><span class="badge bg-danger text-white">Belum Valid</span></small>';
			}

			if ($rs->sts_kbli_siujk == 1) {
				$row[] = '<center><button disabled type="button" class="btn btn-success btn-block btn-sm shadow-lg" onClick="Valid_siujk(' . "'" . $rs->id_url_kbli_siujk . "' ,'terima_kbli'" . ')"> <i class="fa-solid fa-square-check px-1"></i> Valid</button disabled> <a href="javascript:;" class="btn btn-danger btn-block btn-sm shadow-lg" onClick="NonValid_siujk(' . "'" . $rs->id_url_kbli_siujk . "','tolak_kbli'" . ')"> <i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			} else {
				$row[] = '<center><a href="javascript:;" class="btn btn-success btn-block btn-sm shadow-lg" onClick="Valid_siujk(' . "'" . $rs->id_url_kbli_siujk . "' ,'terima_kbli'" . ')"> <i class="fa-solid fa-square-check px-1"></i> Valid</a> <a href="javascript:;" class="btn btn-danger btn-block btn-sm shadow-lg" onClick="NonValid_siujk(' . "'" . $rs->id_url_kbli_siujk . "','tolak_kbli'" . ')"> <i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Rekanan_tervalidasi->count_all_kbli_siujk($id_vendor),
			"recordsFiltered" => $this->M_Rekanan_tervalidasi->count_filtered_kbli_siujk($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function encryption_siujk($id_url)
	{
		$type = $this->input->post('type');
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_siujk_url($id_url);
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

			$this->M_Rekanan_tervalidasi->update_enkrip_siujk($where, $data);
		} else {
			$response = [
				'maaf' => 'Gagal!'
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function validation_siujk()
	{
		$type = $this->input->post('type');
		$type_kbli = $this->input->post('type_kbli');
		$alasan_validator = $this->input->post('alasan_validator');
		$id_url = $this->input->post('id_url_siujk');

		$nm_validator = $this->session->userdata('nama_pegawai');

		if (!$type_kbli) {

			$id_vendor = $this->M_Rekanan_tervalidasi->get_row_siujk_url($id_url);
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
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url'],
					'jenis_dokumen' => 'SIUJK',
					'nomor_surat' => $id_vendor['nomor_surat'],
					'id_dokumen' => $id_vendor['id_vendor_siujk'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
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
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url'],
					'jenis_dokumen' => 'SIUJK',
					'nomor_surat' => $id_vendor['nomor_surat'],
					'id_dokumen' => $id_vendor['id_vendor_siujk'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
				];
			}
			$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
			$this->M_Rekanan_tervalidasi->insert_monitoring($data_monitoring);
			$data = $this->M_Rekanan_tervalidasi->update_enkrip_siujk($where, $data);
		} else {
			$id_vendor = $this->M_Rekanan_tervalidasi->get_row_siujk_kbli_url($id_url);
			$get_vendor = $id_vendor['id_vendor'];
			if ($type_kbli == 'terima_kbli') {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_kbli_siujk' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url_kbli_siujk' => $id_url
				];
				$data_vendor = [
					'sts_dokumen_cek' => 1
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url_kbli_siujk'],
					'jenis_dokumen' => 'SIUJK-KBLI',
					'nomor_kbli' => $id_vendor['kode_kbli'],
					'id_dokumen' => $id_vendor['id_vendor_kbli_siujk'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
				];
			} else {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_kbli_siujk' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url_kbli_siujk' => $id_url
				];
				$data_vendor = [
					'sts_dokumen_cek' => 2
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
				$data_monitoring = [
					'id_vendor' => $id_vendor['id_vendor'],
					'id_url' => $id_vendor['id_url_kbli_siujk'],
					'jenis_dokumen' => 'SIUJK-KBLI',
					'nomor_kbli' => $id_vendor['kode_kbli'],
					'id_dokumen' => $id_vendor['id_vendor_kbli_siujk'],
					'alasan_validator' => $alasan_validator,
					'sts_validasi' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i'),
					'notifikasi' => 1
				];
			}
			$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
			$this->M_Rekanan_tervalidasi->insert_monitoring($data_monitoring);
			$data = $this->M_Rekanan_tervalidasi->update_enkrip_kbli_siujk($where, $data);
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

	public function url_download_siujk($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_siujk_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_Rekanan_tervalidasi->get_id_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen = $get_row_enkrip['file_dokumen'];

		// Locate.
		$file_name = $get_row_enkrip['file_dokumen'];
		$file_url = $this->url_dokumen_vendor . 'file_vms/' . $row_vendor['nama_usaha'] . '/SIUJK-' . $date . '/' . $get_row_enkrip['file_dokumen'];

		// Configure.
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

		// Actual download.
		readfile($file_url);
	}
	// end siujk

	// AKTA PENDIRIAN
	public function encryption_akta_pendirian($id_url)
	{
		$type = $this->input->post('type');
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_akta_pendirian_url($id_url);
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

			$this->M_Rekanan_tervalidasi->update_enkrip_akta_pendirian($where, $data);
		} else {
			$response = [
				'maaf' => 'Gagal!'
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function validation_akta_pendirian()
	{
		$type = $this->input->post('type');
		$type_kbli = $this->input->post('type_kbli');
		$alasan_validator = $this->input->post('alasan_validator');
		$id_url = $this->input->post('id_url_akta_pendirian');

		$nm_validator = $this->session->userdata('nama_pegawai');

		if (!$type_kbli) {

			$id_vendor = $this->M_Rekanan_tervalidasi->get_row_akta_pendirian_url($id_url);
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
			$data = $this->M_Rekanan_tervalidasi->update_enkrip_akta_pendirian($where, $data);
		} else {
			$id_vendor = $this->M_Rekanan_tervalidasi->get_row_akta_pendirian_kbli_url($id_url);
			$get_vendor = $id_vendor['id_vendor'];
			if ($type_kbli == 'terima_kbli') {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_kbli_akta_pendirian' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url_kbli_akta_pendirian' => $id_url
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
					'sts_kbli_akta_pendirian' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url_kbli_akta_pendirian' => $id_url
				];
				$data_vendor = [
					'sts_dokumen_cek' => 2
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
			}
			$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
			$data = $this->M_Rekanan_tervalidasi->update_enkrip_kbli_akta_pendirian($where, $data);
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

	public function url_download_akta_pendirian($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_akta_pendirian_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_Rekanan_tervalidasi->get_id_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen = $get_row_enkrip['file_dokumen'];

		// Locate.
		$file_name = $get_row_enkrip['file_dokumen'];
		$file_url = $this->url_dokumen_vendor . 'file_vms/' . $row_vendor['nama_usaha'] . '/Akta_Pendirian-' . $date . '/' . $get_row_enkrip['file_dokumen'];

		// Configure.
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

		// Actual download.
		readfile($file_url);
	}

	// END AKTA PENDIRIAN

	// AKTA perubahan
	public function encryption_akta_perubahan($id_url)
	{
		$type = $this->input->post('type');
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_akta_perubahan_url($id_url);
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

			$this->M_Rekanan_tervalidasi->update_enkrip_akta_perubahan($where, $data);
		} else {
			$response = [
				'maaf' => 'Gagal!'
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function validation_akta_perubahan()
	{
		$type = $this->input->post('type');
		$type_kbli = $this->input->post('type_kbli');
		$alasan_validator = $this->input->post('alasan_validator');
		$id_url = $this->input->post('id_url_akta_perubahan');

		$nm_validator = $this->session->userdata('nama_pegawai');

		if (!$type_kbli) {

			$id_vendor = $this->M_Rekanan_tervalidasi->get_row_akta_perubahan_url($id_url);
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
			$data = $this->M_Rekanan_tervalidasi->update_enkrip_akta_perubahan($where, $data);
		} else {
			$id_vendor = $this->M_Rekanan_tervalidasi->get_row_akta_perubahan_kbli_url($id_url);
			$get_vendor = $id_vendor['id_vendor'];
			if ($type_kbli == 'terima_kbli') {
				$data = [
					'alasan_validator' => $alasan_validator,
					'sts_kbli_akta_perubahan' => 1,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url_kbli_akta_perubahan' => $id_url
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
					'sts_kbli_akta_perubahan' => 2,
					'nama_validator' => $nm_validator,
					'tgl_periksa' => date('Y-m-d H:i')
				];
				$where = [
					'id_url_kbli_akta_perubahan' => $id_url
				];
				$data_vendor = [
					'sts_dokumen_cek' => 2
				];
				$where_vendor = [
					'id_vendor' => $get_vendor
				];
			}
			$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
			$data = $this->M_Rekanan_tervalidasi->update_enkrip_kbli_akta_perubahan($where, $data);
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

	public function url_download_akta_perubahan($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_akta_perubahan_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_Rekanan_tervalidasi->get_id_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen = $get_row_enkrip['file_dokumen'];

		// Locate.
		$file_name = $get_row_enkrip['file_dokumen'];
		$file_url = $this->url_dokumen_vendor . 'file_vms/' . $row_vendor['nama_usaha'] . '/Akta_Perubahan-' . $date . '/' . $get_row_enkrip['file_dokumen'];

		// Configure.
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

		// Actual download.
		readfile($file_url);
	}

	// END AKTA perubahan

	// MANAJERIAL
	public function get_data_pemilik_manajerial($id_vendor)
	{
		$resultss = $this->M_Rekanan_tervalidasi->gettable_pemilik_manajerial($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->nik;
			$row[] = $rs->npwp;
			$row[] = $rs->nama_pemilik;
			$row[] = $rs->warganegara;
			$row[] = $rs->alamat_pemilik;
			$row[] = $rs->saham;
			if ($rs->sts_validasi == 0 || $rs->sts_validasi == null) {
				$row[] = '<small><span class="badge swatch-orange text-white">Belum Di Periksa</span></small>';
			} else if ($rs->sts_validasi == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Sudah Valid</span></small>';
			} else if ($rs->sts_validasi == 2) {
				$row[] = '<small><span class="badge bg-danger text-white">Belum Valid</span></small>';
			}

			if ($rs->sts_validasi == 0 || $rs->sts_validasi == null) {
				$row[] = '<center><a  href="javascript:;" class="btn btn-info btn-sm" onClick="by_id_pemilik_manajerial(' . "'" . $rs->id_pemilik . "','edit'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> Lihat</a><a  href="javascript:;" class="btn btn-success btn-sm" onClick="Valid_pemilik(' . "'" . $rs->id_pemilik . "',''" . ')"><i class="fa-solid fa-square-check px-1"></i> Valid</a><a  href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_pemilik(' . "'" . $rs->id_pemilik . "',''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a> </center>';
			} else if ($rs->sts_validasi == 1) {
				$row[] = '<center><a  href="javascript:;" class="btn btn-info btn-sm" onClick="by_id_pemilik_manajerial(' . "'" . $rs->id_pemilik . "','edit'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> Lihat</a><button type="button" class="btn btn-success btn-sm" disabled><i class="fa-solid fa-square-check px-1"></i> Valid</button><a  href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_pemilik(' . "'" . $rs->id_pemilik . "',''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a> </center>';
			} else if ($rs->sts_validasi == 2) {
				$row[] = '<center><a  href="javascript:;" class="btn btn-info btn-sm" onClick="by_id_pemilik_manajerial(' . "'" . $rs->id_pemilik . "','edit'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> Lihat</a><a  href="javascript:;" class="btn btn-success btn-sm" onClick="Valid_pemilik(' . "'" . $rs->id_pemilik . "',''" . ')"><i class="fa-solid fa-square-check px-1"></i> Valid</a><a  href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_pemilik(' . "'" . $rs->id_pemilik . "',''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a> </center>';
			}

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Rekanan_tervalidasi->count_all_data_pemilik_manajerial($id_vendor),
			"recordsFiltered" => $this->M_Rekanan_tervalidasi->count_filtered_data_pemilik_manajerial($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function by_id_pemilik_manajerial($id_pemilik)
	{
		$response = [
			'row_pemilik_manajerial' => $this->M_Rekanan_tervalidasi->get_row_pemilik_manajerial_id($id_pemilik),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function dekrip_enkrip_pemilik($id_url)
	{
		$type = $this->input->post('type');
		$type_edit_pemilik = $this->input->post('type_edit_pemilik');
		if ($type_edit_pemilik == 'edit_excel') {
			$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_excel_pemilik_manajerial_enkription($id_url);
		} else {
			$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_pemilik_manajerial_enkription($id_url);
		}
		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url'];
		$secret_token_dokumen2 = 'jmto.2' . $get_row_enkrip['id_url'];
		$where = [
			'id_url' => $id_url
		];
		if ($type == 'dekrip') {
			$file_ktp = openssl_decrypt($get_row_enkrip['file_ktp'], $chiper, $secret_token_dokumen1);
			$file_npwp = openssl_decrypt($get_row_enkrip['file_npwp'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen_pemilik' => 2,
				'file_ktp' => $file_ktp,
				'file_npwp' => $file_npwp,
			];
		} else {
			$file_ktp = openssl_encrypt($get_row_enkrip['file_ktp'], $chiper, $secret_token_dokumen1);
			$file_npwp = openssl_encrypt($get_row_enkrip['file_npwp'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen_pemilik' => 1,
				'file_ktp' => $file_ktp,
				'file_npwp' => $file_npwp,
			];
		}
		if ($type_edit_pemilik == 'edit_excel') {
			$this->M_Rekanan_tervalidasi->update_excel_pemilik_manajerial_enkription($where, $data);
		} else {
			$this->M_Rekanan_tervalidasi->update_pemilik_manajerial_enkription($where, $data);
		}
		$response = [
			'type_edit_pemilik' => $type_edit_pemilik,
			// 'row_excel_pemilik_manajerial' => $this->M_Rekanan_tervalidasi->get_row_excel_pemilik_manajerial($get_row_enkrip['id_pemilik']),
			'row_pemilik_manajerial' => $this->M_Rekanan_tervalidasi->get_row_pemilik_manajerial_id($get_row_enkrip['id_pemilik']),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function validation_pemilik()
	{
		$type = $this->input->post('type');
		$type_kbli = $this->input->post('type_kbli');
		$alasan_validator = $this->input->post('alasan_validator');
		$id_url = $this->input->post('id_url_pemilik');
		$nm_validator = $this->session->userdata('nama_pegawai');

		$id_vendor = $this->M_Rekanan_tervalidasi->get_row_pemilik_manajerial_id($id_url);
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
				'id_url' => $id_vendor['id_url']
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
				'id_url' => $id_vendor['id_url']
			];
			$data_vendor = [
				'sts_dokumen_cek' => 2
			];
			$where_vendor = [
				'id_vendor' => $get_vendor
			];
		}
		$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
		$data = $this->M_Rekanan_tervalidasi->update_pemilik_manajerial_enkription($where, $data);


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

	// pengurus
	public function get_data_pengurus_manajerial($id_vendor)
	{
		$resultss = $this->M_Rekanan_tervalidasi->gettable_pengurus_manajerial($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->nik;
			$row[] = $rs->npwp;
			$row[] = $rs->nama_pengurus;
			$row[] = $rs->warganegara;
			$row[] = $rs->jabatan_pengurus;
			$row[] = $rs->jabatan_mulai;
			$row[] = $rs->jabatan_selesai;
			if ($rs->sts_validasi == 0 || $rs->sts_validasi == null) {
				$row[] = '<small><span class="badge swatch-orange text-white">Belum Di Periksa</span></small>';
			} else if ($rs->sts_validasi == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Sudah Valid</span></small>';
			} else if ($rs->sts_validasi == 2) {
				$row[] = '<small><span class="badge bg-danger text-white">Belum Valid</span></small>';
			}

			if ($rs->sts_validasi == 0 || $rs->sts_validasi == null) {
				$row[] = '<center><a href="javascript:;" class="btn btn-info btn-sm" onClick="by_id_pengurus_manajerial(' . "'" . $rs->id_pengurus . "' ,'edit'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> Lihat</a><a  href="javascript:;" class="btn btn-success btn-sm" onClick="Valid_pengurus(' . "'" . $rs->id_pengurus . "',''" . ')"><i class="fa-solid fa-square-check px-1"></i> Valid</a><a href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_pengurus(' . "'" . $rs->id_pengurus . "' ,''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a> </center>';
			} else if ($rs->sts_validasi == 1) {
				$row[] = '<center><a href="javascript:;" class="btn btn-info btn-sm" onClick="by_id_pengurus_manajerial(' . "'" . $rs->id_pengurus . "' ,'edit'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> Lihat</a><button type="button" class="btn btn-success btn-sm" disabled><i class="fa-solid fa-square-check px-1"></i> Valid</button><a  href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_pengurus(' . "'" . $rs->id_pengurus . "',''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a> </center>';
			} else if ($rs->sts_validasi == 2) {
				$row[] = '<center><a href="javascript:;" class="btn btn-info btn-sm" onClick="by_id_pengurus_manajerial(' . "'" . $rs->id_pengurus . "' ,'edit'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> Lihat</a><a  href="javascript:;" class="btn btn-success btn-sm" onClick="Valid_pengurus(' . "'" . $rs->id_pengurus . "',''" . ')"><i class="fa-solid fa-square-check px-1"></i> Valid</a><a href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_pengurus(' . "'" . $rs->id_pengurus . "' ,''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a> </center>';
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Rekanan_tervalidasi->count_all_data_pengurus_manajerial($id_vendor),
			"recordsFiltered" => $this->M_Rekanan_tervalidasi->count_filtered_data_pengurus_manajerial($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function by_id_pengurus_manajerial($id_pengurus)
	{
		$response = [
			'row_pengurus_manajerial' => $this->M_Rekanan_tervalidasi->get_row_pengurus_manajerial_id($id_pengurus),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function dekrip_enkrip_pengurus($id_url)
	{
		$type = $this->input->post('type');
		$type_edit_pengurus = $this->input->post('type_edit_pengurus');

		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_pengurus_manajerial_enkription($id_url);

		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url'];
		$secret_token_dokumen2 = 'jmto.2' . $get_row_enkrip['id_url'];
		$where = [
			'id_url' => $id_url
		];
		if ($type == 'dekrip') {
			$file_ktp_pengurus = openssl_decrypt($get_row_enkrip['file_ktp_pengurus'], $chiper, $secret_token_dokumen1);
			$file_npwp_pengurus = openssl_decrypt($get_row_enkrip['file_npwp_pengurus'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen_pengurus' => 2,
				'file_ktp_pengurus' => $file_ktp_pengurus,
				'file_npwp_pengurus' => $file_npwp_pengurus,
			];
		} else {
			$file_ktp_pengurus = openssl_encrypt($get_row_enkrip['file_ktp_pengurus'], $chiper, $secret_token_dokumen1);
			$file_npwp_pengurus = openssl_encrypt($get_row_enkrip['file_npwp_pengurus'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen_pengurus' => 1,
				'file_ktp_pengurus' => $file_ktp_pengurus,
				'file_npwp_pengurus' => $file_npwp_pengurus,
			];
		}
		$this->M_Rekanan_tervalidasi->update_pengurus_manajerial_enkription($where, $data);
		$response = [
			'type_edit_pengurus' => $type_edit_pengurus,
			// 'row_excel_pengurus_manajerial' => $this->M_Rekanan_tervalidasi->get_row_excel_pengurus_manajerial($get_row_enkrip['id_pengurus']),
			'row_pengurus_manajerial' => $this->M_Rekanan_tervalidasi->get_row_pengurus_manajerial_id($get_row_enkrip['id_pengurus']),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function validation_pengurus()
	{
		$type = $this->input->post('type');
		$type_kbli = $this->input->post('type_kbli');
		$alasan_validator = $this->input->post('alasan_validator');
		$id_url = $this->input->post('id_url_pengurus');
		$nm_validator = $this->session->userdata('nama_pegawai');

		$id_vendor = $this->M_Rekanan_tervalidasi->get_row_pengurus_manajerial_id($id_url);
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
				'id_url' => $id_vendor['id_url']
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
				'id_url' => $id_vendor['id_url']
			];
			$data_vendor = [
				'sts_dokumen_cek' => 2
			];
			$where_vendor = [
				'id_vendor' => $get_vendor
			];
		}
		$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
		$data = $this->M_Rekanan_tervalidasi->update_pengurus_manajerial_enkription($where, $data);


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
	// end pengurus
	// END MANAJERIAL

	// pengalaman
	public function get_data_pengalaman($id_vendor)
	{
		$resultss = $this->M_Rekanan_tervalidasi->gettable_pengalaman($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->no_kontrak;
			$row[] = $rs->tanggal_kontrak;
			$row[] = $rs->nama_pekerjaan;
			$row[] = $rs->nilai_kontrak;
			$row[] = $rs->id_jenis_usaha;
			$row[] = $rs->instansi_pemberi;
			$row[] = $rs->lokasi_pekerjaan;
			if ($rs->sts_validasi == 0 || $rs->sts_validasi == null) {
				$row[] = '<small><span class="badge swatch-orange text-white">Belum Di Periksa</span></small>';
			} else if ($rs->sts_validasi == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Sudah Valid</span></small>';
			} else if ($rs->sts_validasi == 2) {
				$row[] = '<small><span class="badge bg-danger text-white">Belum Valid</span></small>';
			}

			if ($rs->sts_validasi == 0 || $rs->sts_validasi == null) {
				$row[] = '<center><a href="javascript:;" class="btn btn-info btn-sm" onClick="by_id_pengalaman(' . "'" . $rs->id_pengalaman . "' ,'edit'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> Lihat</a>
				<a  href="javascript:;" class="btn btn-success btn-sm" onClick="Valid_pengalaman(' . "'" . $rs->id_pengalaman . "',''" . ')"><i class="fa-solid fa-square-check px-1"></i> Valid</a><a href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_pengalaman(' . "'" . $rs->id_pengalaman . "' ,''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a> </center>';
			} else if ($rs->sts_validasi == 1) {
				$row[] = '<center><a href="javascript:;" class="btn btn-info btn-sm" onClick="by_id_pengalaman(' . "'" . $rs->id_pengalaman . "' ,'edit'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> Lihat</a>
				<button type="button" class="btn btn-success btn-sm" disabled><i class="fa-solid fa-square-check px-1"></i> Valid</button><a  href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_pengalaman(' . "'" . $rs->id_pengalaman . "',''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a> </center>';
			} else if ($rs->sts_validasi == 2) {
				$row[] = '<center><a href="javascript:;" class="btn btn-info btn-sm" onClick="by_id_pengalaman(' . "'" . $rs->id_pengalaman . "' ,'edit'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> Lihat</a>
				<a href="javascript:;" class="btn btn-success btn-sm" onClick="Valid_pengalaman(' . "'" . $rs->id_pengalaman . "',''" . ')"><i class="fa-solid fa-square-check px-1"></i> Valid</a><a href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_pengalaman(' . "'" . $rs->id_pengalaman . "' ,''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a> </center>';
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Rekanan_tervalidasi->count_all_data_pengalaman($id_vendor),
			"recordsFiltered" => $this->M_Rekanan_tervalidasi->count_filtered_data_pengalaman($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function validation_pengalaman()
	{
		$type = $this->input->post('type');
		$type_kbli = $this->input->post('type_kbli');
		$alasan_validator = $this->input->post('alasan_validator');
		$id_url = $this->input->post('id_url_pengalaman');
		$nm_validator = $this->session->userdata('nama_pegawai');

		$id_vendor = $this->M_Rekanan_tervalidasi->get_row_pengalaman_id($id_url);
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
				'id_url' => $id_vendor['id_url']
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
				'id_url' => $id_vendor['id_url']
			];
			$data_vendor = [
				'sts_dokumen_cek' => 2
			];
			$where_vendor = [
				'id_vendor' => $get_vendor
			];
		}
		$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
		$data = $this->M_Rekanan_tervalidasi->update_pengalaman_enkription($where, $data);


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

	function by_id_pengalaman($id_pengalaman)
	{
		$response = [
			'row_pengalaman' => $this->M_Rekanan_tervalidasi->get_row_pengalaman_id($id_pengalaman),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function dekrip_enkrip_pengalaman($id_url)
	{
		$type = $this->input->post('type');
		$type_edit_pengalaman = $this->input->post('type_edit_pengalaman');
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_pengalaman_enkription($id_url);
		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url'];
		$where = [
			'id_url' => $id_url
		];
		if ($type == 'dekrip') {
			$file_kontrak_pengalaman = openssl_decrypt($get_row_enkrip['file_kontrak_pengalaman'], $chiper, $secret_token_dokumen1);
			$data = [
				'sts_token_dokumen_pengalaman' => 2,
				'file_kontrak_pengalaman' => $file_kontrak_pengalaman,
			];
		} else {
			$file_kontrak_pengalaman = openssl_encrypt($get_row_enkrip['file_kontrak_pengalaman'], $chiper, $secret_token_dokumen1);
			$data = [
				'sts_token_dokumen_pengalaman' => 1,
				'file_kontrak_pengalaman' => $file_kontrak_pengalaman,
			];
		}
		$this->M_Rekanan_tervalidasi->update_pengalaman_enkription($where, $data);
		$response = [
			'type_edit_pengalaman' => $type_edit_pengalaman,
			'row_pengalaman_manajerial' => $this->M_Rekanan_tervalidasi->get_row_pengalaman_id($get_row_enkrip['id_pengalaman']),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	// end pengalaman

	// sppkp
	public function encryption_sppkp($id_url)
	{
		$type = $this->input->post('type');
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_sppkp_url($id_url);
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

			$this->M_Rekanan_tervalidasi->update_enkrip_sppkp($where, $data);
		} else {
			$response = [
				'maaf' => 'Gagal!'
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function validation_sppkp()
	{
		$type = $this->input->post('type');
		$alasan_validator = $this->input->post('alasan_validator');
		$id_url = $this->input->post('id_url_sppkp');

		$nm_validator = $this->session->userdata('nama_pegawai');

		$id_vendor = $this->M_Rekanan_tervalidasi->get_row_sppkp_url($id_url);
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
		$data = $this->M_Rekanan_tervalidasi->update_enkrip_sppkp($where, $data);

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

	public function url_download_sppkp($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_sppkp_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_Rekanan_tervalidasi->get_id_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen = $get_row_enkrip['file_dokumen'];

		// Locate.
		$file_name = $get_row_enkrip['file_dokumen'];
		$file_url = $this->url_dokumen_vendor . 'file_vms/' . $row_vendor['nama_usaha'] . '/SPPKP-' . $date . '/' . $get_row_enkrip['file_dokumen'];

		// Configure.
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

		// Actual download.
		readfile($file_url);
	}
	// end sppkp


	// pajak npwp
	public function encryption_npwp($id_url)
	{
		$type = $this->input->post('type');
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_npwp_url($id_url);
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

			$this->M_Rekanan_tervalidasi->update_enkrip_npwp($where, $data);
		} else {
			$response = [
				'maaf' => 'Gagal!'
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function validation_npwp()
	{
		$type = $this->input->post('type');
		$alasan_validator = $this->input->post('alasan_validator');
		$id_url = $this->input->post('id_url_npwp');

		$nm_validator = $this->session->userdata('nama_pegawai');

		$id_vendor = $this->M_Rekanan_tervalidasi->get_row_npwp_url($id_url);
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
		$data = $this->M_Rekanan_tervalidasi->update_enkrip_npwp($where, $data);

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

	public function url_download_npwp($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_npwp_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_Rekanan_tervalidasi->get_id_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen = $get_row_enkrip['file_dokumen'];

		// Locate.
		$file_name = $get_row_enkrip['file_dokumen'];
		$file_url = $this->url_dokumen_vendor . 'file_vms/' . $row_vendor['nama_usaha'] . '/npwp-' . $date . '/' . $get_row_enkrip['file_dokumen'];

		// Configure.
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

		// Actual download.
		readfile($file_url);
	}
	// end pajak npwp

	// pajak spt
	function get_data_spt($id_vendor)
	{
		$result = $this->M_Rekanan_tervalidasi->gettable_spt($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {

			$row = array();
			$row[] = ++$no;
			$row[] = $rs->nomor_surat;
			$row[] = $rs->tahun_lapor;
			$row[] = $rs->jenis_spt;
			$row[] = $rs->tgl_penyampaian;
			if ($rs->sts_token_dokumen == 1) {
				$row[] = $rs->file_dokumen;
			} else {
				$row[] = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_spt(\'' . $rs->id_url . '\')" class="btn btn-sm btn-warning btn-block">' . $rs->file_dokumen . '</a>';
			}
			if ($rs->sts_token_dokumen == 1) {
				$row[] = '<center>
            	<a href="javascript:;" class="btn btn-success btn-sm shadow-lg" onClick="byid_spt(' . "'" . $rs->id_url . "','enkrip'" . ')"> <i class="fa-solid fa-lock px-1"></i> Enkrip</a></center>';
			} else {
				$row[] = '<center>
            	<a href="javascript:;" class="btn btn-warning btn-sm shadow-lg" onClick="byid_spt(' . "'" . $rs->id_url . "','dekrip'" . ')"> <i class="fa-solid fa-lock-open px-1"></i> Dekrip</a></center>';
			}
			// nanti main kondisi hitung dokumen dimari
			if ($rs->sts_validasi == null) {
				$row[] = '<small><span class="badge bg-secondary">Belum Di Periksa</span></small>';
			} else if ($rs->sts_validasi == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Sudah Valid</span></small>';
			} else if ($rs->sts_validasi == 2) {
				$row[] = '<small><span class="badge bg-danger text-white">Belum Valid</span></small>';
			}
			if ($rs->sts_validasi == 0 || $rs->sts_validasi == null) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="Valid_spt(' . "'" . $rs->id_url . "',''" . ')"><i class="fa-solid fa-square-check px-1"></i> Valid</a><a href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_spt(' . "'" . $rs->id_url . "' ,''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			} else if ($rs->sts_validasi == 1) {
				$row[] = '<button type="button" disabled class="btn btn-success btn-sm" ><i class="fa-solid fa-square-check px-1"></i> Valid</button><a href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_spt(' . "'" . $rs->id_url . "' ,''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			} else {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="Valid_spt(' . "'" . $rs->id_url . "',''" . ')"><i class="fa-solid fa-square-check px-1"></i> Valid</a><a href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_spt(' . "'" . $rs->id_url . "' ,''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			}


			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Rekanan_tervalidasi->count_all_spt($id_vendor),
			"recordsFiltered" => $this->M_Rekanan_tervalidasi->count_filtered_spt($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function get_spt_by_id($id_url_vendor)
	{
		$row_spt = $this->M_Rekanan_tervalidasi->get_row_spt_enkription($id_url_vendor);
		$response = [
			'row_spt' => $row_spt
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function encryption_spt($id_url)
	{
		$id_url = $this->input->post('id_url_spt');
		$token_dokumen = $this->input->post('token_dokumen');
		// $secret_token = $this->input->post('secret_token');

		$type = $this->input->post('type');


		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_spt_enkription($id_url);
		// $id_vendor = $get_row_enkrip['id_vendor'];
		// $row_vendor = $this->M_Rekanan_tervalidasi->get_row_vendor($id_vendor);
		$chiper = "AES-128-ECB";
		$secret_token_dokumen = $get_row_enkrip['token_dokumen'];

		if ($type == 'enkrip') {
			$encryption_string = openssl_encrypt($get_row_enkrip['file_dokumen'], $chiper, $secret_token_dokumen);
			$where = [
				'id_url' => $id_url
			];
			$data = [
				'sts_token_dokumen' => 2,
				'file_dokumen' => $encryption_string,
			];
			if ($token_dokumen == $secret_token_dokumen) {
				$response = [
					'message' => 'success'
				];
				$this->M_Rekanan_tervalidasi->update_spt($where, $data);
			} else {
				$response = [
					'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
				];
			}
		} else {
			$encryption_string = openssl_decrypt($get_row_enkrip['file_dokumen'], $chiper, $secret_token_dokumen);
			$where = [
				'id_url' => $id_url
			];
			$data = [
				'sts_token_dokumen' => 1,
				'file_dokumen' => $encryption_string,
			];
			if ($token_dokumen == $secret_token_dokumen) {
				$response = [
					'message' => 'success'
				];
				$this->M_Rekanan_tervalidasi->update_spt($where, $data);
			} else {
				$response = [
					'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
				];
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function validation_spt()
	{
		$type = $this->input->post('type');
		$type_kbli = $this->input->post('type_kbli');
		$alasan_validator = $this->input->post('alasan_validator');
		$id_url = $this->input->post('id_url_spt');
		$nm_validator = $this->session->userdata('nama_pegawai');

		$id_vendor = $this->M_Rekanan_tervalidasi->get_row_spt_id_url($id_url);
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
				'id_url' => $id_vendor['id_url']
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
				'id_url' => $id_vendor['id_url']
			];
			$data_vendor = [
				'sts_dokumen_cek' => 2
			];
			$where_vendor = [
				'id_vendor' => $get_vendor
			];
		}
		$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
		$data = $this->M_Rekanan_tervalidasi->update_spt($where, $data);


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

	public function url_download_spt($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_spt_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_Rekanan_tervalidasi->get_row_vendor($id_vendor);
		$date = date('Y');
		// Locate.
		$file_name = $get_row_enkrip['file_dokumen'];
		$file_url = $this->url_dokumen_vendor . 'file_vms/' . $row_vendor['nama_usaha'] . '/SPT-' . $date . '/' . $get_row_enkrip['file_dokumen'];

		// Configure.
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

		// Actual download.
		readfile($file_url);
	}
	// end pajak spt



	function get_data_neraca($id_vendor)
	{
		$result = $this->M_Rekanan_tervalidasi->gettable_neraca($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->tangga_laporan;
			$row[] = $rs->nama_akuntan_public;
			if ($rs->sts_token_dokumen == 1) {
				$row[] = '<label for="" style="white-space: nowrap; 
				width: 100px; 
				overflow: hidden;
				text-overflow: ellipsis;">' . $rs->file_dokumen_neraca . '</label>';
				$row[] = '<label for="" style="white-space: nowrap; 
				width: 100px; 
				overflow: hidden;
				text-overflow: ellipsis;">' . $rs->file_dokumen_sertifikat . '</label>';
			} else {
				$row[] = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_neraca(\'' . $rs->id_url_neraca . '\'' . ',' . '\'' . 'neraca_dokumen' . '\')" class="btn btn-sm btn-warning btn-block">' . $rs->file_dokumen_neraca . '</a>';
				$row[] = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_neraca(\'' . $rs->id_url_neraca . '\'' . ',' . '\'' . 'neraca_sertifikat' . '\')" class="btn btn-sm btn-warning btn-block">' . $rs->file_dokumen_sertifikat . '</a>';
			}
			if ($rs->sts_token_dokumen == 2) {
				$row[] = '<center>
            	<a href="javascript:;" class="btn btn-success btn-sm shadow-lg" onClick="byid_neraca(' . "'" . $rs->id_url_neraca . "','enkrip'" . ')"> <i class="fa-solid fa-lock px-1"></i> Enkrip</a></center>';
			} else {
				$row[] = '<center>
            	<a href="javascript:;" class="btn btn-warning btn-sm shadow-lg" onClick="byid_neraca(' . "'" . $rs->id_url_neraca . "','dekrip'" . ')"> <i class="fa-solid fa-lock-open px-1"></i> Dekrip</a></center>';
			}
			// nanti main kondisi hitung dokumen dimari
			if ($rs->sts_validasi == null) {
				$row[] = '<small><span class="badge bg-secondary">Belum Di Periksa</span></small>';
			} else if ($rs->sts_validasi == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Sudah Valid</span></small>';
			} else if ($rs->sts_validasi == 2) {
				$row[] = '<small><span class="badge bg-danger text-white">Belum Valid</span></small>';
			}
			if ($rs->sts_validasi == 0 || $rs->sts_validasi == null) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="Valid_neraca(' . "'" . $rs->id_url_neraca . "',''" . ')"><i class="fa-solid fa-square-check px-1"></i> Valid</a><a href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_neraca(' . "'" . $rs->id_url_neraca . "' ,''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			} else if ($rs->sts_validasi == 1) {
				$row[] = '<button type="button" disabled class="btn btn-success btn-sm" ><i class="fa-solid fa-square-check px-1"></i> Valid</button><a href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_neraca(' . "'" . $rs->id_url_neraca . "' ,''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			} else {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="Valid_neraca(' . "'" . $rs->id_url_neraca . "',''" . ')"><i class="fa-solid fa-square-check px-1"></i> Valid</a><a href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_neraca(' . "'" . $rs->id_url_neraca . "' ,''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			}


			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Rekanan_tervalidasi->count_all_neraca($id_vendor),
			"recordsFiltered" => $this->M_Rekanan_tervalidasi->count_filtered_neraca($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function get_neraca_by_id($id_url_vendor)
	{
		$row_neraca = $this->M_Rekanan_tervalidasi->get_row_neraca_enkription($id_url_vendor);
		$response = [
			'row_neraca' => $row_neraca
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function encryption_neraca($id_url)
	{
		$id_url_neraca = $this->input->post('id_url_neraca');
		$token_dokumen = $this->input->post('token_dokumen');
		// $secret_token = $this->input->post('secret_token');

		$type = $this->input->post('type');


		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_neraca_enkription($id_url);
		// $id_vendor = $get_row_enkrip['id_vendor'];
		// $row_vendor = $this->M_Rekanan_tervalidasi->get_row_vendor($id_vendor);


		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url_neraca'];
		$secret_token_dokumen2 = 'jmto.2' . $get_row_enkrip['id_url_neraca'];
		$where = [
			'id_url_neraca' => $id_url_neraca
		];
		if ($type == 'dekrip') {
			$file_dokumen_neraca = openssl_decrypt($get_row_enkrip['file_dokumen_neraca'], $chiper, $secret_token_dokumen1);
			$file_dokumen_sertifikat = openssl_decrypt($get_row_enkrip['file_dokumen_sertifikat'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen' => 2,
				'file_dokumen_neraca' => $file_dokumen_neraca,
				'file_dokumen_sertifikat' => $file_dokumen_sertifikat,
			];
			if ($token_dokumen == $id_url_neraca) {
				$response = [
					'message' => 'success'
				];
				$this->M_Rekanan_tervalidasi->update_neraca($where, $data);
			} else {
				$response = [
					'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
				];
			}
			// st
		} else {
			$file_dokumen_neraca = openssl_encrypt($get_row_enkrip['file_dokumen_neraca'], $chiper, $secret_token_dokumen1);
			$file_dokumen_sertifikat = openssl_encrypt($get_row_enkrip['file_dokumen_sertifikat'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen' => 1,
				'file_dokumen_neraca' => $file_dokumen_neraca,
				'file_dokumen_sertifikat' => $file_dokumen_sertifikat,
			];
			if ($token_dokumen == $id_url_neraca) {
				$response = [
					'message' => 'success'
				];
				$this->M_Rekanan_tervalidasi->update_neraca($where, $data);
			} else {
				$response = [
					'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
				];
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function validation_neraca()
	{
		$type = $this->input->post('type');
		$type_kbli = $this->input->post('type_kbli');
		$alasan_validator = $this->input->post('alasan_validator');
		$id_url = $this->input->post('id_url_neraca');
		$nm_validator = $this->session->userdata('nama_pegawai');

		$id_vendor = $this->M_Rekanan_tervalidasi->get_row_neraca_id_url($id_url);
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
				'id_url_neraca' => $id_vendor['id_url_neraca']
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
				'id_url_neraca' => $id_vendor['id_url_neraca']
			];
			$data_vendor = [
				'sts_dokumen_cek' => 2
			];
			$where_vendor = [
				'id_vendor' => $get_vendor
			];
		}
		$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
		$data = $this->M_Rekanan_tervalidasi->update_neraca($where, $data);


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

	public function url_download_neraca()
	{
		$id_url = $this->uri->segment(4);
		$type = $this->uri->segment(5);
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_neraca_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_Rekanan_tervalidasi->get_row_vendor($id_vendor);
		$date = date('Y');
		if ($id_url == '') {
			// tendang not found
		}
		if ($id_url == '') {
			// tendang not found
		}
		if ($type == 'neraca_dokumen') {
			$fileDownload = $get_row_enkrip['file_dokumen_neraca'];
		}
		if ($type == 'neraca_sertifikat') {
			$fileDownload = $get_row_enkrip['file_dokumen_sertifikat'];
		}


		// Locate.
		$file_url = $this->url_dokumen_vendor . 'file_vms/' . $row_vendor['nama_usaha'] . '/Neraca-' . $date . '/' . $fileDownload;

		// Configure.
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=\"" . $fileDownload . "\"");

		// Actual download.
		readfile($file_url);
	}
	// pajak keuangan
	function get_data_keuangan($id_vendor)
	{
		$result = $this->M_Rekanan_tervalidasi->gettable_keuangan($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->tahun_lapor;
			if ($rs->sts_token_dokumen == 2) {
				$row[] = '<label for="" style="white-space: nowrap; 
					width: 100px; 
					overflow: hidden;
					text-overflow: ellipsis;">' . $rs->file_laporan_auditor . '</label>';
				$row[] = '<label for="" style="white-space: nowrap; 
					width: 100px; 
					overflow: hidden;
					text-overflow: ellipsis;">' . $rs->file_laporan_keuangan . '</label>';
			} else {
				$row[] = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_keuangan(\'' . $rs->id_url . '\'' . ',' . '\'' . 'keuangan_dokumen' . '\')" class="btn btn-sm btn-warning btn-block">' . $rs->file_laporan_auditor . '</a>';
				$row[] = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_keuangan(\'' . $rs->id_url . '\'' . ',' . '\'' . 'keuangan_sertifikat' . '\')" class="btn btn-sm btn-warning btn-block">' . $rs->file_laporan_keuangan . '</a>';
			}
			if ($rs->sts_token_dokumen == 2) {
				$row[] = '<center>
					<a href="javascript:;" class="btn btn-success btn-sm shadow-lg" onClick="byid_keuangan(' . "'" . $rs->id_url . "','enkrip'" . ')"> <i class="fa-solid fa-lock px-1"></i> Enkrip</a></center>';
			} else {
				$row[] = '<center>
					<a href="javascript:;" class="btn btn-warning btn-sm shadow-lg" onClick="byid_keuangan(' . "'" . $rs->id_url . "','dekrip'" . ')"> <i class="fa-solid fa-lock-open px-1"></i> Dekrip</a></center>';
			}
			// nanti main kondisi hitung dokumen dimari
			if ($rs->sts_validasi == null) {
				$row[] = '<small><span class="badge bg-secondary">Belum Di Periksa</span></small>';
			} else if ($rs->sts_validasi == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Sudah Valid</span></small>';
			} else if ($rs->sts_validasi == 2) {
				$row[] = '<small><span class="badge bg-danger text-white">Belum Valid</span></small>';
			}
			if ($rs->sts_validasi == 0 || $rs->sts_validasi == null) {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="Valid_keuangan(' . "'" . $rs->id_url . "',''" . ')"><i class="fa-solid fa-square-check px-1"></i> Valid</a><a href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_keuangan(' . "'" . $rs->id_url . "' ,''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			} else if ($rs->sts_validasi == 1) {
				$row[] = '<button type="button" disabled class="btn btn-success btn-sm" ><i class="fa-solid fa-square-check px-1"></i> Valid</button><a href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_keuangan(' . "'" . $rs->id_url . "' ,''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			} else {
				$row[] = '<a href="javascript:;" class="btn btn-success btn-sm" onClick="Valid_keuangan(' . "'" . $rs->id_url . "',''" . ')"><i class="fa-solid fa-square-check px-1"></i> Valid</a><a href="javascript:;" class="btn btn-danger btn-sm" onClick="NonValid_keuangan(' . "'" . $rs->id_url . "' ,''" . ')"><i class="fa-solid fa-rectangle-xmark px-1"></i> Tidak Valid</a></center>';
			}



			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Rekanan_tervalidasi->count_all_keuangan($id_vendor),
			"recordsFiltered" => $this->M_Rekanan_tervalidasi->count_filtered_keuangan($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function get_keuangan_by_id($id_url)
	{
		$row_keuangan = $this->M_Rekanan_tervalidasi->get_row_keuangan_enkription($id_url);
		$response = [
			'row_keuangan' => $row_keuangan
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function encryption_keuangan($id_url)
	{
		$id_url_keuangan = $this->input->post('id_url_keuangan');
		$token_dokumen = $this->input->post('token_dokumen');
		// $secret_token = $this->input->post('secret_token');

		$type = $this->input->post('type');


		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_keuangan_enkription($id_url);
		// $id_vendor = $get_row_enkrip['id_vendor'];
		// $row_vendor = $this->M_Rekanan_tervalidasi->get_row_vendor($id_vendor);


		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url'];
		$secret_token_dokumen2 = 'jmto.2' . $get_row_enkrip['id_url'];
		$where = [
			'id_url' => $id_url_keuangan
		];
		if ($type == 'dekrip') {
			$file_laporan_auditor = openssl_decrypt($get_row_enkrip['file_laporan_auditor'], $chiper, $secret_token_dokumen1);
			$file_laporan_keuangan = openssl_decrypt($get_row_enkrip['file_laporan_keuangan'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen' => 2,
				'file_laporan_auditor' => $file_laporan_auditor,
				'file_laporan_keuangan' => $file_laporan_keuangan,
			];
			if ($token_dokumen == $get_row_enkrip['token_dokumen']) {
				$response = [
					'message' => 'success'
				];
				$this->M_Rekanan_tervalidasi->update_keuangan($where, $data);
			} else {
				$response = [
					'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
				];
			}
			// st
		} else {
			$file_laporan_auditor = openssl_encrypt($get_row_enkrip['file_laporan_auditor'], $chiper, $secret_token_dokumen1);
			$file_laporan_keuangan = openssl_encrypt($get_row_enkrip['file_laporan_keuangan'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen' => 1,
				'file_laporan_auditor' => $file_laporan_auditor,
				'file_laporan_keuangan' => $file_laporan_keuangan,
			];
			if ($token_dokumen == $get_row_enkrip['token_dokumen']) {
				$response = [
					'message' => 'success'
				];
				$this->M_Rekanan_tervalidasi->update_keuangan($where, $data);
			} else {
				$response = [
					'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
				];
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	function validation_keuangan()
	{
		$type = $this->input->post('type');
		$type_kbli = $this->input->post('type_kbli');
		$alasan_validator = $this->input->post('alasan_validator');
		$id_url = $this->input->post('id_url_keuangan');
		$nm_validator = $this->session->userdata('nama_pegawai');

		$id_vendor = $this->M_Rekanan_tervalidasi->get_row_keuangan_id_url($id_url);
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
				'id_url' => $id_vendor['id_url']
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
				'id_url' => $id_vendor['id_url']
			];
			$data_vendor = [
				'sts_dokumen_cek' => 2
			];
			$where_vendor = [
				'id_vendor' => $get_vendor
			];
		}
		$this->M_Rekanan_tervalidasi->update_vendor($data_vendor, $where_vendor);
		$data = $this->M_Rekanan_tervalidasi->update_keuangan($where, $data);


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

	public function url_download_keuangan()
	{
		$id_url = $this->uri->segment(4);
		$type = $this->uri->segment(5);
		$get_row_enkrip = $this->M_Rekanan_tervalidasi->get_row_keuangan_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_Rekanan_tervalidasi->get_row_vendor($id_vendor);
		$date = date('Y');
		if ($id_url == '') {
			// tendang not found
		}
		if ($id_url == '') {
			// tendang not found
		}

		if ($type == 'keuangan_dokumen') {
			$fileDownload = $get_row_enkrip['file_laporan_auditor'];
		}
		if ($type == 'keuangan_sertifikat') {
			$fileDownload = $get_row_enkrip['file_laporan_keuangan'];
		}


		// Locate.
		$file_url = $this->url_dokumen_vendor . 'file_vms/' . $row_vendor['nama_usaha'] . '/Keuangan-' . $date . '/' . $fileDownload;

		// Configure.
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=\"" . $fileDownload . "\"");

		// Actual download.
		readfile($file_url);
	}
	// end pajak keuangan




}
