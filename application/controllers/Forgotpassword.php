<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgotpassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Forgotpassword_model', 'forgotModel');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email tidak boleh kosong.',
            'valid_email' => 'Silahkan tuliskan Alamat Email dengan benar.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';

            $this->load->view('templates/header-auth-login-template/header-auth-login', $data);
            $this->load->view('templates/loader-template/loader');
            $this->load->view('pages/forgotpassword-page/forgotpassword');
            $this->load->view('templates/footer-auth-login-template/footer-auth-login');
        } else {
            $email = $this->input->post('email');
            $user = $this->forgotModel->getDataUserbyEmailActive($email)->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email'         => $email,
                    'token'         => $token,
                    'date_created'  => time()
                ];

                $this->forgotModel->insertDataToken($user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                <strong>Email berhasil dikirim! </strong> Silahkan cek email untuk mereset password.</div>');
                redirect('forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>Email belum terdaftar atau teraktivasi! </strong> Silahkan gunakan email yang sudah terdaftar.</div>');
                redirect('forgotpassword');
            }
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp', //simple mail transfer protocol
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'webbranchbankjateng@gmail.com', //nama email pengirim
            'smtp_pass' => 'dflkscvsepgrwqrg', //pass email pengirim
            'smtp_port' => 465, //port smtp google
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('webbranchbankjateng@gmail.com', 'Web Branch Bank Jateng');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link untuk verifikasi akun : <a style="display: inline-block; width: 220px; height: 30px; background: #1C3FAA; color: #fff; text-decoration: none; border-radius: 5px; text-align: center; line-height: 30px; font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif;" href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Aktivasi </a>'); // bisa di manpulasi memakai HTML
        } elseif ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link untuk mereset password : <a style="display: inline-block; width: 220px; height: 30px; background: #1C3FAA; color: #fff; text-decoration: none; border-radius: 5px; text-align: center; line-height: 30px; font-family: `Segoe UI`, Tahoma, Geneva, Verdana, sans-serif;" href="' . base_url() . 'forgotpassword/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Reset Password </a>'); // bisa di manpulasi memakai HTML
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->forgotModel->getDataUserbyEmail($email)->row_array();

        if ($user) {
            $user_token = $this->forgotModel->getDataUserToken($token)->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>Reset password gagal! </strong> Wrong token.</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
            <strong>Reset password gagal! </strong> Wrong email.</div>');
            redirect('login');
        }
    }

    public function changePassword()
    {
        //cek jika sessionnya tidak ada reset_email
        if (!$this->session->userdata('reset_email')) {
            redirect('login');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[4]|matches[password1]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password tidak boleh kosong.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';

            $this->load->view('templates/header-auth-login-template/header-auth-login', $data);
            $this->load->view('templates/loader-template/loader');
            $this->load->view('pages/changepassword-page/changepassword');
            $this->load->view('templates/footer-auth-login-template/footer-auth-login');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->forgotModel->updatePasswordUser($password, $email);

            //setelah reset,hapus dulu sessionnya
            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Password berhasil di ubah! </strong> Silahkan login.</div>');
            redirect('login');
        }
    }
}
