<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Question_model');
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
        $data['count'] = array(
            'users' => $this->Users_model->total(),
        );
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

    public function mental_health($method = null, $id = null)
    {
        if ($method == "add") {

            $this->form_validation->set_rules('question', 'Question', 'required');
            $this->form_validation->set_rules('category', 'Category', 'in_list[1,2,3]|required');
            if ($this->form_validation->run() != false) {
                $dataQuestion = array(
                    'question_name' => $this->input->post('question'),
                    'question_category' => $this->input->post('category'),
                );
                $this->Question_model->create($dataQuestion);
                $this->session->set_flashdata('message', alert_message('Question has been added', 'success'));
                redirect(base_url('admin/mental_health/add'));
            }

            $data['title'] = "Mental Health";
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/mental_health/add');
            $this->load->view('admin/layout/footer');
        } elseif ($method == "edit" && $this->Question_model->get($id)) {
            $data['question'] = $this->Question_model->get($id);
            $this->form_validation->set_rules('question', 'Question', 'required');
            $this->form_validation->set_rules('category', 'Category', 'in_list[1,2,3]|required');
            if ($this->form_validation->run() != false) {
                $dataQuestion = array(
                    'question_name' => $this->input->post('question'),
                    'question_category' => $this->input->post('category'),
                );
                $this->Question_model->update($id, $dataQuestion);
                $this->session->set_flashdata('message', alert_message('Question has been updated', 'success'));
                redirect(base_url('admin/mental_health/edit/' . $id));
            }

            $data['title'] = "Mental Health";
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/mental_health/edit');
            $this->load->view('admin/layout/footer');
        } elseif ($method == "delete" && $this->Question_model->get($id)) {
            $this->Question_model->delete($id);
            $this->session->set_flashdata('message', alert_message('Question has been deleted', 'success'));
            redirect(base_url('admin/mental_health/list'));
        } else {
            $data['title'] = "Mental Health";
            $data['questions'] = $this->Question_model->listing();
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/mental_health/list');
            $this->load->view('admin/layout/footer');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url('login'));
    }
}
