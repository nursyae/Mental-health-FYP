<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Question_model');
        $this->load->model('Score_model');
        $this->load->model('Message_model');
        $this->load->helper('Alert_helper');

        $this->message_count = count($this->Message_model->list_status(0));

        if (!$this->session->userdata('session_admin')) {
            $this->session->set_flashdata('message', alert_message('Please login first', 'danger'));
            redirect(base_url('login'));
        } else {
            $this->user = $this->session->userdata('session_admin');
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
        } else if ($method == 'list') {
            $data['title'] = "Mental Health";
            $data['questions'] = $this->Question_model->listing();
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/mental_health/list');
            $this->load->view('admin/layout/footer');
        } else if ($method == 'record') {
            $data['title'] = "Mental Health";
            $data['scores'] = $this->Score_model->listing();
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/mental_health/record');
            $this->load->view('admin/layout/footer');
        } else {
            redirect(base_url('admin'));
        }
    }

    public function message($method = null, $id = null)
    {
        if ($method == "add") {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $this->form_validation->set_rules('to', 'To', 'required');
                $this->form_validation->set_rules('subject', 'Subject', 'required');
                $this->form_validation->set_rules('content', 'Content', 'required');
                if ($this->form_validation->run() != false) {

                    $dataMessage = array(
                        'message_user_id' => $this->input->post('to'),
                        'message_subject' => htmlentities($this->input->post('subject')),
                        'message_content' => htmlentities($this->input->post('content'))
                    );

                    // check if have file
                    if (!empty($_FILES['attachment']['name'])) {
                        $config['upload_path'] = './assets/uploads/attachment/';
                        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
                        $config['max_size'] = 2048;
                        $config['encrypt_name'] = true;
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('attachment')) {
                            $this->session->set_flashdata('message', alert_message($this->upload->display_errors(), 'danger'));
                            redirect(base_url('web/message/compose'));
                        } else {
                            $file = $this->upload->data();
                            $dataMessage['message_attachment'] = $file['file_name'];
                        }
                    }

                    $this->Message_model->reply($dataMessage);
                    $this->session->set_flashdata('message', alert_message('Message has been sent', 'success'));
                    redirect(base_url('admin/message/list'));
                }
            }
            $data['title'] = "Compose Message";
            $data['users'] = $this->Users_model->listing();
            if ($this->Message_model->detail($id)) {
                $data['message_user_id'] = $this->Message_model->detail($id)->message_user_id;
            } else {
                $data['message_user_id'] = null;
            }
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/message/compose');
            $this->load->view('admin/layout/footer');
        } elseif ($method == "edit" && $this->Message_model->get($id)) {
            $data['message'] = $this->Message_model->get($id);
            $this->form_validation->set_rules('message', 'Message', 'required');
            if ($this->form_validation->run() != false) {
                $dataMessage = array(
                    'message' => $this->input->post('message'),
                );
                $this->Message_model->update($id, $dataMessage);
                $this->session->set_flashdata('message', alert_message('Message has been updated', 'success'));
                redirect(base_url('admin/message/edit/' . $id));
            }

            $data['title'] = "Message";
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/message/edit');
            $this->load->view('admin/layout/footer');
        } elseif ($method == "delete" && $this->Message_model->get($id)) {
            $this->Message_model->delete($id);
            $this->session->set_flashdata('message', alert_message('Message has been deleted', 'success'));
            redirect(base_url('admin/message/list'));
        } else if ($method == 'list') {
            $data['title'] = "Message";
            $data['messages'] = $this->Message_model->listing();
            $this->Message_model->update_status();
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/message/list');
            $this->load->view('admin/layout/footer');
        } else if ($method == 'reply') {
            $data['title'] = "Message";
            $data['messages'] = $this->Message_model->listing_received();
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/message/reply');
            $this->load->view('admin/layout/footer');
        } else {
            redirect(base_url('admin'));
        }
    }



    public function logout()
    {
        session_destroy();
        redirect(base_url('login'));
    }
}
