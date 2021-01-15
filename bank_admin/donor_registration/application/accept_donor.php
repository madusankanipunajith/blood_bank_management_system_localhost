<?php
    session_start();
	require '../../../config.php';
	$volume_table=$volume=$encryption_purpose=$valid=$bgroup=$nic=$id="";
    $volume_err=$bgroup_err="";

	$date= date("Y-m-d");
	putenv("TZ=Asia/Colombo");
	$t=time();$time=date('H:i:sa',$t);
	$bankid=$_SESSION["id-3"];$place= $_SESSION['place'];

	if (isset($_GET['nic'])) {
    $nic = $_GET['nic'];
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //validate volume
        if(empty(trim($_POST["volume"])))
        {
            $volume_err="empty";
        }
        else{
            $volume=trim($_POST["volume"]);
        }
        //validate blood group
        if(empty(trim($_POST["bgroup"])))
        {
            $bgroup_err="empty";
        }
        else{
            $bgroup=trim($_POST["bgroup"]);
        }
        $valid= $_POST["valid"];

        if (!empty(trim($_POST["case"]))) {
            $simple_string= $_POST["case"];

            // Store the cipher method 
            $ciphering = "AES-128-CTR"; 
  
            // Use OpenSSl Encryption method 
            $iv_length = openssl_cipher_iv_length($ciphering); 
            $options = 0; 
  
            // Non-NULL Initialization Vector for encryption 
            $encryption_iv = '1234567891011121'; 
  
            // Store the encryption key 
            $encryption_key = "Yuthukamabloodbanksystem"; 
  
            // Use openssl_encrypt() function to encrypt the data 
            $encryption_purpose = openssl_encrypt($simple_string, $ciphering, 
            $encryption_key, $options, $encryption_iv); 
        }
        

        if (empty($volume_err) && empty($bgroup_err)) {
            $sql2= "UPDATE donor SET bloodgroup='$bgroup', validation='$valid', status='$encryption_purpose' WHERE nic='$nic'";
            mysqli_query($link, $sql2);
           if ($place=='hospital') {
                $sql3="INSERT INTO donate_hospital (HospitalID, DonorID, Dates, Tme, Volume) VALUES ('$bankid','$nic','$date','$time','$volume') ";
                mysqli_query($link, $sql3);
                $sql4="SELECT DonorID FROM donor_satisfaction WHERE HospitalID='$bankid' AND DonorID='$nic'";
                    if($result4=mysqli_query($link, $sql4)){
                        $count=mysqli_num_rows($result4);
                        if ($count==0) {
                            $sql5="INSERT INTO donor_satisfaction (DonorID,HospitalID,Satisfaction,Validation) VALUES ('$nic','$bankid','0','$valid')";
                            mysqli_query($link, $sql5);
                        }else{
                            $sql5="UPDATE donor_satisfaction SET Validation='$valid' WHERE HospitalID='$bankid' AND DonorID='$nic'";
                            mysqli_query($link, $sql5);
                        }
                    }
                
            }else{
                $campid=$_SESSION['id'];
                $sql2="INSERT INTO donate_campaign (CampID, DonorID, Volume) VALUES ('$campid','$nic','$volume')";
                mysqli_query($link, $sql2);
           }

           $sql6="SELECT a.Volume AS Volume, a.BloodID AS ID FROM blood_stock a INNER JOIN blood b ON a.BloodID=b.BloodID WHERE a.StockID='$bankid' AND b.Type='$bgroup'";
                $result6=mysqli_query($link, $sql6);
                while($row = mysqli_fetch_assoc($result6)){$volume_table=$row["Volume"];$id=$row["ID"];}
                $temp_volume_int=(int)$volume_table+(int)$volume;
                $sql7="UPDATE blood_stock SET Volume='$temp_volume_int' WHERE BloodID='$id' AND StockID='$bankid'";

                if($result7=mysqli_query($link, $sql7)){
                    header("location: ../select_donor?add=ok");
                }else{
                    echo "Something went wrong. Cannot Update";
                }    

       }else{
       	header("Location: ../accept_donor?vol=$volume_err&bg=$bgroup_err&nic=$nic");
       }
    }else{
    	header("Location: ../../../reg_login.php");
    }


// Close connection
mysqli_close($link);

?>