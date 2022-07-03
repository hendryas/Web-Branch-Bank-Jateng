<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Role_model', 'roleModel');
    }

    public function index()
    {
        $data['title'] = 'Role';

        $sessionUsername = $this->session->userdata('username');
        $data['user'] = $this->roleModel->getDataUserbyUsername($sessionUsername)->row_array();

        $data['role'] = $this->roleModel->getDataRole()->result_array();

        $this->form_validation->set_rules('nama_role', 'Nama Role', 'required|trim', [
            'required' => 'Field role tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-main-page-template/header-main-page', $data);
            $this->load->view('templates/loader-template/loader');
            $this->load->view('pages/role-page/role');
            $this->load->view('templates/footer-main-page-template/footer-main-page');
        } else {
            $data = [
                'nama_role' => htmlspecialchars($this->input->post('nama_role')),
                'date_created' => date('Y-m-d H:i:s')
            ];

            $this->roleModel->insertData($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Role baru telah ditambahkan!</strong></div>');
            redirect('role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $sessionUsername = $this->session->userdata('username');
        $data['user'] = $this->roleModel->getDataUserbyUsername($sessionUsername)->row_array();

        $role_id = decrypt_url($role_id);
        // var_dump($role_id);
        // die;

        $data['role'] = $this->db->get_where('role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('menu_level_1')->result_array();

        $this->load->view('templates/header-main-page-template/header-main-page', $data);
        $this->load->view('templates/loader-template/loader');
        $this->load->view('pages/role-page/view-role-access');
        $this->load->view('templates/footer-main-page-template/footer-main-page');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_idd = $this->input->post('roleId');
        $role_id = decrypt_url($role_idd);

        $data = [
            'role_id' => $role_id,
            'id_menu_level_1' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        //yang gak ada,menjadi ada 0 < 1
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
    }

    public function deleteRole($role_id)
    {
        $role_id = decrypt_url($role_id);
        $this->db->where('id', $role_id);
        $this->db->delete('role');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data role telah dihapus!</strong></div>');
        redirect('role');
    }

    public function editRole()
    {
        $id = $this->input->post('id');

        $data = [
            'nama_role' => htmlspecialchars($this->input->post('nama_role'))
        ];
        $this->db->where('id', $id);
        $this->db->update('role', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data role telah diubah!</strong></div>');
        redirect('role');
    }
}
