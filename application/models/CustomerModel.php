<?php

class CustomerModel extends CI_Model {
    public function get_print_shop_by_id($id) {
        $this->db->select('*');
        $this->db->from('partners');
        $this->db->join('users', 'partners.id_user = users.id_user');
        $this->db->join('list_provinsi', 'partners.provinsi = list_provinsi.id_provinsi');
        $this->db->join('list_kabupaten', 'partners.kabupaten = list_kabupaten.id_kabupaten');
        $this->db->where('partners.id_partners', $id);
        return $this->db->get()->row_array();
    }

    public function get_transaction_customer_partner($id_customer, $id_partner) {
        $this->db->select('*');
        $this->db->from('master_transactions');
        $this->db->join('master_payment', 'master_payment.id_transaction = master_transactions.id_transaction');
        $this->db->where('master_transactions.id_customer', $id_customer);
        $this->db->where('master_transactions.id_partners', $id_partner);
        return $this->db->get()->result_array();
    }

    public function get_all_transactions($id_customer) {
        $this->db->select('*');
        $this->db->from('master_transactions');
        $this->db->join('master_payment', 'master_payment.id_transaction = master_transactions.id_transaction');
        $this->db->where('master_transactions.id_customer', $id_customer);
        return $this->db->get()->result_array();
    }
}