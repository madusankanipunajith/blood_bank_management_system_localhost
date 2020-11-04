<?php
	require '../../session.php';

	if (isset($_GET['delid'])) {
        $hosid= $_GET['delid'];
        $sql="DELETE FROM blood_bank_hospital WHERE HospitalID='$hosid'";
        if ($result=mysqli_query($link, $sql)) {
            header("Location: ../index?del=ok");
        }else{
            echo "Can't Delete";
        }
    }

    mysqli_close($link);
?>