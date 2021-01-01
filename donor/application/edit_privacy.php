<?php
require '../session.php';

$nic= $_SESSION['id-1'];

if (isset($_GET['flag'])) {
	$flag= $_GET['flag'];

	$sql="UPDATE donor SET privacy='$flag' WHERE nic='$nic'";
	if ($result=mysqli_query($link, $sql)) {
		header("Location: ../profile/index");
	}else{
		echo "Can't Update";
	}
}



mysqli_close($link);
?>