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
        $this->load->library('form_validation');
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
        $this->form_validation->set_rules('owner_name', 'owner name', 'trim|required', [
            'required'  => 'Please fill your %s',
        ]);
        $this->form_validation->set_rules('username', 'username', 'trim|required', [
            'required'  => 'Please fill your %s',
        ]);
        $this->form_validation->set_rules('shop_name', 'print shop name', 'trim|required', [
            'required'  => 'Please fill your %s',
        ]);
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]', [
            'required'  => 'Please fill your %s',
        ]);
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required', [
            'required'  => 'Please fill your %s',
        ]);
        $this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required', [
            'required'  => 'Please fill your %s',
        ]);
        $this->form_validation->set_rules('address', 'address', 'trim|required', [
            'required'  => 'Please fill your %s',
        ]);
        $this->form_validation->set_rules('link_g_map', 'link g-map', 'trim|required', [
            'required'  => 'Please fill your %s',
        ]);
        $this->form_validation->set_rules('telphone', 'telphone', 'trim|required', [
            'required'  => 'Please fill your %s',
        ]);
        $this->form_validation->set_rules('price', 'price', 'trim|required', [
            'required'  => 'Please fill your %s',
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required', [
            'required'  => 'Please fill your %s',
        ]);
        $this->form_validation->set_rules('confirm_password', 'confirmation password', 'trim|required|matches[password]', [
            'required'  => 'Please fill your %s',
        ]);

        if ($this->form_validation->run() == false) {
            $header['title'] = "Print Shop";
            $header['access'] = "Owner";
    
            $content['provinsi'] = $this->db->get('list_provinsi')->result_array();
    
            $this->load->view('template/header', $header);
            $this->load->view('owner/add_print_shop', $content);
            $this->load->view('template/footer');
        } else {
            $user = [
                'full_name'         => htmlspecialchars($this->input->post('owner_name'), true),
                'email'             => htmlspecialchars($this->input->post('email'), true),
                'username'          => htmlspecialchars($this->input->post('username'), true),
                'password'          => password_hash(htmlspecialchars($this->input->post('password'), true), PASSWORD_DEFAULT),
                'status_access'     => 'partner',
                'status_account'    => 0
            ];

            $this->db->insert('users', $user);

            $this->db->select('id_user');
            $this->db->from('users');
            $this->db->where('email', $this->input->post('email'));
            $data = $this->db->get()->row_array();

            $partner = [
                'id_user'           => $data['id_user'],
                'shop_name'         => htmlspecialchars($this->input->post('shop_name'), true),
                'price'             => htmlspecialchars($this->input->post('price'), true),
                'provinsi'          => htmlspecialchars($this->input->post('provinsi'), true),
                'kabupaten'         => htmlspecialchars($this->input->post('kabupaten'), true),
                'address'           => htmlspecialchars($this->input->post('address'), true),
                'link_g_map'        => htmlspecialchars($this->input->post('link_g_map'), true),
                'telphone'           => htmlspecialchars($this->input->post('telphone'), true),
                'image'             => 'default.jpg',
                'status_shop'       => 0,
            ];
            $this->db->insert('partners', $partner);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                New Print Shop Has Been Added.
            </div>');
            redirect('owner/print-shop');
        }
    }

    public function edit_print_shop() {
        $id_partner = $this->uri->segment(3);
        $header['title'] = "Print Shop";
        $header['access'] = "Owner";

        $content['provinsi'] = $this->db->get('list_provinsi')->result_array();
        $content['detail'] = $this->OwnerModel->get_print_shop_by_id($id_partner);

        $this->load->view('template/header', $header);
        $this->load->view('owner/edit_print_shop', $content);
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

    public function get_kabupaten() {
        $data = $this->db->get_where('list_kabupaten', ['id_provinsi' => $this->input->post('id_provinsi')])->result_array();

        echo json_encode($data);
    }
}
