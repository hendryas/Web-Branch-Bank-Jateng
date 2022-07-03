<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Rekening_model', 'rekeningModel');
    }

    public function index()
    {
        $data['title'] = 'Generate Rekening Nasabah';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['dataRekening'] = $this->rekeningModel->getDataRekening()->result_array();
        $data['dataCIF'] = $this->rekeningModel->getDataCIF()->result_array();

        $this->load->view('templates/header-main-page-template/header-main-page', $data);
        $this->load->view('templates/loader-template/loader');
        $this->load->view('pages/rekening-page/rekening');
        $this->load->view('templates/footer-main-page-template/footer-main-page');
    }

    public function generateRekening()
    {
        $idCIFNasabah = $this->input->post('data_cif_nasabah');
        $dataCIFNasabah = $this->rekeningModel->getDataCIFNasabah($idCIFNasabah)->row_array();
        $noUrutNasabah = $dataCIFNasabah['id'];

        $panjangNoUrutNasabah = strlen((string)$noUrutNasabah);
        if ($panjangNoUrutNasabah == 1) {
            $hasilNoUrutNasabah = '5090-11-00000'  . $noUrutNasabah . '-12-1';
        } else if ($panjangNoUrutNasabah == 2) {
            $hasilNoUrutNasabah = '5090-11-0000'  . $noUrutNasabah . '-12-1';
        } else if ($panjangNoUrutNasabah == 3) {
            $hasilNoUrutNasabah = '5090-11-000'  . $noUrutNasabah . '-12-1';
        } else if ($panjangNoUrutNasabah == 4) {
            $hasilNoUrutNasabah = '5090-11-00'  . $noUrutNasabah . '-12-1';
        } else if ($panjangNoUrutNasabah == 5) {
            $hasilNoUrutNasabah = '5090-11-0'  . $noUrutNasabah . '-12-1';
        } else if ($panjangNoUrutNasabah == 6) {
            $hasilNoUrutNasabah = '5090-11-'  . $noUrutNasabah . '-12-1';
        }

        $data = [
            'cif' => $dataCIFNasabah['cif'],
            'no_rekening' => $hasilNoUrutNasabah,
            'nama_nasabah' => $dataCIFNasabah['nama_nasabah'],
            'nama_kantor_bank_jateng' => $dataCIFNasabah['nama_kantor_bank_jateng'],
            'status_rekening' => 0,
            'date_created' => date('Y-m-d H:i:s'),
        ];

        $this->rekeningModel->insertDataRekening($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
        <strong>Rekening beserta Berhasil dibuat!</div>');
        redirect('rekening');
    }

    public function deleteRekening($id)
    {
        $id = decrypt_url($id);
        $this->rekeningModel->deleteDataRekening($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
        <strong>Rekening beserta Berhasil dibuat!</div>');
        redirect('rekening');
    }

    public function editStatusRekening()
    {
        $id = $this->input->post('id');
        $status_rekening = $this->input->post('status_rekening');
        $this->rekeningModel->editStatusDataRekening($id, $status_rekening);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
        <strong>Status Rekening berhasil diedit!</div>');
        redirect('accrekening');
    }
}
