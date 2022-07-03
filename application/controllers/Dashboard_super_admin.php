<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_super_admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';

        $data['dataUser'] = $this->db->get('user')->result();
        $data['dataRekening'] = $this->db->get('data_rekening_nasabah')->result();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header-main-page-template/header-main-page', $data);
        $this->load->view('templates/loader-template/loader');
        $this->load->view('pages/dashboard-page/dashboard-super-admin-page/dashboard-super-admin');
        $this->load->view('templates/footer-main-page-template/footer-main-page');
    }
}
