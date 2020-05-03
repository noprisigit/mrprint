<?php

class Auth_model extends CI_Model
{
    public function getCustomerLogin($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('customers', 'customers.id_user = users.id_user');
        $this->db->where('users.email', $email);
        $this->db->where('users.status_access', 'customer');
        return $this->db->get()->result_array();
    }

    public function registrationCustomer($data)
    {
        $this->db->insert('users', $data);
        return $this->db->affected_rows();
    }
}