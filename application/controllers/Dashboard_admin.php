<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['dataUser'] = $this->db->get('user')->result();
        $data['dataRekening'] = $this->db->get('data_rekening_nasabah')->result();

        $this->load->view('templates/header-main-page-template/header-main-page', $data);
        $this->load->view('templates/loader-template/loader');
        $this->load->view('pages/dashboard-page/dashboard-admin-page/dashboard-admin');
        $this->load->view('templates/footer-main-page-template/footer-main-page');
    }
}
