<?php


	/**
	 * 
	 */
	class Add_product extends CI_Controller
	{
		
		public function __construct(){
			parent::__construct();

			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Reg_Model');

			

		}


		public function index(){
			$this->load->view('add_product');

			if ($this->input->post('save')) {
				$name=$this->input->post('name');
				$price=$this->input->post('price');

				$this->Reg_Model->saverecords_2($name,$price);
				echo "Record saved successfully";
				
			}
		}




	}




?>