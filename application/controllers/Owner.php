<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email'))
            redirect('auth');
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

        $this->load->view('template/header', $header);
        $this->load->view('owner/dashboard');
        $this->load->view('template/footer');
    }

    public function print_shop()
    {
        $header['title'] = "Print Shop";
        $header['access'] = "Owner";

        $this->load->view('template/header', $header);
        $this->load->view('owner/dashboard');
        $this->load->view('template/footer');
    }

    public function transactions()
    {
        $header['title'] = "Print Shop";
        $header['access'] = "Owner";

        $this->load->view('template/header', $header);
        $this->load->view('owner/dashboard');
        $this->load->view('template/footer');
    }
}
