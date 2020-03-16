<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function registration()
    {
        $this->form_validation->set_rules('full_name', 'full name', 'trim|required', [
            'required'  => 'Please fill your %s'
        ]);
        $this->form_validation->set_rules('username', 'username', 'trim|required', [
            'required'  => 'Please fill your %s'
        ]);
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]', [
            'required'  => 'Please fill your %s',
            'is_unique' => 'This %s has been used'
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required', [
            'required'  => 'Please fill your %s'
        ]);
        $this->form_validation->set_rules('confirm_password', 'retype password', 'trim|required|matches[password]', [
            'required'  => 'Please fill your %s',
            'matches'   => 'Password does not match'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registration');
        } else {
            $data = [
                'full_name'         => htmlspecialchars($this->input->post('full_name'), TRUE),
                'email'             => htmlspecialchars($this->input->post('email'), TRUE),
                'username'          => htmlspecialchars($this->input->post('username'), TRUE),
                'password'          => password_hash(htmlspecialchars($this->input->post('password'), TRUE), PASSWORD_DEFAULT),
                'status_access'     => 'customer',
                'status_account'    => 0
            ];

            $this->db->insert('users', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center">
                Your account has been created. <br> Please check your email for activation.
            </div>');
            redirect('auth');
        }
    }
}
