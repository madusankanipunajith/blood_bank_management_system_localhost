<?php
require '../session.php';

$name=$district="";

if($_SERVER["REQUEST_METHOD"] == "GET") {

	if (isset($_GET['req_id']) && isset($_GET['type']) && isset($_GET['amount'])) {
	$id= $_GET['req_id'];
	$_SESSION['req_id']= $id;

	$type= $_GET['type'];
	$_SESSION['type']= $type;
	
	$amount= $_GET['amount'];
	$_SESSION['amount']= $amount;

	if (isset($_GET['name'])) {
		$name= $_GET['name'];
	}
	if (isset($_GET['dis'])) {
		$district=$_GET['dis'];
	}

	header("Location: approve?req_id=$id&type=$type&name=$name&dis=$district&amount=$amount");
}





}

?>