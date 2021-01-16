<?php
require '../../session.php';

$hosid="";
$delhosid= $_SESSION['delete_hospital_id'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if (!empty(trim($_POST['hosid']))) {
		$hosid= trim($_POST['hosid']);
		$sql="UPDATE blood_bank_admin SET BloodBankID='$hosid' WHERE BloodBankID='$delhosid'";
		mysqli_query($link,$sql);
	}else{
		header("Location: ../admin_action?hos=empty");
	}

}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if (!isset($_GET['dirrect'])) {
		header("Location: ../index");
	}
}

if (!isset($_SESSION['packet_already'])) {
	$sql2="DELETE FROM blood_bank_hospital WHERE HospitalID='$delhosid'";
	if ($result=mysqli_query($link,$sql2)) {
		header("Location: ../select_hospital?success=ok");
	}else{
		echo "Ooops something went wrong...";
	}
}else{
	header("Location: ../packet_action");
}

mysqli_close($link);
?>