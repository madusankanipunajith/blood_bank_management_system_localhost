<?php
	require '../../session.php';

	if (isset($_GET['delid']) && isset($_GET['name']) && isset($_GET['dis']) && isset($_GET['add']) ) {
        $hosid= $_GET['delid'];
        $name= $_GET['name'];
        $dis= $_GET['dis'];
        $add= $_GET['add'];

        $sql2="SELECT NIC FROM blood_bank_admin WHERE BloodBankID='$hosid'";
        $sql3="SELECT DonateID FROM donate_hospital WHERE HospitalID='$hosid' UNION SELECT DonateID FROM donate_campaign WHERE HospitalID='$hosid'";
        $result2=mysqli_query($link, $sql2);$result3=mysqli_query($link,$sql3);
        if (mysqli_num_rows($result2)==0 && mysqli_num_rows($result3)==0) {
            $sql="DELETE FROM blood_bank_hospital WHERE HospitalID='$hosid'";
            if ($result=mysqli_query($link, $sql)) {
            header("Location: ../select_hospital?success=ok");
            }else{
            echo "Can't Delete";
            }
        }elseif(mysqli_num_rows($result2)>0){
            $_SESSION['delete_hospital_id']=$hosid;
            if (mysqli_num_rows($result3)>0) {
                $_SESSION['packet_already']='yes';
            }
            header("Location: ../delete_hospital?admin=pass&name=$name&dis=$dis&add=$add&id=$hosid");
        }else{
            $_SESSION['delete_hospital_id']=$hosid;
            header("Location: ../delete_hospital?packet=pass&name=$name&dis=$dis&add=$add&id=$hosid");
        }

        
    }

    mysqli_close($link);
?>