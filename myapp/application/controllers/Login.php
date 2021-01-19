<?php

	/**
	 * 
	 */
	class Login extends CI_Controller
	{
		public function __construct(){
			parent::__construct();

			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Reg_Model');
			
		}

		public function profile(){
			$this->load->view('customer_profile');
		}

		public function home(){
			if(!$this->session->userdata('session_data_1')){
				redirect('login');
			}

			$result['data']= $this->Reg_Model->display_product();
			$this->load->view('customer_home',$result);
		}

		public function index(){
			if($this->session->userdata('session_data_1')){
				redirect('login/home');
			}
			$result['data']= $this->Reg_Model->display_users_1();
			$res=$result['data'];
			$this->load->view('login');

			if($this->input->post('signin')){

				$flag=0;
				$name=$this->input->post('name');
				$password=$this->input->post('password');
				foreach($res as $row){
					if($row->name==$name&&$row->password==$password){
						$flag=1;
						$cust_id= $row->id;
						$cust_name= $row->name;
					}
				}

				if($flag==1){

				//	$this->session->set_userdata('admin', '1');
					$sess_arr= array(
						'id'=> $cust_id,
						'username'=> $cust_name,
					);
					$this->session->set_userdata('session_data_1', $sess_arr);
					redirect('login/home');
				}else{
					echo "INPUTS WRONG";
				}
			}
			
		}

		public function order_product(){
			$id= $this->input->get('id');
			$result['data']= $this->Reg_Model->display_product_by_id($id);
			$this->load->view('order_form',$result);

			if ($this->input->post('order')) {
				$sess_arr = $this->session->userdata('session_data_1');
				$customer_id=$sess_arr['id'];
				
				$id= $customer_id;
				$name=$this->input->post('name');
				$cust_name=$this->input->post('cust_name');
				$amount=$this->input->post('qty');
				$address=$this->input->post('address');
				$telephone=$this->input->post('telephone');

				$this->Reg_Model->update_orders($id, $name,$cust_name,$amount,$address,$telephone);
				echo "Order record saved successfully"."<br>";
				echo "We will deliver your product to the given address soonly";
				
			}
		}

	}

?>