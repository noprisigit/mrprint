<?php

class OwnerModel extends CI_Model {
    public function get_all_print_shop() {
        $this->db->select('*');
        $this->db->from('partners');
        $this->db->join('users', 'partners.id_user = users.id_user');
        return $this->db->get()->result_array();
    }
}