<?php
require '../../session.php';
require '../../application/nic_validator.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_SESSION['starts'])) {
	if (isset($_POST['pnic'])) {
		if (empty(trim($_POST['pnic']))) {
			$nic_err="Plz enter the NIC";
		}elseif (!is_valid_nic(trim($_POST['pnic']))) {
			$nic_err="NIC is not Valid";
		}else{
			$nic= trim($_POST['pnic']);
			$_SESSION['pnic']=$nic;
		}
	}
	if (empty($_POST['pname'])) {
		$name_err="Enter the Full Name";
	}else{
		$name=$_POST['pname'];
		$_SESSION['pname']=$name;
	}
	if (empty($_POST['ptype'])) {
		$type_err="Enter Blood Type";
	}else{
		$type=trim($_POST['ptype']);
		$_SESSION['ptype']=$type;
	}
	if (empty($_POST['pdistrict'])) {
		$dis_err="Enter District";
	}else{
		$district=$_POST['pdistrict'];
		$_SESSION['pdistrict']=$district;
	}

	if (empty($nic_err) && empty($name_err) && empty($dis_err) && empty($type_err)) {
		$sql="SELECT NIC FROM patient WHERE NIC='$nic'";$result=mysqli_query($link,$sql);
		if (mysqli_num_rows($result)>0) {
			$_SESSION['starts']='ok';
			header("Location: ../select_packet");
		}else{
			$sql2="INSERT INTO patient(NIC,Name,District) VALUES('$nic','$name','$district')";
			mysqli_query($link,$sql2);
			$_SESSION['starts']='ok';
			header("Location: ../select_packet");
		}
	}else{
		header("Location: ../select_patient?nic=$nic_err&name=$name_err&dis=$dis_err&type=$type_err");
	}

}else{
	header("Location:../select_packet?finish");
}

?>