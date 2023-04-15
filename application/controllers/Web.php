<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('question_model');
		$this->load->model('score_model');
		$this->load->model('message_model');
		$this->load->helper('alert_helper');

		if (!$this->session->userdata('session_user')) {
			$this->session->set_flashdata('message', alert_message('Please login first', 'danger'));
			redirect('login');
		} else {
			$this->user = $this->session->userdata('session_user');
			$this->message_count = count($this->message_model->list_seen_by_user_id(0, $this->user->user_id));
		}
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$skore = $this->score_model->get_skore_latest($this->user->user_id);
		if ($skore) {
			$data['score'] = array(
				'depression' => $skore->score_depression,
				'anxiety' => $skore->score_anxiety,
				'stress' => $skore->score_stress,
			);
		} else {
			$data['score'] = array(
				'depression' => 0,
				'anxiety' => 0,
				'stress' => 0,
			);
		}
		$data['scores'] = $this->score_model->listing($this->user->user_id);
		$this->load->view('web/layout/header', $data);
		$this->load->view('web/dashboard');
		$this->load->view('web/layout/footer');
	}

	public function mental_health_test()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$depression = 0;
			$anxiety = 0;
			$stress = 0;

			foreach ($this->input->post('question') as $key => $value) {
				foreach ($value as $key2 => $value2) {
					if ($key2 == 1) {
						$depression += $value2;
					} elseif ($key2 == 2) {
						$anxiety += $value2;
					} elseif ($key2 == 3) {
						$stress += $value2;
					}
				}
			}
			$dataSkore = array(
				'score_user_id' => $this->user->user_id,
				'score_depression' => $depression,
				'score_anxiety' => $anxiety,
				'score_stress' => $stress,
			);
			$this->score_model->create($dataSkore);
			$this->session->set_flashdata('message', alert_message('Skor has been added', 'success'));
			redirect(base_url('web/result'));
		} else {
			$data['title'] = "Mental Health Test";
			$data['questions'] = $this->question_model->listing();
			$this->load->view('web/layout/header', $data);
			$this->load->view('web/question/add');
			$this->load->view('web/layout/footer');
		}
	}

	public function result()
	{
		$data['title'] = "Result";

		$skore = $this->score_model->get_skore_latest($this->user->user_id);
		$data['score'] = array(
			'depression' => $skore->score_depression,
			'anxiety' => $skore->score_anxiety,
			'stress' => $skore->score_stress,
		);

		$this->load->view('web/layout/header', $data);
		$this->load->view('web/question/result');
		$this->load->view('web/layout/footer');
	}

	public function message($method = null, $id = null)
	{
		if ($method == 'compose') {
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$this->form_validation->set_rules('subject', 'Subject', 'required');
				$this->form_validation->set_rules('content', 'Content', 'required');
				if ($this->form_validation->run() != false) {

					$dataMessage = array(
						'message_user_id' => $this->user->user_id,
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
					$this->message_model->create($dataMessage);
					$this->session->set_flashdata('message', alert_message('Message has been sent', 'success'));
					redirect(base_url('web/message/compose'));
				}
			}
			$data['title'] = "Compose Message";
			$this->load->view('web/layout/header', $data);
			$this->load->view('web/message/compose');
			$this->load->view('web/layout/footer');
		} elseif ($method == 'inbox') {
			$data['title'] = "Inbox";
			$data['messages'] = $this->message_model->listing_received($this->user->user_id);
			$this->message_model->update_seen_by_user_id($this->user->user_id);
			$this->load->view('web/layout/header', $data);
			$this->load->view('web/message/inbox');
			$this->load->view('web/layout/footer');
		} elseif ($method == 'sent') {
			$data['title'] = "Sent";
			$data['messages'] = $this->message_model->listing_sent($this->user->user_id);
			$this->load->view('web/layout/header', $data);
			$this->load->view('web/message/sent');
			$this->load->view('web/layout/footer');
		} elseif ($method == 'detail') {
			$data['title'] = "Detail Message";
			$this->load->view('web/layout/header', $data);
			$this->load->view('web/message/detail');
			$this->load->view('web/layout/footer');
		} else {
			redirect(base_url('web/message/inbox'));
		}
	}

	public function settings($type = null)
	{
		if ($type == "profile") {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$this->form_validation->set_rules('student_fullname', 'student fullname', 'required', array(
					'required' => 'Enter full name '
				));
				$this->form_validation->set_rules('student_id', 'student id', 'required', array('required' => 'Enter student id'));
				$this->form_validation->set_rules('student_programme', 'programme', 'required', array('required' => 'Enter student programme'));
				$this->form_validation->set_rules('student_email', 'email', 'required', array('required' => 'Enter student email'));
				$this->form_validation->set_rules('student_phone', 'phone number', 'required', array('required' => 'Enter phone number'));

				if ($this->users_model->get_by_email($this->input->post('student_email')) && $this->input->post('student_email') != $this->user->user_email) {
					$this->session->set_flashdata('message', alert_message('Email Already Exist', 'danger'));
					redirect(base_url('web/settings/profile'));
				}

				if ($this->users_model->get_by_matrix_number($this->input->post('student_id')) && $this->input->post('student_id') != $this->user->user_matrix_number) {
					$this->session->set_flashdata('message', alert_message('Student ID Already Exist', 'danger'));
					redirect(base_url('web/settings/profile'));
				}

				if ($this->form_validation->run() != false) {

					$dataUser = array(
						'user_name' => $this->input->post('student_fullname'),
						'user_email' => $this->input->post('student_email'),
						'user_matrix_number' => $this->input->post('student_id'),
						'user_phone_number' => $this->input->post('student_phone'),
						'user_programme' => $this->input->post('student_programme')
					);
					$this->users_model->update($this->user->user_id, $dataUser);
					$this->session->set_flashdata('message', alert_message('Profile has been updated', 'success'));
					redirect(base_url('web/settings/profile'));
				}
			}
			$data['title'] = "Profile";
			$data['user'] = $this->users_model->get_by_id($this->user->user_id);
			$this->load->view('web/layout/header', $data);
			$this->load->view('web/settings/profile');
			$this->load->view('web/layout/footer');
		} else if ($type == "password") {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$this->form_validation->set_rules('current_password', 'old password', 'required', array('required' => 'Enter Old password'));
				$this->form_validation->set_rules('password', 'password', 'required', array('required' => 'Enter password'));
				$this->form_validation->set_rules('confirm_password', 'retype password', 'required|matches[password]', array('required' => 'Enter confirm password', 'matches' => 'password does not match'));

				if ($this->form_validation->run() != false) {

					if (!password_verify($this->input->post('current_password'), $this->user->user_password)) {
						$this->session->set_flashdata('message', alert_message('Old password does not match', 'danger'));
						redirect(base_url('web/settings/password'));
					}

					$dataUser = array(
						'user_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					);
					$this->users_model->update($this->user->user_id, $dataUser);
					$this->session->set_flashdata('message', alert_message('Password has been updated', 'success'));
					redirect(base_url('web/settings/password'));
				}
			}
			$data['title'] = "Password";
			$this->load->view('web/layout/header', $data);
			$this->load->view('web/settings/password');
			$this->load->view('web/layout/footer');
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
