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
}