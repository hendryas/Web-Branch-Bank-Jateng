<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_model extends CI_Model
{
    public function getDataAkun()
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('role_id', 3);
        $this->db->order_by('date_created', 'DESC');

        $query = $this->db->get();
        return $query;
    }

    public function deleteDataAkun($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function insertDataAkun($data)
    {
        $this->db->insert('user', $data);
    }

    public function editDataAkun($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
}
