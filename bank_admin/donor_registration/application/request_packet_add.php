<?php
require '../../session.php';

$volume="";
$bank_id= $_SESSION['id-3'];

if (isset($_GET['serial']) && isset($_GET['bag']) && isset($_GET['bid'])) {
	$serial_num= $_GET['serial'];
	$bag_num= $_GET['bag'];
	$bid= $_GET['bid'];

	$sql= "SELECT Volume FROM blood_stock WHERE BloodID='$bid' AND StockID='$bank_id'";
	$result= mysqli_query($link,$sql); while($row=mysqli_fetch_assoc($result)){$volume= $row['Volume'];}$new_volume= $volume+1;

	$sql2="UPDATE blood_stock SET Volume='$new_volume' WHERE BloodID='$bid' AND StockID='$bank_id'";

	if ($result2=mysqli_query($link,$sql2)) {
		$sql3="UPDATE donate_hospital SET HospitalID='$bank_id' WHERE SerialNumber='$serial_num' AND PacketNumber='$bag_num'";
		$sql4="UPDATE donate_campaign SET HospitalID='$bank_id' WHERE SerialNumber='$serial_num' AND PacketNumber='$bag_num'";
		if ($result3= mysqli_query($link,$sql3) && $result4=mysqli_query($link,$sql4)) {
			header("Location: ../select_number?add=ok");
		}else{
			echo "Can't update the database";
		}
	}else{
		echo "Update volume Problem occured";
	}



}else{
	echo "something went wrong";
}


mysqli_close($link);

?>