<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index() {
        $header['title'] = "Home";
        $header['access'] = "Customer";

        // $content['status_toko'] = $this->db->get_where('partners', ['id_user' => $this->session->userdata('id_user')])->row_array();
        // dd($content['status_toko']);
        $this->load->view('template/header', $header);
        $this->load->view('customer/dashboard');
        $this->load->view('template/footer');
    }
}