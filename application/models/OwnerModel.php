<?php

class OwnerModel extends CI_Model {
    public function get_all_print_shop() {
        $this->db->select('*');
        $this->db->from('partners');
        $this->db->join('users', 'partners.id_user = users.id_user');
        $this->db->join('list_provinsi', 'partners.provinsi = list_provinsi.id_provinsi');
        $this->db->join('list_kabupaten', 'partners.kabupaten = list_kabupaten.id_kabupaten');
        return $this->db->get()->result_array();
    }

    public function get_print_shop_by_id($id_partner) {
        $this->db->select('*');
        $this->db->from('partners');
        $this->db->join('users', 'partners.id_user = users.id_user');
        $this->db->join('list_provinsi', 'partners.provinsi = list_provinsi.id_provinsi');
        $this->db->join('list_kabupaten', 'partners.kabupaten = list_kabupaten.id_kabupaten');
        $this->db->where('partners.id_partners', $id_partner);
        return $this->db->get()->row_array();
    }
}