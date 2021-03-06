<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partner extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        if(!$this->session->userdata('email'))
            redirect('auth');
        
        $this->load->model('PartnerModel');
    }

    public function index()
    {
        $header['title'] = "Home";
        $header['access'] = "Partner";

        $content['status_toko'] = $this->db->get_where('partners', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $content['wait_payment'] = $this->PartnerModel->get_transaction_by_payment($content['status_toko']['id_partners']);
        $content['wait_printing'] = $this->PartnerModel->get_transaction_by_printing($content['status_toko']['id_partners']);
        $content['wait_pickup'] = $this->PartnerModel->get_transaction_by_pickup($content['status_toko']['id_partners']);
        // dd($content['status_toko']);
        $this->load->view('template/header', $header);
        $this->load->view('partner/dashboard', $content);
        $this->load->view('template/footer');
    }

    public function profile() {
        $header['title'] = "Profile";
        $header['access'] = "Partner";

        $content['provinsi'] = $this->db->get('list_provinsi')->result_array();
        $content['detail'] = $this->PartnerModel->get_detail_print_shop($this->session->userdata('id_user'));
        $content['kabupaten'] = $this->db->get_where('list_kabupaten', ['id_provinsi' => $content['detail']['provinsi']])->result_array();

        $this->load->view('template/header', $header);
        $this->load->view('partner/profile', $content);
        $this->load->view('template/footer');
    }

    public function transactions() {
        $header['title'] = "Transactions";
        $header['access'] = "Partner";

        $partner = $this->db->get_where('partners', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $content['transactions'] = $this->PartnerModel->get_all_transactions($partner['id_partners']);

        $this->load->view('template/header', $header);
        $this->load->view('partner/transaction', $content);
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

    public function update_print_shop() {
        // date_default_timezone_set('asia/jakarta');
        // dd($this->session->userdata('id_user'));
        $data = $this->db->get_where('partners', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $image = $_FILES['image']['name'];
        // dd($image);
        if ($image) {
            // dd('basdhad');
            $config['upload_path']          = './assets/dist/img/print_shop/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            
            $this->load->library('upload', $config);
            
            if($this->upload->do_upload('image')) {
                $old_image = $data['image'];
                // dd($old_image);
                if ($old_image != "default.jpg") {
                    unlink(FCPATH . "/assets/dist/img/print_shop/" . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        // } else {
        //     $new_image = $data['image'];
        // }
        $this->db->set('shop_name', $this->input->post('shop_name'));
        $this->db->set('price', $this->input->post('price'));
        $this->db->set('provinsi', $this->input->post('provinsi'));
        $this->db->set('kabupaten', $this->input->post('kabupaten'));
        $this->db->set('address', $this->input->post('address'));
        $this->db->set('link_g_map', $this->input->post('link_g_map'));
        $this->db->set('telphone', $this->input->post('telphone'));
        $this->db->set('description', $this->input->post('description'));
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('partners');
        
        $this->db->set('full_name', $this->input->post('full_name'));
        $this->db->set('email', $this->input->post('email'));
        $this->db->set('username', $this->input->post('username'));
        $this->db->set('date_created', date('Y-m-d H:i:sa'));
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('users');

        
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Data Print Shop Has Been Updated.
        </div>');
        redirect('partner/profile');
    }

    public function update_status_shop() {
        $this->db->set('status_shop', $this->input->post('apply'));
        $this->db->where('id_partners', $this->input->post('val'));
        $this->db->update('partners');
    }

    public function download_file() {
        $file = $this->input->get('file');
        $this->load->helper('download');
        force_download('./assets/dist/file/'.$file, NULL);
    }

    public function update_status_printing($invoice) {
        $this->db->set('status_printing', 1);
        $this->db->where('invoice', $invoice);
        $this->db->update('master_transactions');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center mt-3" role="alert">
            Printing selesai dilakukan.
        </div>');
        redirect('partner');
    }

    public function report_virus($invoice) {
        $transaction = $this->db->get_where('master_transactions', ['invoice' => $invoice ])->row_array();
        $this->db->insert('log_report', [
            'id_transaction'    => $transaction['id_transaction'],
            'keterangan'        => 'File corrupt atau mengandung virus'
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center mt-3" role="alert">
           Log report berhasil ditambahkan.
        </div>');
        redirect('partner');
    }

    public function report_page($invoice) {
        $transaction = $this->db->get_where('master_transactions', ['invoice' => $invoice ])->row_array();
        $this->db->insert('log_report', [
            'id_transaction'    => $transaction['id_transaction'],
            'keterangan'        => 'Jumlah halaman tidak sesuai'
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center mt-3" role="alert">
           Log report berhasil ditambahkan.
        </div>');
        redirect('partner');
    }

    
}