<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function insertData($data)
    {
        $this->db->insert('user', $data);
    }

    public function insertDataToken($data)
    {
        $this->db->insert('user_token', $data);
    }

    public function deleteData($data)
    {
        $this->db->where('email', $data);
        $this->db->delete('user');
    }

    public function deleteDataToken($data)
    {
        $this->db->where('email', $data);
        $this->db->delete('user_token');
    }

    public function getDataUserbyEmail($data)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $data);

        $query = $this->db->get();
        return $query;
    }

    public function getDataUserToken($data)
    {
        $this->db->select('user_token.*');
        $this->db->from('user_token');
        $this->db->where('token', $data);

        $query = $this->db->get();
        return $query;
    }

    public function updateIsActiveUser($data)
    {
        $this->db->set('is_active', 1);
        $this->db->where('email', $data);
        $this->db->update('user');
    }
}
