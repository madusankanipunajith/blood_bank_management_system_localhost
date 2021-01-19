<?php

	/**
	 * 
	 */
	class Reg_Model extends CI_Model
	{
		
		public function saverecords($name,$password,$email,$address,$telephone)
		{
			$query= "INSERT INTO customer VALUES('', '$name', '$password', '$email', '$address', '$telephone')";
			$this->db->query($query);
		}

		public function saverecords_1($name,$password,$email,$address,$telephone)
		{
			$query= "INSERT INTO admin VALUES('', '$name', '$password', '$email', '$address', '$telephone')";
			$this->db->query($query);
		}

		public function saverecords_2($name, $price)
		{
			$query= "INSERT INTO product VALUES('', '$name', '$price')";
			$this->db->query($query);
		}

		public function update_orders($id, $name,$cust_name,$amount,$address,$telephone)
		{
			$query= "INSERT INTO orders VALUES('', '$name', '$cust_name', '$id', '$amount', '$address', '$telephone')";
			$this->db->query($query);

		}


		public function display_users(){
			$query= $this->db->query('SELECT * FROM admin');
			return $query->result();
		}

		public function display_users_1(){
			$query= $this->db->query('SELECT * FROM customer');
			return $query->result();
		}

		public function display_product(){
			$query= $this->db->query('SELECT * FROM product');
			return $query->result();
		}

		public function display_orders(){
			$query= $this->db->query('SELECT * FROM orders');
			return $query->result();
		}

		public function delete_admin($id){
			$this->db->query("DELETE FROM admin WHERE id='".$id."'");
		}

		public function display_admin_by_id($id){
			$query= $this->db->query("SELECT * FROM admin WHERE id='".$id."'");
			return $query->result();
		}

		public function display_product_by_id($id){
			$query= $this->db->query("SELECT * FROM product WHERE id='".$id."'");
			return $query->result();
		}



		public function update_admin($id,$name,$password,$email,$address,$telephone){
			$query= $this->db->query("UPDATE admin SET name='$name', email='$email', password='$password', address='$address', telephone='$telephone' WHERE id='".$id."'");
		}

		

	}

?>