<?php 

class PartnerModel extends CI_Model {
    public function get_detail_print_shop($id_user) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('partners', 'partners.id_user = users.id_user');
        $this->db->join('list_provinsi', 'partners.provinsi = list_provinsi.id_provinsi');
        $this->db->join('list_kabupaten', 'partners.kabupaten = list_kabupaten.id_kabupaten');
        $this->db->where('users.id_user', $id_user);
        return $this->db->get()->row_array();
    }
}