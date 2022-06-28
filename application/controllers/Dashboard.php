<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header-main-page-template/header-main-page', $data);
        $this->load->view('templates/loader-template/loader');
        $this->load->view('pages/dashboard-page/dashboard-csr-page/dashboard-csr');
        $this->load->view('templates/footer-main-page-template/footer-main-page');
    }
}
