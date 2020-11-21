<?php 
	require '../session.php';
	$hosid=$_SESSION["id-3"];
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if (isset($_GET['cap'])) {
			$capacity= $_GET['cap'];
			if (is_numeric($capacity)) {
				$sql= "UPDATE blood_bank_hospital SET Capacity='$capacity' WHERE HospitalID='$hosid'";
				mysqli_query($link, $sql);
				header("Location: ../profile/index?update=ok");
			}else{
				header("Location: ../profile/index?numer=failed");
			}
		}
	}

	mysqli_close($link);
?>