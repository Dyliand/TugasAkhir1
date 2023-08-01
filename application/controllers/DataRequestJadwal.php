<?php

/**
 * 
 */
class DataRequestJadwal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_Request');
		$this->load->model('Model_Dosen');
		$this->load->library('form_validation');
	}
	function index()
	{
		// tampil list request jadwal
		$data = [
			'dosen' => $this->Model_Dosen->getAllData(),
			'requestjadwal' => $this->Model_Request->getAllData()
		];
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('View_Request', $data);
		$this->load->view('footer');
	}


	public function validation_form()
	{
		$this->Model_Request->tambah_data();
		$this->session->set_flashdata('flash_requestjadwal', 'Disimpan');
		redirect('DataRequestJadwal');
	}

	public function hapus($id_req)
	{
		$this->Model_Request->hapus_data($id_req);
		$this->session->set_flashdata('flash_requestjadwal', 'Dihapus');
		redirect('DataRequestJadwal');
	}

	public function ubah($id_req)
	{
		$this->form_validation->set_rules("id_req", "ID Request", "required|max_length[5]");
		$this->form_validation->set_rules("har", "chkHari", "required");
		if ($this->form_validation->run() == FALSE) {
			$data['ubah'] = $this->Model_Request->detail_data($id_req);
			$data['dosen'] = $this->Model_Dosen->getAllData();
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('View_Ubahrequest', $data);
			$this->load->view('footer');
		} else {
			$this->Model_Request->ubah_data();
			$this->session->set_flashdata('flash_requestjadwal', 'DiUbah');
			redirect('DataRequestJadwal');
		}
	}
}
