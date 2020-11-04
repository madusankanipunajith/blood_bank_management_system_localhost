<?php
    require '../../session.php';

    $nic=$id=$hos_err="";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (trim(empty($_POST['id']))) {
            $hos_err= "plz enter hospital id";
        }else{
            $hosid= $_POST['id'];
            $sql2= "SELECT Name FROM blood_bank_hospital WHERE HospitalID='$hosid'";
            $result2=mysqli_query($link, $sql2);
                $count= mysqli_num_rows($result2);
                if ($count==0) {$hos_err="No Such a Hospital";}
            }
                if (empty($hos_err)) {
                    $sql3= "UPDATE blood_bank_admin SET BloodBankID='$hosid' WHERE NIC='$nic'";
                    mysqli_query($link, $sql3);
                    header("Location: ../index?update=ok");
                }else{
                    header("Location: ../update_admin?hosid=$hos_err");
                }
                
        
        
    }
// Close connection
mysqli_close($link);
?>