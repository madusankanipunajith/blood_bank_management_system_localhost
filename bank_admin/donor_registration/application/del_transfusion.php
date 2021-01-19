<?php
require '../../session.php';

if (isset($_GET['ser']) && isset($_GET['bag'])) {
	$serial= $_GET['ser'];
	$packet= $_GET['bag'];

	$sql="DELETE FROM transfusion WHERE SerialNumber='$serial' AND PacketNumber='$packet'";
	if ($res=mysqli_query($link,$sql)) {
		$_SESSION['pcount']-=1;
		header("Location: ../packet_review");
	}else{
		echo "something went wrong";
	}
}

mysqli_close($link);
?>