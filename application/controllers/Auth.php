<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Auth_model', 'authModel');
    }

    public function register_csr()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'required' => 'Username tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'Email tidak boleh kosong.'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [ //bener
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password tidak boleh kosong.',
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [ //bener
            'required' => 'Password tidak boleh kosong.',
            'matches' => 'Password tidak sama!',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';

            $this->load->view('templates/header-auth-registration-template/header-auth-registration', $data);
            $this->load->view('templates/loader-template/loader');
            $this->load->view('pages/registration-page/registration');
            $this->load->view('templates/footer-auth-registration-template/footer-auth-registration');
        } else {
            $name = htmlspecialchars($this->input->post('name'));
            $username = htmlspecialchars($this->input->post('username'));
            $email = htmlspecialchars($this->input->post('email'));
            $password = htmlspecialchars($this->input->post('password1'));
            $role_id = 3;
            $is_active = 0;
            $date_created = date('Y-m-d H:i:s');

            //enkripsi password
            $password_encrypt = password_hash($password, PASSWORD_DEFAULT);

            $data = [
                'nama'          => $name,
                'username'      => $username,
                'email'         => $email,
                'password'      => $password_encrypt,
                'role_id'       => $role_id,
                'is_active'     => $is_active,
                'date_created'  => $date_created,
            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email'         => $email,
                'token'         => $token,
                //expired token
                'date_created'  => time()
            ];

            $this->authModel->insertData($data);
            $this->authModel->insertDataToken($user_token);

            //Setelah data masuk,Kirim email activasi
            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Selamat akun anda sudah di buat!</strong> Silahkan cek email untuk mengaktivasi akunmu.</div>');
            redirect('login');
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

    public function verify()
    {
        //ambil email dari URL
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->authModel->getDataUserbyEmail($email)->row_array();

        if ($user) {
            $user_token = $this->authModel->getDataUserToken($token)->row_array();

            if ($user_token) {
                //di beri waktu 1 hari
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {

                    $this->authModel->updateIsActiveUser($email);

                    $this->authModel->deleteDataToken($email);

                    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">' . $email . ' berhasil di aktivasi! Silahkan login.</div>');
                    redirect('login');
                } else {

                    $this->authModel->deleteData($email);
                    $this->authModel->deleteDataToken($email);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    <strong>Token expired! </strong> Aktivasi akunmu gagal.</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>Salah token! </strong> Aktivasi akunmu gagal.</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
            <strong>Salah email! </strong> Aktivasi akunmu gagal.</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Anda sudah keluar! </strong> Silahkan login untuk melanjutkan kembali.</div>');
        redirect('login');
    }

    public function blocked()
    {
        $data['title'] = 'Halaman Tidak di Temukan';
        $this->load->view('pages/error-page/404-page', $data);
    }
}
