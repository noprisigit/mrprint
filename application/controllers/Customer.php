<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('CustomerModel');
        $this->load->library('form_validation');
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

    public function transactions() {
        $header['title'] = "Transactions";
        $header['access'] = "Customer";

        $customer = $this->db->get_where('customers', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $content['transactions'] = $this->CustomerModel->get_all_transactions($customer['id_customer']);
        // dd($content['transactions']);
        $content['wallet'] = $customer['wallet'];

        $this->load->view('template/header', $header);
        $this->load->view('customer/transaction', $content);
        $this->load->view('template/footer');
    }

    public function print_shop() {
        $id = $this->uri->segment(3);
        $header['title'] = "Printing";
        $header['access'] = "Customer";

        $customer = $this->db->get_where('customers', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $content['print_shop'] = $this->CustomerModel->get_print_shop_by_id($id);
        // dd($content['print_shop']);
        $content['transactions'] = $this->CustomerModel->get_transaction_customer_partner($customer['id_customer'], $content['print_shop']['id_partners']);
        // dd($content['transactions']);
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

    public function add_transaction_printing() {
        date_default_timezone_set('asia/jakarta');
        $customer = $this->db->get_where('customers', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $partner = $this->db->get_where('partners', ['id_partners' => $this->input->post('id_partners')])->row_array();
        $invoice = date('YmdHis') . $customer['id_customer'] . $partner['id_partners'];
        $jumlah_bayar = $this->input->post('jmlh_halaman') * $partner['price'];

        $file = $_FILES['file']['name'];

        if ($file) {
            $config['upload_path']          = './assets/dist/file/';
            $config['allowed_types']        = 'docx|doc|pdf';
            $config['max_size']             = 2048;
            $config['file_name']            = $invoice;
            
            $this->load->library('upload', $config);
            
            if($this->upload->do_upload('file')) {
                $nama_file = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

        $transaction = [
            'invoice'           => "PRJ-".$invoice,
            'nama_file'         => $nama_file,
            'jumlah_halaman'    => $this->input->post('jmlh_halaman'),
            'tgl_pengambilan'   => $this->input->post('tgl_pengambilan'),
            'jam_pengambilan'   => $this->input->post('jam_pengambilan'),
            'komentar'          => $this->input->post('keterangan'),
            'id_customer'       => $customer['id_customer'],
            'id_partners'       => $partner['id_partners'],
            'status_printing'   => 0,
            'date_created'      => date('Y-m-d H:i:sa')
        ];

        $this->db->insert('master_transactions', $transaction);

        $this->db->select('id_transaction');
        $this->db->from('master_transactions');
        $this->db->where('invoice', "PRJ-".$invoice);
        $data = $this->db->get()->row_array();

        $payment = [
            'id_transaction'    => $data['id_transaction'],
            'jumlah_bayar'      => $jumlah_bayar,
            'status_pembayaran' => 0
        ];
        $this->db->insert('master_payment', $payment);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Transaksi printing berhasil ditambahkan.
        </div>');
        redirect('customer/print-shop/'.$this->input->post('id_partners'));
    }

    public function cancel_transaction($invoice) {
        $data = $this->db->get_where('master_transactions', ['invoice' => $invoice])->row_array();
        $this->db->delete('master_transactions', ['invoice' => $invoice]);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Transaksi printing berhasil dibatalkan.
        </div>');
        redirect('customer/print-shop/'.$data['id_partners']);
    }

    public function upload_bukti_bayar() {
        $bukti_bayar = $_FILES['bukti_bayar']['name'];
        $transaction = $this->db->get_where('master_transactions', ['invoice' => $this->input->post('invoice_number')])->row_array();

        if ($bukti_bayar) {
            $config['upload_path']          = './assets/dist/img/bukti_bayar/';
            $config['allowed_types']        = 'png|jpg|jpeg';
            $config['max_size']             = 2048;
            $config['file_name']            = $this->input->post('invoice_number');
            
            $this->load->library('upload', $config);
            
            if($this->upload->do_upload('bukti_bayar')) {
                $nama_file = $this->upload->data('file_name');
                $this->db->set('bukti_bayar', $nama_file);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('status_pembayaran', 1);
        $this->db->where('id_transaction', $this->input->post('id_transaction'));
        $this->db->update('master_payment');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Bukti bayar berhasil diupload.
        </div>');
        redirect('customer/print-shop/'.$transaction['id_partners']);
    }

    public function isi_dompet() {
        date_default_timezone_set('Asia/Jakarta');
        $customer = $this->db->get_where('customers', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $invoice = date('YmdHis') . $customer['id_customer'];
        $wallet = [
            'id_customer'   => $customer['id_customer'],
            'invoice'       => "TOP-".$invoice,
            'type'          => "top-up",
            'date_created'  => date('Y-m-d H:i:s')
        ];
        $this->db->insert('master_transactions', $wallet);

        $data = $this->db->get_where('master_transactions', ['invoice' => "TOP-".$invoice])->row_array();

        $payment = [
            'id_transaction'        => $data['id_transaction'],
            'jumlah_bayar'          => $this->input->post('wallet'),
            'status_pembayaran'     => 0  
        ];

        $this->db->insert('master_payment', $payment);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Permintaan pengisian dompet berhasil dilakukan.
        </div>');
        redirect('customer/transactions');

    }
}