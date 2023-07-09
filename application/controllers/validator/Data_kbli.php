<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Data_kbli extends CI_Controller
{

	public function  __construct()
	{
		parent::__construct();
		$this->load->model('M_master/M_master');
	}

	public function index()
	{
		$this->load->view('template_new/header');
		$this->load->view('validator/data_master/data_kbli');
		$this->load->view('template_new/footer');
		$this->load->view('validator/data_master/file_public_kbli');
	}

	function get_data_kbli()
	{
		$result = $this->M_master->gettable_kbli();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->kode_kbli;
			$row[] = $rs->nama_kbli;
			if ($rs->sts_aktif == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Aktif</span></small>';
			} else {
				$row[] =  '<small><span class="badge bg-danger text-white">Non - Aktif</span></small>';
			}

			$row[] = '<center><a href="javascript:;" class="btn btn-info btn-sm" onClick="byid(' . "'" . $rs->id_kbli . "','edit'" . ')"><i class="fa-solid fa-edit px-1"></i> Edit</a>
            <a href="javascript:;" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rs->id_kbli . "','aktif'" . ')"><i class="fa-solid fa-square-check px-1"></i> Aktif</a>
            <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $rs->id_kbli . "','nonaktif'" . ')"><i class="fa-solid fa-times px-1"></i> Non-Aktif</a></center>';

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_master->count_all_kbli(),
			"recordsFiltered" => $this->M_master->count_filtered_kbli(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function post_data()
	{

		$type = $this->input->post('type');
		$data = [
			'kode_kbli' => $this->input->post('kode_kbli'),
			'nama_kbli' => 	$this->input->post('nama_kbli')
		];

		if ($type == 'add') {
			$query = $this->M_master->add_kbli($data);
			if ($query) {
				$response = [
					'message' => 'Berhasil'
				];
			} else {
				$response = [
					'message' => 'Gagal'
				];
			}
		} else {
			$id = $this->input->post('id_kbli');
			$where = [
				'id_kbli' => $id
			];
			$query = $this->M_master->update_kbli($data, $where);

			if ($query) {
				$response = [
					'message' => 'Berhasil'
				];
			} else {
				$response = [
					'message' => 'Gagal'
				];
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function get_row_data($id)
	{
		$response = $this->M_master->get_row_kbli($id);
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function aktifkan_kbli()
	{
		$id = $this->input->post('id_kbli');
		$where = [
			'id_kbli' => $id
		];
		$data = [
			'sts_aktif' => 1
		];
		$query = $this->M_master->update_kbli($data, $where);
		if ($query) {
			$response = [
				'message' => 'Berhasil'
			];
		} else {
			$response = [
				'message' => 'Gagal'
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	function nonaktifkan_kbli()
	{
		$id = $this->input->post('id_kbli');
		$where = [
			'id_kbli' => $id
		];
		$data = [
			'sts_aktif' => 0
		];
		$query = $this->M_master->update_kbli($data, $where);
		if ($query) {
			$response = [
				'message' => 'Berhasil'
			];
		} else {
			$response = [
				'message' => 'Gagal'
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
