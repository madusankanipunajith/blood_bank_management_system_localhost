<?php
require '../session.php';

$bank_id= $_SESSION['id-3'];

if (isset($_GET['id']) && isset($_GET['bid']) && isset($_GET['amount'])) {
	$id= $_GET['id'];$blood_id=$_GET['bid'];$amount=$_GET['amount'];

	$sql2="SELECT Volume FROM blood_stock WHERE StockID='$bank_id' AND BloodID='$blood_id'";$result2=mysqli_query($link, $sql2);
	while ($row=mysqli_fetch_assoc($result2)) {$volume= $row["Volume"];}$prev_volume= $volume+ $amount;echo "$prev_volume";
	$sql3="UPDATE blood_stock SET Volume='$prev_volume' WHERE StockID='$bank_id' AND BloodID='$blood_id'";$result3=mysqli_query($link, $sql3);

	if ($_SESSION['hostype']=="bloodbank") {
		
		$sql="DELETE FROM blood_bank_request WHERE ID='$id'";
		//$result=mysqli_query($link, $sql);
	}
	if ($_SESSION['hostype']=="hospital") {

		$sql="DELETE FROM normal_blood_request WHERE ID='$id'";
		//$result=mysqli_query($link, $sql);
	}

	if ($result=mysqli_query($link, $sql)) {
		header("Location: ../donate_blood/add_request");
	}else{
		echo "something went wrong";
	}
}else{
	header("Location: ../index");
}


mysqli_close($link);
?>