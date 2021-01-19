<?php

	class Admin_home extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Reg_Model');

			if(!$this->session->userdata('session_data')){
				redirect('admin_login');
			}

		}


		public function index(){
			$this->load->view('admin_home');
		}
		public function add_admin(){
			$this->load->view('add_admin');

			if ($this->input->post('save')) {
				$name=$this->input->post('name');
				$password=$this->input->post('password');
				$email=$this->input->post('email');
				$address=$this->input->post('address');
				$telephone=$this->input->post('telephone');

				$this->Reg_Model->saverecords_1($name,$password,$email,$address,$telephone);
				echo "Record saved successfully";
				
			}
		}

		public function profile(){
			$sess_arr = $this->session->userdata('session_data');
			$id= $sess_arr['id'];
			$result['data']= $this->Reg_Model->display_admin_by_id($id); 
			$this->load->view('admin_profile', $result);
		}

		public function admin_list(){
			$result['data']= $this->Reg_Model->display_users();
			$this->load->view('display_admin', $result);
		}

		public function customer_list(){
			$result['data']= $this->Reg_Model->display_users_1();
			$this->load->view('display_customer', $result);
		}

		public function order_list(){
			$result['data']= $this->Reg_Model->display_orders();
			$this->load->view('display_order', $result);
		}

		public function delete_data(){
			$id= $this->input->get('id');
			$this->Reg_Model->delete_admin($id);
			redirect('Admin_home/admin_list');
		}

		public function update_data(){
			$id= $this->input->get('id');
			$result['data']= $this->Reg_Model->display_admin_by_id($id);
			$this->load->view('update_admin_form',$result);

			if ($this->input->post('update')) {
				$id=$this->input->get('id');
				$name=$this->input->post('name');
				$password=$this->input->post('password');
				$email=$this->input->post('email');
				$address=$this->input->post('address');
				$telephone=$this->input->post('telephone');

				$this->Reg_Model->update_admin($id, $name,$password,$email,$address,$telephone);
				echo "Record saved successfully";
				
			}
		}
	}

?>