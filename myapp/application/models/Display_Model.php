<?php

	class Display_Model extends CI_Model{

		public function display_users(){
			$query= $this->db->query('SELECT * FROM admin');
			return $query->result();
		}
	}

?>