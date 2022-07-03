<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening_model extends CI_Model
{
    public function getDataRekening()
    {
        $this->db->select('data_rekening_nasabah.*');
        $this->db->from('data_rekening_nasabah');
        $this->db->order_by('date_created', 'DESC');

        $query = $this->db->get();
        return $query;
    }

    public function getDataCIF()
    {
        $this->db->select('data_cif_nasabah.*');
        $this->db->from('data_cif_nasabah');
        $this->db->order_by('date_created', 'DESC');

        $query = $this->db->get();
        return $query;
    }

    public function getDataCIFNasabah($id)
    {
        $this->db->select('data_cif_nasabah.*');
        $this->db->from('data_cif_nasabah');
        $this->db->where('id', $id);

        $query = $this->db->get();
        return $query;
    }

    public function insertDataRekening($data)
    {
        $this->db->insert('data_rekening_nasabah', $data);
    }

    public function deleteDataRekening($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_rekening_nasabah');
    }

    public function editStatusDataRekening($id, $status_rekening)
    {
        $this->db->where('id', $id);
        $this->db->set('status_rekening', $status_rekening);
        $this->db->update('data_rekening_nasabah');
    }
}
