<?php
 require '../session.php';
 $donor_id=$opp_id="";
 if (isset($_GET['id'])) {
 		$donor_id= $_GET['id'];
 	}
 if (isset($_GET['opp_id'])) {
 		$opp_id= $_GET['opp_id'];
 	}	
$hosid= $_SESSION["id-3"]; 	
$date= date("Y-m-d");
 	$sql="UPDATE donor_reservation SET Flag='1' WHERE DonorID='$donor_id' AND HosID='$hosid' AND ID='$opp_id' " ;
 	if ($result=mysqli_query($link, $sql)) {
 	//	header("Location: ../approve_appointment/index?id=$donor_id");
 	}else{
 		echo "Ooops";
 	}

// Close connection
mysqli_close($link);		
?>