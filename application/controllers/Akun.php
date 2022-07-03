<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Akun_model', 'akunModel');
    }

    public function index()
    {
        $data['title'] = 'Buat Akun Baru';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data_akun'] = $this->akunModel->getDataAkun()->result_array();

        $this->load->view('templates/header-main-page-template/header-main-page', $data);
        $this->load->view('templates/loader-template/loader');
        $this->load->view('pages/akun-page/akun', $data);
        $this->load->view('templates/footer-main-page-template/footer-main-page');
    }

    public function generateAkun()
    {
        $nama_akun = htmlspecialchars($this->input->post('nama'));
        $username_akun = htmlspecialchars($this->input->post('username'));
        $email_akun = htmlspecialchars($this->input->post('email'));
        $password_akun = htmlspecialchars($this->input->post('password'));
        $date_created = date('Y-m-d H:i:s');

        $password_encrypt = password_hash($password_akun, PASSWORD_DEFAULT);

        $data = [
            'nama'         => $nama_akun,
            'username'     => $username_akun,
            'email'        => $email_akun,
            'password'     => $password_encrypt,
            'role_id'      => 3,
            'is_active'    => 1,
            'date_created' => $date_created,

        ];

        $this->akunModel->insertDataAkun($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
        <strong>Akun berhasil di buat!</strong></div>');
        redirect('akun');
    }

    public function editAkun()
    {
        $id = $this->input->post('id');
        $nama_akun = htmlspecialchars($this->input->post('nama'));
        $username_akun = htmlspecialchars($this->input->post('username'));
        $email_akun = htmlspecialchars($this->input->post('email'));
        $password_akun = htmlspecialchars($this->input->post('password'));

        $password_encrypt = password_hash($password_akun, PASSWORD_DEFAULT);

        $data = [
            'nama'         => $nama_akun,
            'username'     => $username_akun,
            'email'        => $email_akun,
            'password'     => $password_encrypt
        ];

        $this->akunModel->editDataAkun($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
        <strong>Akun berhasil di ubah!</strong></div>');
        redirect('akun');
    }

    public function deleteAkun($id)
    {
        $id = decrypt_url($id);
        $this->akunModel->deleteDataAkun($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center text-white" role="alert">
        <strong>Akun berhasil di hapus!</strong></div>');
        redirect('akun');
    }
}
