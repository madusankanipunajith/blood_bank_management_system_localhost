<?php
require '../session.php';
if (isset($_GET['id']) && isset($_SESSION['hostype'])) {

	$req_id= $_GET['id'];

	if ($_SESSION['hostype']=="bloodbank") {
		$sql= "UPDATE blood_bank_request SET Flag='2' WHERE ID='$req_id'";
		mysqli_query($link, $sql);
		$_SESSION['blood_bank_count']=$_SESSION['blood_bank_count']-1;
		header("Location: ../donate_blood/list?decline=ok");
	}
	if ($_SESSION['hostype']=="hospital") {
		$sql= "UPDATE normal_blood_request SET Flag='2' WHERE ID='$req_id'";
		mysqli_query($link, $sql);
		$_SESSION['hospital_count']=$_SESSION['hospital_count']-1;
		header("Location: ../donate_blood/list?decline=ok");
	}

}else{
	header("Location: ../index");
}

mysqli_close($link);
?>