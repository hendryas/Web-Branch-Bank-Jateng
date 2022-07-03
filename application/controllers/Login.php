<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Login_model', 'loginModel');
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $user = $this->loginModel->getDataUserbyUsername($username)->row_array();

        if ($this->session->userdata('username')) {
            if ($user['role_id'] == 1) {
                redirect('dashboard_super_admin');
            } elseif ($user['role_id'] == 2) {
                redirect('dashboard_admin');
            } elseif ($user['role_id'] == 3) {
                redirect('dashboard_csr');
            }
        }
        //Buat rules ketika login
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Sign In';

            $this->load->view('templates/header-auth-login-template/header-auth-login', $data);
            $this->load->view('templates/loader-template/loader');
            $this->load->view('pages/login-page/login');
            $this->load->view('templates/footer-auth-login-template/footer-auth-login');
        } else {
            //Ketika validasi success
            $this->_login();
        }
    }

    //Method _login
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->loginModel->getDataUserbyUsername($username)->row_array();

        // Jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    // jika data benar
                    $data = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('dashboard_super_admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('dashboard_admin');
                    } else {
                        redirect('dashboard_csr');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    <strong>Password salah!</strong> Silahkan coba lagi.</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>Username ini belum di aktivasi!</strong> Silahkan cek email anda untuk mengaktivasi akun anda.</div>');
                redirect('login');
            }
        } else {
            // Jika usernya gak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
            <strong>Username belum terdaftar!</strong> Silahkan daftarkan akun anda.</div>');
            redirect('login');
        }
    }
}
