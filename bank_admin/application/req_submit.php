<?php
require '../session.php';

$date= Date("Y-m-d");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$volume="";
	$bankid= $_SESSION['id-3'];

	if (empty(trim($_POST['hosid']))) {
		$hos_err="Enter hospital name";
	}else{
		$hosid= trim($_POST['hosid']);
	}
	
	if (empty(trim($_POST['type']))) {
		$type_err="Enter Blood Type";
	}else{
		$bloodid= trim($_POST['type']);
		$_SESSION['bloodid']= $btype;
	}
	if (empty(trim($_POST['amount']))) {
		$amount_err="Enter Blood Type";
	}else{
		$amount= trim($_POST['amount']);
	}

	$sql2= "SELECT a.Volume AS Volume, b.Type AS Type FROM blood_stock a INNER JOIN blood b ON a.BloodID=b.BloodID WHERE a.StockID='$bankid' AND a.BloodID='$bloodid' ";
	$result= mysqli_query($link, $sql2);while ($row = mysqli_fetch_assoc($result)) {$volume=$row["Volume"];$type=$row["Type"];}

	if ($volume>$amount) {

		$update_volume= $volume-$amount;
		$sql3= "UPDATE blood_stock SET Volume='$update_volume' WHERE StockID='$bankid' AND BloodID='$bloodid' ";
		mysqli_query($link, $sql3);

		if ($_SESSION['hostype']=="bloodbank") {
		$sql= "INSERT INTO blood_bank_request (SenderID, ReceiverID, Type, Amount, Dates) VALUES ('$hosid', '$bankid', '$type', '$amount', '$date')";
		mysqli_query($link, $sql);
		header("Location: ../donate_blood/add_request?accept=ok");
		}
		if ($_SESSION['hostype']=="hospital") {
		$sql= "INSERT INTO normal_blood_request (SenderID, ReceiverID, Type, Amount, Dates) VALUES('$hosid', '$bankid', '$type', '$amount', '$date')";
		mysqli_query($link, $sql);
		header("Location: ../donate_blood/add_request?accept=ok");
	}
	}else{
		header("Location: ../donate_blood/appointment?fail=ok&fhosid=$hosid&famount=$amount"); 
		
	}


}else{
	header("Location: ../index");
}



mysqli_close($link);
?>