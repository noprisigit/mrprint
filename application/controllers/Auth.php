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
                        } elseif ($user['status_access'] == 'partner') {
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

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email'     => $this->input->post('email'),
                'token'     => $token
            ];

            $this->db->insert('users', $data);
            $this->db->insert('users_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $user = $this->db->get_where('users', ['email' => $this->input->post('email')])->row_array();

            $this->db->insert('customers', ['id_user' => $user['id_user']]);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                Your account has been created. <br> Please check your email for activation.
            </div>');
            redirect('auth');
        }
    }

    private function _sendEmail ($token, $type) {
        $config= [
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.googlemail.com',
            'smtp_user'     => 'neatinw@gmail.com',
            'smtp_pass'     => '19111998',
            'smtp_port'     => 465,
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'newline'       => "\r\n"
        ];

        $this->load->library('email', $config);

        $this->email->from('neatinw@gmail.com', 'mr.perint');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } elseif ($type == 'forgot') {
            $this->email->subject('Forgot Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/reset-password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify() {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('users_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->db->set('status_account', 1);
                $this->db->where('email', $email);
                $this->db->update('users');

                $this->db->delete('users_token', ['email' => $email]);

                $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                    '. $email .' <br> has been activated.
                </div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    Account activation failed!. Token invalid
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                Account activation failed!. Wrong email
            </div>');
            redirect('auth');
        }
    }

    public function forgot_password() {
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/forgot_password');
        } else {
            $email = $this->input->post('email');

            $user = $this->db->get_where('users', ['email' => $email, 'status_account' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));

                $user_token = [
                    'email' => $email,
                    'token' => $token
                ];

                $this->db->insert('users_token', $user_token);

                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                    Please check your email to reset your password.
                </div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    Email is not registered or activated.
                </div>');
                redirect('auth/forgot-password');
            }
        }
    }

    public function reset_password() {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('users_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    Reset password failed!. Wrong token
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                Reset password failed!. Wrong email
            </div>');
            redirect('auth');
        }
    }

    public function changePassword() {

        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password', 'password', 'trim|required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'confirmation password', 'trim|required|matches[password]');
        
        if($this->form_validation->run() == false) {
            $this->load->view('auth/change_password');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                Password has been changed
            </div>');
            redirect('auth');
        }
    }

    public function logout() {
        $data = [
            'id_user',
            'full_name',
            'email',
            'status_access'
        ];
        $this->session->unset_userdata($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            You have been logout.
        </div>');
        redirect('auth');
    }

    public function blocked() {
        $this->load->view('auth/404');
    }
}
