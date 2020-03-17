<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('CustomerModel');
    }

    public function index() {
        $header['title'] = "Home";
        $header['access'] = "Customer";

        // $content['status_toko'] = $this->db->get_where('partners', ['id_user' => $this->session->userdata('id_user')])->row_array();
        // dd($content['status_toko']);
        $content['provinsi'] = $this->db->get('list_provinsi')->result_array();
        $this->load->view('template/header', $header);
        $this->load->view('customer/dashboard', $content);
        $this->load->view('template/footer');
    }

    public function print_shop($id) {
        $header['title'] = "Printing";
        $header['access'] = "Customer";

        $content['print_shop'] = $this->CustomerModel->get_print_shop_by_id($id);

        $this->load->view('template/header', $header);
        $this->load->view('customer/printing', $content);
        $this->load->view('template/footer');
    }

    public function search_print_shop_by_location() {
        $this->db->select('*');
        $this->db->from('partners');
        $this->db->where('provinsi', $this->input->post('id_provinsi'));
        $this->db->where('kabupaten', $this->input->post('id_kabupaten'));
        $data = $this->db->get()->result_array();

        echo json_encode($data);
    }
}