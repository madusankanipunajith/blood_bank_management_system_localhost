<?php
    require "../../session.php";
    require '../../application/nic_validator.php';
    require '../../application/packet_validator.php';
    require '../../encrypt.php';
?>
<?php

$status=$bag_number=$nic=$bgroup=$name=$dob=$district=$serial_number=$gender="";
$volume_err=$bgroup_err="";

$place= $_SESSION['place'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {unset_cache();
    // initialize sissions of blood packet
    $_SESSION['serial_num']= trim($_POST['serial_num']);
    $_SESSION['bag_num']= trim($_POST['bag_num']);


     // Validate bloodgroup
    if(empty(trim($_POST["bgroup"]))){
        $bgroup_err = "Please select a blood group"; 
        set_blood_type_err($bgroup_err);    
    } else{
        $bgroup = trim($_POST["bgroup"]);
        $_SESSION["bgroup"]=$bgroup;
    }
     // Validate nic
    if(empty(trim($_POST["nic"]))){
        $nic_err = "Please enter the NIC";
        set_nic_err($nic_err);     
    }elseif(!is_valid_nic($_POST['nic'])){
        $nic_err= "NIC is not valid";
        set_nic_err($nic_err);
    }else{
        $nic = trim($_POST["nic"]);
        // check wether is there a donor within this nic
        $sql="SELECT nic FROM donor WHERE nic='$nic'";
        $result=mysqli_query($link,$sql);
        if (mysqli_num_rows($result)==0) {
            $nic_err="This given NIC is not registered yet. please register the donor before this event";
            set_nic_err($nic_err);
        }
        set_nic($nic);
    }
     // Validate serial_number
    if(empty(trim($_POST["serial_num"]))){
        $serial_err = "Please enter the serial number";
        set_serial_err($serial_err);     
    }elseif (!is_valid_serial($_POST['serial_num'])) {
        $serial_err= "Serial Number is not Valid";
        set_serial_err($serial_err);
    } else{
        $serial_number = trim($_POST["serial_num"]);
        $_SESSION['serial_num']= $serial_number;
    }
     // Validate packet number
    if(empty(trim($_POST["bag_num"]))){
        $bag_err = "Please enter the packet number";
        set_packet_err($bag_err);     
    }elseif (!is_valid_bag($_POST['bag_num'])) {
        $bag_err= "Bag Number is not valid";
        set_packet_err($bag_err);
    } else{
        $bag_number = trim($_POST["bag_num"]);
        $_SESSION['bag_num']= $bag_number;
    }
    // Validate expire date
    if(empty(trim($_POST["exp_date"]))){
        $exp_err = "Please enter the expire date";
        set_expire_err($exp_err);     
    } else{
        $exp_date = trim($_POST["exp_date"]);
        $_SESSION['exp_date']= $exp_date;
    }

    if (empty($bag_err) && empty($serial_err) && empty($nic_err) && empty($bgroup_err) && empty($exp_err)) {
        header("Location: ../view_details");
    }else{
        header("Location: ../select_donor?fail");
    }
}

    
  mysqli_close($link);  
?>