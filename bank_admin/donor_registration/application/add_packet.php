<?php
	require '../../session.php';
	require '../../application/packet_validator.php';
	require '../../application/nic_validator.php';

	$ser_err=$bag_err=$nic_err="";

	$place= $_SESSION['place'];
	$hosid= $_SESSION['id-3'];
	$campid= $_SESSION['id'];
	$date= date("Y-m-d");
	putenv("TZ=Asia/Colombo");
    $t=time();$time=date('H:i:sa',$t);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (!empty(trim($_POST['nic']))) {
			$dnic=trim($_POST['nic']);
			if (!is_valid_nic($dnic)) {
				$nic_err="NIC is not Valid";
			}else{
				$nic= $dnic;
			}
			
		}else{
			$nic_err="Enter the NIC";
		}
		if (!empty(trim($_POST['bag_num']))) {
			$bag=trim($_POST['bag_num']);
			if (!is_valid_bag($bag)) {
				$bag_err="Invalid Packet Number";
			}else{
				$bag_num= $bag;
			}
			
		}else{
			$bag_err="Enter Packet Number";
		}

		if (!empty(trim($_POST['serial_num']))) {
			$serial=trim($_POST['serial_num']);
			if (!is_valid_serial($serial)) {
				$ser_err="Invalid Serial Number";
			}else{
				$serial_num= $serial;
			}
			
		}else{
			$ser_err="Enter Serial Number";
		}

		if (!empty(trim($_POST['exp_date']))) {
			$exp_date= trim($_POST['exp_date']);
		}
		if (!empty(trim($_POST['bgroup']))) {
			$bgroup= trim($_POST['bgroup']);
		}	

		if (empty($ser_err) && empty($bag_err) && empty($nic_err)) {
			$sql3="SELECT DonateID FROM donate_hospital WHERE PacketNumber='$bag_num' AND SerialNumber='$serial_num' UNION SELECT DonateID FROM donate_campaign WHERE PacketNumber='$bag_num' AND SerialNumber='$serial_num'";$result3=mysqli_query($link,$sql3);

			if (mysqli_num_rows($result3)>0) {
				header("Location: ../select_donor?already=ok");
			}else{

				if ($place=="hospital") {
					$sql="INSERT INTO donate_hospital(SerialNumber, PacketNumber, HospitalID, DonorID, Dates, ExpDate, Tme) VALUES ('$serial_num','$bag_num','$hosid','$nic','$date','$exp_date', '$time')";
					$sql2="UPDATE donor SET bloodgroup='$bgroup' WHERE nic='$nic' ";
					mysqli_query($link, $sql);mysqli_query($link, $sql2);header("Location: ../select_donor?add=ok");
				}else{
					$sql="INSERT INTO donate_campaign(CampID, SerialNumber, PacketNumber, HospitalID, DonorID, Dates, ExpDate, Tme) VALUES ('$campid','$serial_num','$bag_num','$hosid','$nic','$date','$exp_date', '$time')";
					$sql2="UPDATE donor SET bloodgroup='$bgroup' WHERE nic='$nic' ";
					mysqli_query($link, $sql);mysqli_query($link, $sql2);header("Location: ../select_donor?add=ok");
				}
			}
		}else{
			header("Location: ../select_donor?serial=$ser_err&bag=$bag_err&nic=$nic_err");
		}
			

	}else{
		header("Location: ../../index");
	}
		

mysqli_close($link);	
?>