<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email'))
            redirect('auth');

        $this->load->model('OwnerModel');
    }

    public function index()
    {
        $header['title'] = "Home";
        $header['access'] = "Owner";

        $this->load->view('template/header', $header);
        $this->load->view('owner/dashboard');
        $this->load->view('template/footer');
    }

    public function users()
    {
        $header['title'] = "Users";
        $header['access'] = "Owner";

        $content['users'] = $this->db->get('users')->result_array();

        $this->load->view('template/header', $header);
        $this->load->view('owner/users', $content);
        $this->load->view('template/footer');
    }

    public function unblock_user($id) {
        $this->db->set('status_account', 1);
        $this->db->where('id_user', $id);
        $this->db->update('users');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Account has been unblocked.
        </div>');
        redirect('owner/users');
    }

    public function block_user($id) {
        $this->db->set('status_account', 0);
        $this->db->where('id_user', $id);
        $this->db->update('users');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Account has been blocked.
        </div>');
        redirect('owner/users');
    }

    public function delete_user($id) {
        $this->db->delete('users', ['id_user'=> $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Account has been deleted.
        </div>');
        redirect('owner/users');
    }

    public function print_shop()
    {
        $header['title'] = "Print Shop";
        $header['access'] = "Owner";

        $content['print_shop'] = $this->OwnerModel->get_all_print_shop();

        $this->load->view('template/header', $header);
        $this->load->view('owner/print_shop', $content);
        $this->load->view('template/footer');
    }

    public function add_print_shop() {
        $header['title'] = "Print Shop";
        $header['access'] = "Owner";

        $this->load->view('template/header', $header);
        $this->load->view('owner/add_print_shop');
        $this->load->view('template/footer');
    }

    public function verify_transaction()
    {
        $header['title'] = "Verify Transaction";
        $header['access'] = "Owner";

        $this->load->view('template/header', $header);
        $this->load->view('owner/dashboard');
        $this->load->view('template/footer');
    }

    public function transactions()
    {
        $header['title'] = "Transactions";
        $header['access'] = "Owner";

        $this->load->view('template/header', $header);
        $this->load->view('owner/dashboard');
        $this->load->view('template/footer');
    }
}
