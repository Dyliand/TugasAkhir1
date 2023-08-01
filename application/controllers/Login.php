<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->library('session');
    }
    public function index()
    {
        $this->load->view('v_login');
    }
    public function ceklogin()
    {
        $this->load->model('M_login');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->M_login->ambillogin($username, $password);
    }
}
