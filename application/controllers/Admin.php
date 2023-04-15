<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('question_model');
        $this->load->model('score_model');
        $this->load->model('message_model');
        $this->load->helper('alert_helper');

        $this->message_count = count($this->message_model->list_status(0));

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
            'users' => $this->users_model->total(),
        );
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/layout/footer');
    }

    public function users()
    {
        $data['title'] = "Users";
        $data['users'] = $this->users_model->listing();
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
                $this->question_model->create($dataQuestion);
                $this->session->set_flashdata('message', alert_message('Question has been added', 'success'));
                redirect(base_url('admin/mental_health/add'));
            }

            $data['title'] = "Mental Health";
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/mental_health/add');
            $this->load->view('admin/layout/footer');
        } elseif ($method == "edit" && $this->question_model->get($id)) {
            $data['question'] = $this->question_model->get($id);
            $this->form_validation->set_rules('question', 'Question', 'required');
            $this->form_validation->set_rules('category', 'Category', 'in_list[1,2,3]|required');
            if ($this->form_validation->run() != false) {
                $dataQuestion = array(
                    'question_name' => $this->input->post('question'),
                    'question_category' => $this->input->post('category'),
                );
                $this->question_model->update($id, $dataQuestion);
                $this->session->set_flashdata('message', alert_message('Question has been updated', 'success'));
                redirect(base_url('admin/mental_health/edit/' . $id));
            }

            $data['title'] = "Mental Health";
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/mental_health/edit');
            $this->load->view('admin/layout/footer');
        } elseif ($method == "delete" && $this->question_model->get($id)) {
            $this->question_model->delete($id);
            $this->session->set_flashdata('message', alert_message('Question has been deleted', 'success'));
            redirect(base_url('admin/mental_health/list'));
        } else if ($method == 'list') {
            $data['title'] = "Mental Health";
            $data['questions'] = $this->question_model->listing();
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/mental_health/list');
            $this->load->view('admin/layout/footer');
        } else if ($method == 'record') {
            $data['title'] = "Mental Health";
            $data['scores'] = $this->score_model->listing();
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

                    $this->message_model->reply($dataMessage);
                    $this->session->set_flashdata('message', alert_message('Message has been sent', 'success'));
                    redirect(base_url('admin/message/list'));
                }
            }
            $data['title'] = "Compose Message";
            $data['users'] = $this->users_model->listing();
            if ($this->message_model->detail($id)) {
                $data['message_user_id'] = $this->message_model->detail($id)->message_user_id;
            } else {
                $data['message_user_id'] = null;
            }
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/message/compose');
            $this->load->view('admin/layout/footer');
        } elseif ($method == "edit" && $this->message_model->get($id)) {
            $data['message'] = $this->message_model->get($id);
            $this->form_validation->set_rules('message', 'Message', 'required');
            if ($this->form_validation->run() != false) {
                $dataMessage = array(
                    'message' => $this->input->post('message'),
                );
                $this->message_model->update($id, $dataMessage);
                $this->session->set_flashdata('message', alert_message('Message has been updated', 'success'));
                redirect(base_url('admin/message/edit/' . $id));
            }

            $data['title'] = "Message";
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/message/edit');
            $this->load->view('admin/layout/footer');
        } elseif ($method == "delete" && $this->message_model->get($id)) {
            $this->message_model->delete($id);
            $this->session->set_flashdata('message', alert_message('Message has been deleted', 'success'));
            redirect(base_url('admin/message/list'));
        } else if ($method == 'list') {
            $data['title'] = "Message";
            $data['messages'] = $this->message_model->listing();
            $this->message_model->update_status();
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/message/list');
            $this->load->view('admin/layout/footer');
        } else if ($method == 'reply') {
            $data['title'] = "Message";
            $data['messages'] = $this->message_model->listing_received();
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/message/reply');
            $this->load->view('admin/layout/footer');
        } else {
            redirect(base_url('admin'));
        }
    }

	public function settings($type = null)
	{
		if ($type == "profile") {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$this->form_validation->set_rules('student_fullname', 'student fullname', 'required', array(
					'required' => 'Enter full name '
				));
				$this->form_validation->set_rules('student_email', 'email', 'required', array('required' => 'Enter student email'));

				if ($this->users_model->get_by_email($this->input->post('student_email')) && $this->input->post('student_email') != $this->user->user_email) {
					$this->session->set_flashdata('message', alert_message('Email Already Exist', 'danger'));
					redirect(base_url('admin/settings/profile'));
				}

				if ($this->form_validation->run() != false) {

					$dataUser = array(
						'user_name' => $this->input->post('student_fullname'),
						'user_email' => $this->input->post('student_email'),
						'user_phone_number' => $this->input->post('student_phone'),
					);
					$this->users_model->update($this->user->user_id, $dataUser);
					$this->session->set_flashdata('message', alert_message('Profile has been updated', 'success'));
					redirect(base_url('admin/settings/profile'));
				}
			}
			$data['title'] = "Settings";
            $data['user'] = $this->users_model->get_by_id($this->user->user_id);
			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/settings/profile');
			$this->load->view('admin/layout/footer');
		} else if ($type == "password") {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$this->form_validation->set_rules('current_password', 'old password', 'required', array('required' => 'Enter Old password'));
				$this->form_validation->set_rules('password', 'password', 'required', array('required' => 'Enter password'));
				$this->form_validation->set_rules('confirm_password', 'retype password', 'required|matches[password]', array('required' => 'Enter confirm password', 'matches' => 'password does not match'));

				if ($this->form_validation->run() != false) {

					if (!password_verify($this->input->post('current_password'), $this->user->user_password)) {
						$this->session->set_flashdata('message', alert_message('Old password does not match', 'danger'));
						redirect(base_url('admin/settings/password'));
					}

					$dataUser = array(
						'user_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					);
					$this->users_model->update($this->user->user_id, $dataUser);
					$this->session->set_flashdata('message', alert_message('Password has been updated', 'success'));
					redirect(base_url('admin/settings/password'));
				}
			}
			$data['title'] = "Settings";
			$this->load->view('admin/layout/header', $data);
			$this->load->view('web/settings/password');
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
