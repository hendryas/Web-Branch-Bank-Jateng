<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cif_model extends CI_Model
{
    public function insertData($data)
    {
        $this->db->insert('data_cif_nasabah', $data);
    }

    public function getDataCIF()
    {
        $this->db->select('data_cif_nasabah.*');
        $this->db->from('data_cif_nasabah');
        $this->db->order_by('date_created', 'DESC');

        $query = $this->db->get();
        return $query;
    }

    public function editDataCIF($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('data_cif_nasabah', $data);
    }

    public function deleteDataCIF($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_cif_nasabah');
    }
}
