<?php

	class Admin_login extends CI_Controller
	{

		public function __construct(){
			parent::__construct();

			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Reg_Model');

		}

		public function index(){
			if($this->session->userdata('session_data')){
				redirect('admin_home');
			}

			$result['data']= $this->Reg_Model->display_users();
			$res=$result['data'];
			$this->load->view('admin_login');

			if($this->input->post('signin_admin')){

				$flag=0;
				$name=$this->input->post('name');
				$password=$this->input->post('password');
				foreach($res as $row){
					if($row->name==$name&&$row->password==$password){
						$flag=1;
						$admin_id= $row->id;
					}
				}

				if($flag==1){

					$sess_arr= array(
						'id'=> $admin_id,
					);
					$this->session->set_userdata('session_data', $sess_arr);
				//	$sess_arr = $this->session->userdata('session_data');
					//echo $sess_arr['id'];
					redirect('admin_home');
				}else{
					echo "INPUTS WRONG";
				}
			}

		}
	}



?>