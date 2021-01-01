<?php
require '../../session.php';
require '../../application/packet_validator.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

if (!empty(trim($_POST['serial_num']))) {
	$serial= trim($_POST['serial_num']);
	if (!is_valid_serial($serial)) {
		$serial_err="Invalid Serial Number";
	}else{
		$serial_num= $_POST['serial_num'];
	}
}else{
    $serial_err="Enter the Serial Number";
}
if (!empty(trim($_POST['bag_num']))) {
	$bag= trim($_POST['bag_num']);
	if (!is_valid_bag($bag)) {
		$bag_err="Invalid Packet Number";
	}else{
		$bag_num= $_POST['bag_num'];	
	}
   
}else{
    $bag_err="Enter the Bag Number";
}

if (empty($serial_err) && empty($bag_err)) {

    $_SESSION['serial_num']=$serial_num;
    $_SESSION['bag_num']= $bag_num;

    header("Location:../request_packet_details");

}else{
	header("Location:../select_number?bag=$bag_err&serial=$serial_err");
}

}else{
	header("location:../../index");
}

mysqli_close($link);

?>