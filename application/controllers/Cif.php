<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cif extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Cif_model', 'cifModel');
    }

    public function index()
    {
        $data['title'] = 'Generate CIF';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['dataCIF'] = $this->cifModel->getDataCIF()->result_array();

        $this->load->view('templates/header-main-page-template/header-main-page', $data);
        $this->load->view('templates/loader-template/loader');
        $this->load->view('pages/cif-page/cif', $data);
        $this->load->view('templates/footer-main-page-template/footer-main-page');
    }

    public function generateCIF()
    {
        $kantor_bank_jateng = htmlspecialchars($this->input->post('kantor_bank_jateng'));
        $nama = htmlspecialchars($this->input->post('nama'));
        $alamat = htmlspecialchars($this->input->post('alamat'));
        $tanda_pengenal_nasabah = $this->input->post('tanda_pengenal');
        $date_created = date('Y-m-d H:i:s');
        // === Generate Nomor CIF ===
        $word = array_merge(range('0', '9'), range('A', 'Z'));
        $acak = shuffle($word);
        $nomor_CIF  = substr(implode($word), 0, 7);

        $data = [
            'nama_kantor_bank_jateng' => $kantor_bank_jateng,
            'nama_nasabah'            => $nama,
            'alamat_nasabah'          => $alamat,
            'tanda_pengenal_nasabah'  => $tanda_pengenal_nasabah,
            'date_created'            => $date_created,
            'cif'                     => $nomor_CIF
        ];

        $this->cifModel->insertData($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
            <strong>Nomor CIF beserta Data Nasabah Berhasil dibuat!</div>');
        redirect('cif');
    }

    public function editCIF()
    {
        $id = $this->input->post('id');
        $kantor_bank_jateng = htmlspecialchars($this->input->post('kantor_bank_jateng'));
        $nama = htmlspecialchars($this->input->post('nama'));
        $alamat = htmlspecialchars($this->input->post('alamat'));
        $tanda_pengenal_nasabah = $this->input->post('tanda_pengenal');

        $data = [
            'nama_kantor_bank_jateng' => $kantor_bank_jateng,
            'nama_nasabah'            => $nama,
            'alamat_nasabah'          => $alamat,
            'tanda_pengenal_nasabah'  => $tanda_pengenal_nasabah,
        ];

        $this->cifModel->editDataCIF($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
            <strong>Nomor CIF beserta Data Nasabah Berhasil diedit!</div>');
        redirect('cif');
    }

    public function deleteCIF($id)
    {
        $id = decrypt_url($id);
        $this->cifModel->deleteDataCIF($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
            <strong>Nomor CIF beserta Data Nasabah Berhasil dihapus!</div>');
        redirect('cif');
    }
}
