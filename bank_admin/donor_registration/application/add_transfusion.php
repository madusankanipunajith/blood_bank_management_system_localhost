<?php
require '../../session.php';
$date= Date("Y-m-d");
$bank_id=$_SESSION['id-3'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST['serial_num'])) {
		$ser_err="Enter Serial Number";
	}else{
		$serial=$_POST['serial_num'];
		$_SESSION['tserial_num']=$serial;
	}
	if (empty($_POST['bag_num'])) {
		$bag_err="Enter Packet Number";
	}else{
		$bag=$_POST['bag_num'];
		$_SESSION['tbag_num']=$bag;
	}
	$pnic=$_SESSION['pnic'];

	if (empty($ser_err) && empty($bag_err)) {
		$sql="SELECT DonateID,DonorID FROM donate_campaign WHERE SerialNumber='$serial' AND PacketNumber='$bag' AND HospitalID='$bank_id' AND Valid='1' UNION SELECT DonateID,DonorID FROM donate_hospital WHERE SerialNumber='$serial' AND PacketNumber='$bag' AND HospitalID='$bank_id' AND Valid='1'";
		$result= mysqli_query($link,$sql);
		if (mysqli_num_rows($result) >0) {
			$sql2="SELECT SerialNumber FROM transfusion WHERE SerialNumber='$serial' AND PacketNumber='$bag'";
			$result2=mysqli_query($link,$sql2);
			if (mysqli_num_rows($result2) <=0) {
				while($row=mysqli_fetch_assoc($result)){$dnic=$row["DonorID"];}
				$sql3="INSERT INTO transfusion(SerialNumber,PacketNumber,DNIC,PNIC,Dates) VALUES('$serial','$bag','$dnic','$pnic','$date');";
					if (mysqli_query($link,$sql3)) {
						$_SESSION['pcount']+=1;
						header("Location:../select_packet?add");
					}else{
						echo "error occured";
					}
			}else{
				header("Location:../select_packet?already");
			}
		}else{
			header("Location: ../select_packet?notfound");
		}
	}else{
		header("Location: ../select_packet?serial=$ser_err&bag=$bag_err");
	}
}

mysqli_close($link);
?>