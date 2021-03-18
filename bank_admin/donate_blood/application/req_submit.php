<?php
require '../../session.php';

$date= Date("Y-m-d");

if ($_SERVER["REQUEST_METHOD"] == "POST"){unset_cache();
	$volume="";
	$bankid= $_SESSION['id-3'];

	if (empty(trim($_POST['hosid']))) {
		$hos_err="Enter hospital name";
	}else{
		$hosid= trim($_POST['hosid']);
		set_req_hosid($hosid);
		if ($_SESSION['hostype']=="bloodbank") {
            $sql5="SELECT Name, District FROM blood_bank_hospital WHERE HospitalID='$hosid'";
        }else{
            $sql5="SELECT Name, District FROM normal_hospital WHERE UserName='$hosid'";
        }
        $result5= mysqli_query($link, $sql5);while ($row = mysqli_fetch_assoc($result5)) {
        	$hosname=$row["Name"];set_hosname($hosname);
        	$district=$row["District"];set_district($district);}
	}
	
	if (empty(trim($_POST['type']))) {
		$type_err="Enter Blood Type";
		set_blood_type_err($type_err);
	}else{
		$bloodid= trim($_POST['type']);
		set_blood_id($bloodid);
		$sql4= "SELECT Type FROM blood WHERE BloodID='$bloodid' ";
    	$result4= mysqli_query($link, $sql4);
    	while ($row = mysqli_fetch_assoc($result4)) {
    		$btype=$row["Type"];
    		set_blood_type($btype);
    	}
	}
	if (empty(trim($_POST['amount']))) {
		$amount_err="Enter Blood Type";
		set_blood_amount_err($amount_err);
	}else{
		$amount= trim($_POST['amount']);
		set_blood_amount($amount);
	}

	$sql2= "SELECT a.Volume AS Volume, b.Type AS Type FROM blood_stock a INNER JOIN blood b ON a.BloodID=b.BloodID WHERE a.StockID='$bankid' AND a.BloodID='$bloodid' ";
	$result= mysqli_query($link, $sql2);while ($row = mysqli_fetch_assoc($result)) {$volume=$row["Volume"];$type=$row["Type"];}

	if ($volume>=$amount) {

		$update_volume= $volume-$amount;
		$sql3= "UPDATE blood_stock SET Volume='$update_volume' WHERE StockID='$bankid' AND BloodID='$bloodid' ";
		mysqli_query($link, $sql3);

		if ($_SESSION['hostype']=="bloodbank") {
		$sql= "INSERT INTO blood_bank_request (SenderID, ReceiverID, Type, Amount, Dates) VALUES ('$hosid', '$bankid', '$type', '$amount', '$date')";
		mysqli_query($link, $sql);unset_cache();
		header("Location: ../add_request?accept=ok");
		}
		if ($_SESSION['hostype']=="hospital") {
		$sql= "INSERT INTO normal_blood_request (SenderID, ReceiverID, Type, Amount, Dates) VALUES('$hosid', '$bankid', '$type', '$amount', '$date')";
		mysqli_query($link, $sql);unset_cache();
		header("Location: ../add_request?accept=ok");
		}
	}else{
		header("Location: ../appointment?fail=ok"); 
		
	}


}else{
	header("Location: ../../index");
}



mysqli_close($link);
?>