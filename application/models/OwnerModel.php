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

    public function get_all_transaction_by_payment() {
        $this->db->select('*');
        $this->db->from('master_transactions');
        $this->db->join('master_payment', 'master_payment.id_transaction = master_transactions.id_transaction');
        $this->db->join('customers', 'customers.id_customer = master_transactions.id_customer');
        $this->db->join('users', 'users.id_user = customers.id_user');
        $this->db->join('partners', 'partners.id_partners = master_transactions.id_partners');
        $this->db->where('master_payment.status_pembayaran', 0);
        $this->db->or_where('master_payment.status_pembayaran', 1);
        $this->db->where('master_transactions.type', 'printing');
        return $this->db->get()->result_array();
    }

    public function get_all_transactions() {
        $this->db->select('*');
        $this->db->from('master_transactions');
        $this->db->join('master_payment', 'master_payment.id_transaction = master_transactions.id_transaction');
        $this->db->join('customers', 'customers.id_customer = master_transactions.id_customer');
        $this->db->join('users', 'users.id_user = customers.id_user');
        // $this->db->join('partners', 'master_transactions.id_partners = partners.id_partners');

        return $this->db->get()->result_array();
    }

    public function get_wallet_transaction() {
        $this->db->select('*');
        $this->db->from('master_transactions');
        $this->db->join('master_payment', 'master_payment.id_transaction = master_transactions.id_transaction');
        $this->db->join('customers', 'customers.id_customer = master_transactions.id_customer');
        $this->db->join('users', 'users.id_user = customers.id_user');
        $this->db->where('master_payment.status_pembayaran', 0);
        $this->db->where('master_transactions.type', 'top-up');
        return $this->db->get()->result_array();
    }
}