<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partner extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        if(!$this->session->userdata('email'))
            redirect('auth');
    }

    public function index()
    {
        $header['title'] = "Home";
        $header['access'] = "Partner";

        $this->load->view('template/header', $header);
        $this->load->view('partner/dashboard');
        $this->load->view('template/footer');
    }

    public function profile() {
        $header['title'] = "Profile";
        $header['access'] = "Partner";

        $this->load->view('template/header', $header);
        $this->load->view('partner/profile');
        $this->load->view('template/footer');
    }

    public function change_password() {
        $this->db->set('password', password_hash($this->input->post('password'), PASSWORD_DEFAULT));
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('users');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Password has been updated.
        </div>');
        redirect('partner/profile');
    }
}