<?php
	session_start();
	require "../../config.php";
	if (isset($_GET['id'])) {
		$id= $_GET['id'];
	}

	$sql="UPDATE campaign SET Flag='2' WHERE CampaignID='$id'";
	if ($result= mysqli_query($link, $sql)) {
		header("location: index?dec=ok");
	}else{
		echo "Something went wrong";
	}


// Close connection
mysqli_close($link);
?>