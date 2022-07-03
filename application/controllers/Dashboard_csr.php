<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_csr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['dataRekening'] = $this->db->get('data_rekening_nasabah')->result();

        $this->load->view('templates/header-main-page-template/header-main-page', $data);
        $this->load->view('templates/loader-template/loader');
        $this->load->view('pages/dashboard-page/dashboard-csr-page/dashboard-csr');
        $this->load->view('templates/footer-main-page-template/footer-main-page');
    }
}
