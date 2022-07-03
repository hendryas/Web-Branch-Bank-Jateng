<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menulevel2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Menu_model', 'menuModel');
    }

    public function index()
    {
        $data['title'] = 'Menu Management (Level 2) ';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['menuleveldua'] = $this->menuModel->getHasSubMenu()->result_array();
        $data['menu'] = $this->db->get('menu_level_1')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required', [
            'required' => 'Field title submenu level 2 tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required', [
            'required' => 'Field menu submenu level 2 tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('url', 'URL', 'required', [
            'required' => 'Field url submenu level 2 tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-main-page-template/header-main-page', $data);
            $this->load->view('templates/loader-template/loader');
            $this->load->view('pages/menu-page/menu-level-2');
            $this->load->view('templates/footer-main-page-template/footer-main-page');
        } else {
            $data = [
                'id_menu_level_1' => htmlspecialchars($this->input->post('menu_id')),
                'url' => htmlspecialchars($this->input->post('url')),
                'title' => htmlspecialchars($this->input->post('title')),
                'is_active' => htmlspecialchars($this->input->post('is_active')),
                'date_created' => date('Y-m-d H:i:s')
            ];

            $this->menuModel->insertDataMenuLevel2($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Menu Level 2 baru telah ditambahkan!</strong></div>');
            redirect('menulevel2');
        }
    }
}
