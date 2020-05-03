<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Auth extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/Auth_model', 'auth');
    }

    public function login_post()
    {
        $email = $this->post('email');
        $password = $this->post('password');

        if ( $email === null || $password === null) {
            $this->response([
                'status' => FALSE,
                'message' => 'email or password is empty'
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {
            $user = $this->auth->getCustomerLogin($email);

            if ( $user ) {
                if ( password_verify($password, $user[0]['password']) ) {
                    if ( $user[0]['status_account'] == 1 ) {
                        $this->response([
                            'status'    => TRUE,
                            'data'      => $user,
                            'message'   => 'email founded.'
                        ], REST_Controller::HTTP_OK);
                    } else {
                        $this->response([
                            'status' => FALSE,
                            'message' => 'this email has not been verified.'
                        ], REST_Controller::HTTP_NOT_FOUND);
                    }
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'please fill a valid password.'
                    ], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'email not found.'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
}