<?php
require '../session.php';
if (isset($_GET['bloodid']) && isset($_GET['id']) && isset($_SESSION['hostype']) && isset($_GET['amount']) && isset($_GET['dis']) && isset($_GET['name']) ) {
	$volume="";
	$bankid= $_SESSION['id-3'];
	$req_id= $_SESSION['req_id'];
	$bloodid= $_GET['bloodid'];
	$amount= $_GET['amount'];
	$name= $_GET['name'];
	$district= $_GET['dis'];

	$sql2= "SELECT Volume FROM blood_stock WHERE StockID='$bankid' AND BloodID='$bloodid' ";
	$result= mysqli_query($link, $sql2);while ($row = mysqli_fetch_assoc($result)) {$volume=$row["Volume"];}

	if ($volume>$amount) {

		$update_volume= $volume-$amount;
		$sql3= "UPDATE blood_stock SET Volume='$update_volume' WHERE StockID='$bankid' AND BloodID='$bloodid' ";
		mysqli_query($link, $sql3);

		if ($_SESSION['hostype']=="bloodbank") {
		$sql= "UPDATE blood_bank_request SET Flag='1' WHERE ID='$req_id'";
		mysqli_query($link, $sql);
		$_SESSION['blood_bank_count']=$_SESSION['blood_bank_count']-1;
		header("Location: ../donate_blood/list?accept=ok");
		}
		if ($_SESSION['hostype']=="hospital") {
		$sql= "UPDATE normal_blood_request SET Flag='1' WHERE ID='$req_id'";
		mysqli_query($link, $sql);
		$_SESSION['hospital_count']=$_SESSION['hospital_count']-1;
		header("Location: ../donate_blood/list?accept=ok");
	}
	}else{
		header("Location: ../donate_blood/approve?fail=ok&name=$name&dis=$district&amount=$amount"); 
		
	}

	

}else{
	header("Location: ../index");
}

mysqli_close($link);
?>