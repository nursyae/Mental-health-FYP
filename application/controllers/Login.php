<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->helper('Alert_helper');
    }

    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');

            if ($this->form_validation->run() != false) {
                $user = $this->Users_model->get_by_email($this->input->post('email'));
                if ($user) {
                    if (password_verify($this->input->post('password'), $user->user_password)) {

                        $this->session->set_userdata('session_user', $user);
                        redirect(base_url());
                    } else {
                        $this->session->set_flashdata('message', alert_message('Wrong password', 'danger'));
                        redirect(base_url('login'));
                    }
                } else {
                    echo "tiada dalam db";
                }
            }
        }
        $this->load->view('login/index');
    }
}
