<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function getDataUserbyUsername($data)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('username', $data);

        $query = $this->db->get();
        return $query;
    }
}
