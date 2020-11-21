<?php
session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$pin1= 9999;
		if (empty(trim($_POST['pin']))) {
			$pin_err= "Enter Your PIN";
			header("Location: super_authentication?pin=$pin_err");
		}else{
			$var= trim($_POST['pin']);
			if ($pin1==$var) {
				$_SESSION['super']= "access ok";
				header("Location: ../super_login");
			}else{
				$pin_err= "PIN is not matched";
				header("Location: super_authentication?pin=$pin_err");
			}
		}
	}else{
		header("Location: ../admin");
	}


?>