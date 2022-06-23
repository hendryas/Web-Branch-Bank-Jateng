<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgotpassword extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Forgot Password';

        $this->load->view('templates/header-auth-login-template/header-auth-login', $data);
        $this->load->view('templates/loader-template/loader');
        // $this->load->view('pages/login-page/login');
        $this->load->view('templates/footer-auth-login-template/footer-auth-login');
    }
    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email tidak boleh kosong.',
            'valid_email' => 'Silahkan tuliskan Alamat Email dengan benar.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgotpassword/view_forgot_password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email'         => $email,
                    'token'         => $token,
                    'date_created'  => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                <strong>Email berhasil dikirim! </strong> Silahkan cek email untuk mereset password.</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>Email belum terdaftar atau teraktivasi! </strong> Silahkan gunakan email yang sudah terdaftar.</div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->query("EXEC SP_get_email'" . $email . "'")->row_array();
        //$user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>Reset password gagal! </strong> Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
            <strong>Reset password gagal! </strong> Wrong email.</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {

        //cek jika sessionnya tidak ada reset_email
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]|callback_password_check', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[8]|matches[password1]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password tidak boleh kosong.'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Password';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgotpassword/view_change_password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            //setelah reset,hapus dulu sessionnya
            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Password berhasil di ubah! </strong> Silahkan login.</div>');
            redirect('auth');
        }
    }
}
