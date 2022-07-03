<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accrekening extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Rekening_model', 'rekeningModel');
    }

    public function index()
    {
        $data['title'] = 'Persetujuan Membuat Rekening';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['dataRekening'] = $this->rekeningModel->getDataRekening()->result_array();
        $data['dataCIF'] = $this->rekeningModel->getDataCIF()->result_array();

        $this->load->view('templates/header-main-page-template/header-main-page', $data);
        $this->load->view('templates/loader-template/loader');
        $this->load->view('pages/rekening-page/acc-rekening');
        $this->load->view('templates/footer-main-page-template/footer-main-page');
    }
}
