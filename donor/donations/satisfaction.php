<?php
	require '../session.php';
	$nic=$_SESSION["id-1"];

	if (isset($_GET['like'])) {
		$id= $_GET['like'];

		$sql="UPDATE donor_satisfaction SET Satisfaction='1' WHERE HospitalID='$id' AND DonorID='$nic'";
		mysqli_query($link, $sql);
	}
	if (isset($_GET['dislike'])) {
		$id= $_GET['dislike'];
		$sql="UPDATE donor_satisfaction SET Satisfaction='2' WHERE HospitalID='$id' AND DonorID='$nic'";
		mysqli_query($link, $sql);
	}

	header("location: hospital_donations");

// Close connection
mysqli_close($link);
?>