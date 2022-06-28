<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function insertData($data)
    {
        $this->db->insert('role', $data);
    }

    public function getDataUserbyNIK($data)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('username', $data);

        $query = $this->db->get();
        return $query;
    }

    public function getDataRole()
    {
        $this->db->select('role.*');
        $this->db->from('role');

        $query = $this->db->get();
        return $query;
    }
}
