<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgotpassword_model extends CI_Model
{
    public function insertDataToken($data)
    {
        $this->db->insert('user_token', $data);
    }

    public function getDataUserbyEmailActive($data)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $data);
        $this->db->where('is_active', 1);

        $query = $this->db->get();
        return $query;
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

    public function updatePasswordUser($password, $email)
    {
        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('user');
    }
}
