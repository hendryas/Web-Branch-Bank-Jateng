<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('login');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1); //controller mana yang mau di ambil/url mana
        // var_dump($menu);
        // die;

        //cocokkan dengan tabel user menu dengan user access menu
        $queryMenu = $ci->db->get_where('menu_level_1', ['url' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        // var_dump($queryMenu);
        // die;

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'id_menu_level_1' => $menu_id
        ]);

        //admin kenapa ke block?
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
