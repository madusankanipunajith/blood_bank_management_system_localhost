<?php
	require '../session.php';

	if($_SERVER["REQUEST_METHOD"] == "GET"){
		if (isset($_GET['hosid'])) { 
			$hosid= $_GET['hosid'];
			 $_SESSION['hosid']=$hosid;
		}
        if (isset($_GET['hosname'])) { 
        	$_SESSION['hosname']= $_GET['hosname'];
        }
        //if (isset($_SESSION['hosname'])) { $hosname= $_SESSION['hosname'];}

        header("Location: ../add-campaign/more_info");
	}
?>