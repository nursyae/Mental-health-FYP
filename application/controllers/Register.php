<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
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
            $this->form_validation->set_rules('student_fullname', 'student fullname', 'required', array(
                'required' => 'Enter full name '
            ));
            $this->form_validation->set_rules('student_id', 'student id', 'required|is_unique[users.user_matrix_number]', array('required' => 'Enter student id', 'is_unique' => 'sTUDENT id ALREADY EXIST'));
            $this->form_validation->set_rules('student_programme', 'programme', 'required', array('required' => 'Enter student programme'));
            $this->form_validation->set_rules('student_email', 'email', 'required|is_unique[users.user_email]', array('required' => 'Enter student email', 'is_unique' => 'Email Already Exist'));
            $this->form_validation->set_rules('password', 'password', 'required', array('required' => 'Enter password'));
            $this->form_validation->set_rules('confirm_password', 'retype password', 'required|matches[password]', array('required' => 'Enter confirm password', 'matches' => 'password does not match'));
            $this->form_validation->set_rules('student_phone', 'phone number', 'required', array('required' => 'Enter phone number'));


            if ($this->form_validation->run() != false) {

                $dataUser = array(
                    'user_name' => $this->input->post('student_fullname'),
                    'user_email' => $this->input->post('student_email'),
                    'user_matrix_number' => $this->input->post('student_id'),
                    'user_phone_number' => $this->input->post('student_phone'),
                    'user_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'user_programme' => $this->input->post('student_programme')
                );
                $this->Users_model->create($dataUser);
                $this->session->set_flashdata('message', alert_message('Success Register', 'success'));
                redirect(base_url('login'));
            }
        }
        $this->load->view('register/index');
    }
}
