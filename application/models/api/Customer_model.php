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
}