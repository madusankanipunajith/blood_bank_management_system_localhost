<?php

class Logout extends CI_Controller
	{
		public function __construct(){
			parent::__construct();

			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Reg_Model');
			
		}

		public function index(){
			$this->session->unset_userdata('session_data_1');
			$this->session->unset_userdata('session_data');
			$this->load->view('home');
		}

	}
?>