<?php
	require '../../session.php';


        if (isset($_GET['delnic']) && isset($_GET['hosid']) ) { $nic= $_GET['delnic']; $hosid=$_GET['hosid']; 

        $sql2="SELECT NIC FROM blood_bank_admin WHERE BloodBankID='$hosid'";
        $result2=mysqli_query($link, $sql2);

        if (mysqli_num_rows($result2)>1) {
        	$sql= "DELETE FROM blood_bank_admin WHERE NIC='$nic'";
        	if ($result=mysqli_query($link, $sql)) {
            header("Location: ../index?del=ok");
        	}else{
            echo "Unable to delete";
        	}
        }else{
        	header("Location: ../select_admin?fnic=$nic&error='ok'");
        }

    }

 mysqli_close($link);       
  
?>