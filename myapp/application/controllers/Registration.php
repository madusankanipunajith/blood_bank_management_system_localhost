<?php

	/**
	 * 
	 */
	class Registration extends CI_Controller
	{
		public function __construct(){
			parent::__construct();

			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Reg_Model');

		}

		public function savedata(){
			$this->load->view('registration_form');

			if ($this->input->post('save')) {
				$name=$this->input->post('name');
				$password=$this->input->post('password');
				$email=$this->input->post('email');
				$address=$this->input->post('address');
				$telephone=$this->input->post('telephone');

				$this->Reg_Model->saverecords($name,$password,$email,$address,$telephone);
				echo "Record saved successfully";
				
			}
		}
	}

?>