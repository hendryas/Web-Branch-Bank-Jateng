<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Sign In';

		$this->load->view('templates/header-auth-login-template/header-auth-login', $data);
		$this->load->view('templates/loader-template/loader');
		$this->load->view('pages/login-page/login');
		$this->load->view('templates/footer-auth-login-template/footer-auth-login');
	}
}
