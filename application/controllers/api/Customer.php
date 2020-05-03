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
}