<?php
    require "../session.php";
    require '../application/nic_validator.php';
    require '../application/packet_validator.php';
    require '../encrypt.php';
    require ('../header.php');
?>
<?php

$bag_number=$nic=$bgroup=$name=$dob=$district=$serial_number="";
$volume_err=$bgroup_err="";

$place= $_SESSION['place'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // initialize sissions of blood packet
    $_SESSION['serial_num']= trim($_POST['serial_num']);
    $_SESSION['bag_num']= trim($_POST['bag_num']);


     // Validate bloodgroup
    if(empty(trim($_POST["bgroup"]))){
        $bgroup_err = "Please select a blood group";     
    } else{
        $bgroup = trim($_POST["bgroup"]);
        $_SESSION["bgroup"]=$bgroup;
    }
     // Validate nic
    if(empty(trim($_POST["nic"]))){
        $nic_err = "Please enter the NIC";     
    }elseif(!is_valid_nic($_POST['nic'])){
        $nic_err= "NIC is not valid";
    }else{
        $nic = trim($_POST["nic"]);
    }
     // Validate serial_number
    if(empty(trim($_POST["serial_num"]))){
        $serial_err = "Please enter the serial number";     
    }elseif (!is_valid_serial($_POST['serial_num'])) {
        $serial_err= "Serial Number is not Valid";
    } else{
        $serial_number = trim($_POST["serial_num"]);
        $_SESSION['serial_num']= $serial_number;
    }
     // Validate packet number
    if(empty(trim($_POST["bag_num"]))){
        $bag_err = "Please enter the packet number";     
    }elseif (!is_valid_bag($_POST['bag_num'])) {
        $bag_err= "Bag Number is not valid";
    } else{
        $bag_number = trim($_POST["bag_num"]);
        $_SESSION['bag_num']= $bag_number;
    }
    // Validate expire date
    if(empty(trim($_POST["exp_date"]))){
        $exp_err = "Please enter the expire date";     
    } else{
        $exp_date = trim($_POST["exp_date"]);
        $_SESSION['exp_date']= $exp_date;
    }

    if (empty($bag_err) && empty($serial_err) && empty($nic_err) && empty($bgroup_err) && empty($exp_err)) {
        $sql="SELECT * FROM donor WHERE nic='$nic'";
        if ($result=mysqli_query($link, $sql)) {
            while ($row=mysqli_fetch_assoc($result)) {
                $first_name=$row["first_name"];
                $last_name= $row["last_name"];
                $name= $first_name." ".$last_name;
                $dob=$row["dob"];
                $district=$row["district"];
                $gender= $row["gender"];
                $enc_status= $row["status"]; if (empty($enc_status)) {$status="This is a new donor. So no updates available";}else{$status=Decrypt($enc_status);}
            }
        }else{
            echo "error";
        }
    }else{
        header("Location: select_donor?bag=$bag_err&serial=$serial_err&nic=$nic_err&bgroup=$bgroup_err&exp=$exp_err");
    }
}

    
  mysqli_close($link);  
?>

<body>
	

	<div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading"><a style="float: left;" href="select_donor"><i class="fa fa-backward"></i>Back</a>Packet Adding (<?php echo "$place";?>)</div>
            </div>
            
        <form action="application/add_packet.php" method="post" style="margin-left: 20px; margin-right: 20px; margin-top: 40px;">
                <div class="form-row">
                    <div class="form-group">
                    <label>Serial Number</label>
                        <input type="text" name="serial_num" value="<?php echo $serial_number; ?>" readonly> 
                    </div>
                    <div class="form-group">
                    <label>Bag Number</label>
                        <input type="text" name="bag_num" value="<?php echo $bag_number; ?>" readonly> 
                    </div>
                    <div class="form-group ">
                    <label>Expire Date</label>
                        <input type="date" name="exp_date" value="<?php echo $exp_date; ?>" readonly>    
                    </div>

                      
                </div>
                <div class="form-row">
                    <div class="form-group">
                    <label>NIC</label>    
                    <input type="text" name="nic" value="<?php echo $nic;?>" readonly>   
                    </div>
                    <div class="form-group">
                    <label>Full Name</label>    
                    <input type="text" name="name" value="<?php echo $name;?>" readonly>   
                    </div>
                    <div class="form-group">
                    <label>DOB</label>
                    <input type="text" name="dob" value="<?php echo $dob;?>" readonly>     
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                   <label>Gender</label>
                   <input type="text" name="gender" value="<?php echo $gender;?>" readonly>     
                   </div>

                   <div class="form-group">
                   <label>Blood Type</label>
                   <input type="text" name="bgroup" value="<?php echo $bgroup;?>" readonly>     
                   </div>
                    
                    <div class="form-group">
                    <label>District</label>
                    <input type="text" name="district" value="<?php echo $district;?>" readonly>   
                    </div>

                </div>
                <center>
                <div class="form-group column100">
                    <label>Health Status (Old)</label>
                    <input type="text" name="district" value="<?php echo $status;?>" readonly>   
                </div>
                
                    <input type="submit" name="submit" class="button btn-edit">
                </center>
            </form>
            
        </div>
    </div>

<?php include '../../footer.php'; ?>