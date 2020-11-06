<?php
 require '../session.php';
 if (isset($_GET['id'])) {
 		$donor_id= $_GET['id'];
 	}
$hosid= $_SESSION["id-3"]; 	
$date= date("Y-m-d");
 	$sql="UPDATE donor_reservation SET Flag='1' WHERE Dates='$date' AND DonorID='$donor_id' AND HosID='$hosid' " ;
 	if ($result=mysqli_query($link, $sql)) {
 		header("Location: index?id=$donor_id");
 	}else{
 		echo "Ooops";
 	}

// Close connection
mysqli_close($link);		
?>