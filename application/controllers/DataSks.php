<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class DataSks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Model_Sks');
        $this->load->library('form_validation');
    }
    function index()
    {
        // tampil list range jam
        $data['sks'] = $this->Model_Sks->getAllData();
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('View_Sks', $data);
        $this->load->view('footer');
    }


    public function validation_form()
    {
        $this->Model_Sks->tambah_data();
        $this->session->set_flashdata('flash_sks', 'Disimpan');
        redirect('DataSks');
    }

    public function hapus($id_jam)
    {
        $this->Model_Sks->hapus_data($id_jam);
        $this->session->set_flashdata('flash_sks', 'Dihapus');
        redirect('DataSks');
    }

    public function ubah($id_jam)
    {
        $this->form_validation->set_rules("id_jam", "ID Jam", "required|max_length[5]");
        $this->form_validation->set_rules("jamke", "Jam Ke-", "required");
        $this->form_validation->set_rules("jammu", "Jam Mulai", "required");
        $this->form_validation->set_rules("jamsel", " Jam Selesai", "required");
        if ($this->form_validation->run() == FALSE) {
            $data['ubah'] = $this->Model_Sks->detail_data($id_jam);
            $this->load->view('header');
            $this->load->view('sidebar');
            $this->load->view('Ubah_Sks', $data);
            $this->load->view('footer');
        } else {
            $this->Model_Sks->ubah_data();
            $this->session->set_flashdata('flash_sks', 'DiUbah');
            redirect('DataSks');
        }
    }
}
