<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Customer extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/Customer_model', 'customer');
    }

    public function list_provinsi_get()
    {
        $list_provinsi = $this->customer->getListProvinsi();

        if ( $list_provinsi ) {
            $this->response([
                'status'    => TRUE,
                'message'   => 'List province successfully loaded',
                'data'      => $list_provinsi
            ], REST_Controller::HTTP_OK);
        }
    }

    public function list_kabupaten_get()
    {
        $id_provinsi = $this->get('id_provinsi');

        if ( $id_provinsi === NULL ) {
            $list_kabupaten = $this->customer->getListKabupaten();
        } else {
            $list_kabupaten = $this->customer->getListKabupaten($id_provinsi);
        }

        if ( $list_kabupaten ) {
            $this->response([
                'status'    => TRUE,
                'message'   => 'List kabupaten successfully loaded',
                'data'      => $list_kabupaten
            ], REST_Controller::HTTP_OK);
        }
    }

    public function list_print_shop_get()
    {
        $id_provinsi = $this->get('id_provinsi');
        $id_kabupaten = $this->get('id_kabupaten');

        $print_shop = $this->customer->getAllPrintShop($id_provinsi, $id_kabupaten);

        if ( $print_shop ) {
            $this->response([
                'status'    => TRUE,
                'message'   => 'List print shop successfully loaded',
                'data'      => $print_shop
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'    => FALSE,
                'message'   => 'print shop is not found',
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function print_shop_get()
    {
        $id_print_shop = $this->get('id');

        $print_shop = $this->customer->getDetailPrintShop($id_print_shop);

        if ( $print_shop ) {
            $this->response([
                'status'    => TRUE,
                'message'   => 'Detail print shop successfully loaded',
                'data'      => $print_shop
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'    => FALSE,
                'message'   => 'print shop is not found',
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function create_transaction_printing_post()
    {
        date_default_timezone_set('asia/jakarta');
        
        $invoice = date('YmdHis') . $this->post('id_customer') . $this->post('id_partners');
        $data = [
            'invoice'           => 'PRJ-'.$invoice,
            'nama_file'         => $this->post('nama_file'),
            'jumlah_halaman'    => $this->post('jumlah_halaman'),
            'tgl_pengambilan'   => $this->post('tgl_pengambilan'),
            'jam_pengambilan'   => $this->post('jam_pengambilan'),
            'komentar'          => $this->post('komentar'),
            'id_customer'       => $this->post('id_customer'),
            'id_partners'       => $this->post('id_partners'),
            'status_printing'   => 0,
            'type'              => 'printing',
            'date_created'      => date('Y-m-d H:i:sa')
        ];

        $this->db->insert('master_transactions', $data);
        
        $this->db->select('id_transaction');
        $this->db->from('master_transactions');
        $this->db->where('invoice', "PRJ-".$invoice);
        $transactions = $this->db->get()->row_array();
    
        $payment = [
            'id_transaction'    => $transactions['id_transaction'],
            'jumlah_bayar'      => $this->post('jumlah_bayar'),
            'status_pembayaran' => 0
        ];

        $this->db->insert('master_payment', $payment);

        $data['jumlah_bayar'] = $this->post('jumlah_bayar');
        
        array_push($data);

        $this->response([
            'status'    => TRUE,
            'message'   => 'new transaction printing has been created',
            'data'      =>  $data
        ], REST_Controller::HTTP_CREATED);
    }

    public function get_all_transactions_get()
    {
        $id_customer = $this->get('id_customer');

        $transactions = $this->customer->getAllTransactions($id_customer);

        if ( $transactions ) {
            $this->response([
                'status'    => TRUE,
                'message'   => 'List transactions successfully loaded',
                'data'      => $transactions
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'    => FALSE,
                'message'   => 'List transactions failed loaded',
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}