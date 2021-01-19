<?php
require '../../session.php';

$hosid="";
$delhosid= $_SESSION['delete_hospital_id'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if (!empty($_POST['hosid'])) {
		$hosid= trim($_POST['hosid']);
		$sql1="UPDATE donate_hospital SET HospitalID='$hosid' WHERE HospitalID='$delhosid'";
		$sql2="UPDATE donate_campaign SET HospitalID='$hosid' WHERE HospitalID='$delhosid'";
		mysqli_query($link,$sql1);mysqli_query($link,$sql2);
	}else{
		header("Location: ../packet_action?hos=empty");
	}

}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if (!isset($_GET['dirrect'])) {
		header("Location: ../index");
	}
}

	$sql3="DELETE FROM blood_bank_hospital WHERE HospitalID='$delhosid'";
	if ($result=mysqli_query($link,$sql3)) {
		// unset sessions
		unset($_SESSION['packet_already']);
		unset($_SESSION['delete_hospital_id']);
		header("Location: ../select_hospital?success=ok");
	}else{
		echo "Ooops something went wrong...";
	}


mysqli_close($link);
?>