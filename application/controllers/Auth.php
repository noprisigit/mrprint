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
        $this->form_validation->set_rules('email', 'email', 'trim|required', [
            'required'  => 'Please fill your %s',
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required', [
            'required'  => 'Please fill your %s'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $data = [
                'email'     => htmlspecialchars($this->input->post('email'), true),
                'password'  => htmlspecialchars($this->input->post('password'), true)
            ];

            $user = $this->db->get_where('users', ['email' => $data['email']])->row_array();

            if ($user) {
                if (password_verify($data['password'], $user['password'])) {
                    if ($user['status_account']) {
                        $session = [
                            'id_user'       => $user['id_user'],
                            'full_name'     => $user['full_name'],
                            'email'         => $user['email'],
                            'status_access' => $user['status_access']
                        ];

                        $this->session->set_userdata($session);

                        if ($user['status_access'] == 'owner') {
                            redirect('owner');
                        } elseif ($user['status_access'] == 'mitra') {
                            redirect('partner');
                        } else {
                            redirect('customer');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                            This email has not been activated.
                        </div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                        Password is wrong.
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    This email has not been registered.
                </div>');
                redirect('auth');
            }
        }
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

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                Your account has been created. <br> Please check your email for activation.
            </div>');
            redirect('auth');
        }
    }
}
