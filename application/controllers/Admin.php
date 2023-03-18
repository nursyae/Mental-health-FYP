<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->helper('Alert_helper');

        if (!$this->session->userdata('session_user')) {
            die('Need login first');
        } else {
            $this->user = $this->session->userdata('session_user');
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/layout/footer');
    }

    public function users()
    {
        $data['title'] = "Users";
        $data['users'] = $this->Users_model->listing();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/users/list');
        $this->load->view('admin/layout/footer');
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url('login'));
    }
}
