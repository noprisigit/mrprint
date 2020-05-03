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
                        ], REST_Controller::HTTP_BAD_REQUEST);
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
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function registration_post()
    {
        $full_name = $this->post('full_name');
        $username = $this->post('username');
        $email = $this->post('email');
        $password = $this->post('password');
        $confirm_password = $this->post('confirm_password');

        if ( $full_name === NULL || $username === NULL || $email === NULL || $password === NULL || $confirm_password === NULL) {
            $this->response([
                'status' => FALSE,
                'message' => 'field cannot be empty'
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {
            if ( $password != $confirm_password ) {
                $this->response([
                    'status' => FALSE,
                    'message' => 'password not same with confirm password'
                ], REST_Controller::HTTP_NOT_FOUND);
            } else {
                $data = [
                    'full_name'     => $full_name,
                    'username'      => $username,
                    'email'         => $email,
                    'password'      => password_hash($password, PASSWORD_DEFAULT),
                    'status_access'     => 'customer',
                    'status_account'    => 0
                ];

                if ( $this->auth->registrationCustomer($data) > 0 ) {
                    $this->response([
                        'status'    => TRUE,
                        'message'   => 'new account has been created',
                        'data'      =>  $data
                    ], REST_Controller::HTTP_CREATED);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'failed to create new account!'
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }
    }
}