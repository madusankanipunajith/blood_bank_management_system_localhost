<?php
	require '../../session.php';


        if (isset($_GET['delnic'])) { $nic= $_GET['delnic']; }
        $sql= "DELETE FROM blood_bank_admin WHERE NIC='$nic'";
        if ($result=mysqli_query($link, $sql)) {
            header("Location: ../index?del=ok");
        }else{
            echo "Unable to delete";
        }

 mysqli_close($link);       
  
?>