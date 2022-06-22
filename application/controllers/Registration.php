<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Registration';
        $this->load->view('templates/header-auth-registration-template/header-auth-registration', $data);
        $this->load->view('templates/loader-template/loader');
        $this->load->view('pages/registration-page/registration');
        $this->load->view('templates/footer-auth-registration-template/footer-auth-registration');
    }
}
