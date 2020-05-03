<?php

class Customer_model extends CI_Model {
    public function getListProvinsi()
    {
        return $this->db->get('list_provinsi')->result_array();
    }

    public function getListKabupaten($id_provinsi = NULL)
    {
        if ( $id_provinsi === NULL ) {
            return $this->db->get('list_kabupaten')->result_array();
        } else {
            return $this->db->get_where('list_kabupaten', ['id_provinsi' => $id_provinsi])->result_array();
        }
    }

    public function getAllPrintShop($id_provinsi, $id_kabupaten)
    {
        $this->db->select('*');
        $this->db->from('partners');
        $this->db->join('list_provinsi', 'partners.provinsi = list_provinsi.id_provinsi');
        $this->db->join('list_kabupaten', 'partners.kabupaten = list_kabupaten.id_kabupaten');
        $this->db->where('provinsi', $id_provinsi);
        $this->db->where('kabupaten', $id_kabupaten);
        return $this->db->get()->result_array();
    }

    public function getDetailPrintShop($id) 
    {
        $this->db->select('*');
        $this->db->from('partners');
        $this->db->join('list_provinsi', 'partners.provinsi = list_provinsi.id_provinsi');
        $this->db->join('list_kabupaten', 'partners.kabupaten = list_kabupaten.id_kabupaten');
        $this->db->where('id_partners', $id);
        return $this->db->get()->result_array();
    }
}