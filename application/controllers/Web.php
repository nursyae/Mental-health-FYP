<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
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
		$this->load->view('web/layout/header', $data);
		$this->load->view('web/dashboard');
		$this->load->view('web/layout/footer');
	}

	public function mental_health_test()
	{
		$data['title'] = "Mental Health Test";
		$data['questions'] = $this->Question_model->listing();
		$this->load->view('web/layout/header', $data);
		$this->load->view('web/mental_health_test');
		$this->load->view('web/layout/footer');
	}

	public function test(){
		$this->load->view('test');
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url('login'));
	}
}
