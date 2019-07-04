<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('Model_template', 'Model_utility'));
		$this->Model_utility->Check_session_login();
	}
	public function index()
	{
		$data["Template"] = $this->Model_template->Call_template();
		$this->load->view('Home', $data);
	}
}
