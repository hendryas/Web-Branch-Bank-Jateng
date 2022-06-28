<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        // is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Menu_model', 'menuModel');
    }

    public function index()
    {
        $data['title'] = 'Menu Management (Level 1) | Admin | SatriaShop';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('menu_level_1')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required', [
            'required' => 'Field URL menu tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('menu_nama', 'Nama Menu', 'required', [
            'required' => 'Field nama menu tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-main-page-template/header-main-page', $data);
            $this->load->view('templates/loader-template/loader');
            $this->load->view('pages/menu-page/menu-level-1');
            $this->load->view('templates/footer-main-page-template/footer-main-page');
        } else {
            $url_menu = htmlspecialchars($this->input->post('menu'));
            $nama_menu = htmlspecialchars($this->input->post('menu_nama'));
            $icon = htmlspecialchars($this->input->post('icon'));
            $data = [
                'url'           => $url_menu,
                'title'         => $nama_menu,
                'icon'          => $icon,
                'date_created'  => date('Y-m-d H:i:s')
            ];

            $this->menuModel->insertDataMenuLevel1($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Menu baru telah ditambahkan!</strong></div>');
            redirect('menu');
        }
    }

    public function deleteMenu($menu_id)
    {
        $new_menu_id = decrypt_url($menu_id);
        $this->menuModel->deleteDataMenu($new_menu_id);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data menu telah dihapus!</strong></div>');
        redirect('menu');
    }

    public function editMenu()
    {
        $menu_id = $this->input->post('id');
        $new_id = decrypt_url($menu_id);

        $url_menu = htmlspecialchars($this->input->post('menu_edit'));
        $nama_menu = htmlspecialchars($this->input->post('menu_nama_edit'));
        $icon = htmlspecialchars($this->input->post('icon'));
        $data = [
            'url' => $url_menu,
            'title' => $nama_menu,
            'icon' => $icon,
            'date_created' => date('Y-m-d H:i:s')
        ];

        $this->menuModel->updateDataMenuLevel1($new_id, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data menu telah diubah!</strong></div>');
        redirect('menu');
    }

    public function menuLevel2()
    {
        $data['title'] = 'Menu Management (Level 2) | Admin | SatriaShop';
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
            redirect('menu/menulevel2');
        }
    }

    public function editMenuLevel2()
    {
        $id = $this->input->post('id');
        $id_menu_level_1 = $this->input->post('id_menu_level_1');

        $data = [
            'id_menu_level_1' => $id_menu_level_1,
            'url' => htmlspecialchars($this->input->post('url')),
            'title' => htmlspecialchars($this->input->post('title')),
            'is_active' => htmlspecialchars($this->input->post('is_active')),
            'date_created' => date('Y-m-d H:i:s')
        ];

        $this->menuModel->updateDataMenuLevel2($id, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data Menu level 2 telah diubah!</strong></div>');
        redirect('menu/menulevel2');
    }

    public function deletemenuleveldua($id_menu_level_2)
    {
        $this->menuModel->deleteDataMenuLevelDua($id_menu_level_2);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data Menu level 2 telah dihapus!</strong></div>');
        redirect('menu/menulevel2');
    }
}
