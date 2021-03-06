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

    public function get_transaction_by_payment($id_partner) {
        $this->db->select('*');
        $this->db->from('master_transactions');
        $this->db->join('master_payment', 'master_payment.id_transaction = master_transactions.id_transaction');
        $this->db->join('customers', 'customers.id_customer = master_transactions.id_customer');
        $this->db->join('users', 'users.id_user = customers.id_user');
        $this->db->where('master_transactions.id_partners', $id_partner);
        $this->db->where('master_payment.status_pembayaran', 0);
        $this->db->or_where('master_payment.status_pembayaran', 1);
        return $this->db->get()->result_array();
    }

    public function get_transaction_by_printing($id_partner) {
        $this->db->select('*');
        $this->db->from('master_transactions');
        $this->db->join('master_payment', 'master_payment.id_transaction = master_transactions.id_transaction');
        $this->db->join('customers', 'customers.id_customer = master_transactions.id_customer');
        $this->db->join('users', 'users.id_user = customers.id_user');
        $this->db->where('master_transactions.id_partners', $id_partner);
        $this->db->where('master_payment.status_pembayaran', 2);
        $this->db->where('master_transactions.status_printing', 0);
        return $this->db->get()->result_array();
    }

    public function get_transaction_by_pickup($id_partner) {
        $this->db->select('*');
        $this->db->from('master_transactions');
        $this->db->join('master_payment', 'master_payment.id_transaction = master_transactions.id_transaction');
        $this->db->join('customers', 'customers.id_customer = master_transactions.id_customer');
        $this->db->join('users', 'users.id_user = customers.id_user');
        $this->db->where('master_transactions.id_partners', $id_partner);
        $this->db->where('master_payment.status_pembayaran', 2);
        $this->db->where('master_transactions.status_printing', 1);
        return $this->db->get()->result_array();
    }

    public function get_all_transactions($id_partner) {
        $this->db->select('*');
        $this->db->from('master_transactions');
        $this->db->join('master_payment', 'master_payment.id_transaction = master_transactions.id_transaction');
        $this->db->join('customers', 'customers.id_customer = master_transactions.id_customer');
        $this->db->join('users', 'users.id_user = customers.id_user');
        $this->db->where('master_transactions.id_partners', $id_partner);
        return $this->db->get()->result_array();
    }
}