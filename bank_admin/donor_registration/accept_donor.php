<?php

    require "../session.php";
    require ('../header.php');
    require '../encrypt.php';
?>
<?php
$nic=$bgroup=$name=$dob=$district=$status=$place="";
$hosid=$_SESSION['id-3'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (!empty(trim($_POST['serial_num']))) {
        $serial_num= $_POST['serial_num'];
    }else{
        $serial_err="Enter the Serial Number";
    }
    if (!empty(trim($_POST['bag_num']))) {
        $bag_num= $_POST['bag_num'];
    }else{
        $bag_err="Enter the Bag Number";
    }

    if (empty($serial_err) && empty($bag_err)) {

        $_SESSION['serial_num']=$serial_num;
        $_SESSION['bag_num']= $bag_num;

        $sql2="SELECT DonateID FROM donate_hospital WHERE SerialNumber='$serial_num' AND PacketNumber='$bag_num' AND HospitalID='$hosid'";
        $result2= mysqli_query($link, $sql2);
            if (mysqli_num_rows($result2) == 0) {
            $sql3="SELECT DonateID FROM donate_campaign WHERE SerialNumber='$serial_num' AND PacketNumber='$bag_num' AND HospitalID='$hosid'";
            $result3= mysqli_query($link, $sql3);
            if (mysqli_num_rows($result3) > 0){
                $sql="SELECT a.nic AS nic, a.first_name AS first_name, a.last_name AS last_name, a.dob AS dob,a.bloodgroup AS bloodgroup,a.district AS district,a.status AS status, b.PacketNumber AS PacketNumber, b.SerialNumber AS SerialNumber, b.ExpDate AS ExpDate FROM donor a INNER JOIN donate_campaign b ON a.nic=b.DonorID WHERE b.PacketNumber='$bag_num' AND b.SerialNumber='$serial_num' AND b.HospitalID='$hosid'";
                $result= mysqli_query($link, $sql);$place="campaign";
            }else{
            header("Location: insert_number?fail=ok");
            //    echo "$serial_num";echo "$bag_num";echo "$hosid";
            }
        }else{
            $sql="SELECT a.nic AS nic, a.first_name AS first_name, a.last_name AS last_name, a.dob AS dob,a.bloodgroup AS bloodgroup,a.district AS district,a.status AS status, b.PacketNumber AS PacketNumber, b.SerialNumber AS SerialNumber, b.ExpDate AS ExpDate FROM donor a INNER JOIN donate_hospital b ON a.nic=b.DonorID WHERE b.PacketNumber='$bag_num' AND b.SerialNumber='$serial_num' AND b.HospitalID='$hosid' ";
            $result= mysqli_query($link, $sql);$place="hospital";
        }
    }else{
        header("Location: insert_number?serial=$serial_err&bag=$bag_err");
    }


//query
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    
        $firstname = $row["first_name"];
        $lastname = $row["last_name"];
        $name= $firstname." ".$lastname;
        $nic= $row["nic"];
        $dob= $row["dob"];
        $bgroup = $row["bloodgroup"];
        $district = $row["district"];
        $encryption = $row["status"];
        $serial_number= $row["SerialNumber"];
        $bag_number= $row["PacketNumber"];
        $exp_date= $row["ExpDate"];
        $purpose= Decrypt($encryption);

        }
}else{
    echo "Something went wrong while loading...";
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
                <div class="form-style-2-heading">Donor Registration  (<?php echo "Belongs to $place";?>)</div>
            </div>
            
        <form action="application/accept_donor.php?place=<?php echo $place;?>" method="post" style="margin-left: 20px; margin-right: 20px; margin-top: 40px;">
                <div class="form-row">
                    <div class="form-group">
                    <label>Serial Number</label>
                    <input type="text" name="serial_num" value="<?php echo $serial_number; ?>" readonly> 
                    </div>
                    <div class="form-group">
                    <label>Packet Number</label>
                    <input type="text" name="bag_num" value="<?php echo $bag_number; ?>" readonly> 
                    </div>
                    <div class="form-group">
                        <label>Blood Type</label>
                            <input type="text" name="bgroup" value="<?php echo $bgroup; ?>" readonly>    
                    </div>
                    <div class="form-group ">
                        <label>Exp Date</label>
                            <input type="text" name="exp_date" value="<?php echo $exp_date; ?>" readonly>    
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

                    <div class="form-group">
                    <label>District</label>
                    <input type="text" name="district" value="<?php echo $district;?>" readonly>     
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                    <label>Cases (If Any)</label>
                    <textarea name="case" rows="4" cols="108" style="resize: none;" ><?php echo "$purpose"; ?></textarea>
                    </div><div class="form-group"></div>
                    
                    <div class="form-group">
                     <label>Validation</label>    
                            <select name="valid" class="form-control">
                                <option value="1">Valid</option>
                                <option value="0">InValid</option>
                            </select>  
                    </div>
                    
                </div>
                <center>
                    <input type="submit" name="submit" class="button btn-edit">
                    <a href="insert_number" style="color: #808080; font-size: 15px;"><i class="fa fa-backward"></i>Back</a>
                </center>
            </form>
            
        </div>
    </div>

<?php include '../../footer.php'; ?>
