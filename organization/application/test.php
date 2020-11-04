<?php
	require_once "../../config.php";
	$sql="SELECT * FROM donor";
	$result= mysqli_query($link,$sql);
	header('Location:../test.php'.http_build_query($result, null, '&'));
	mysqli_close($link);
?>