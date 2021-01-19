<?php
    require '../../session.php';
    require '../../encrypt.php';
	$volume_table=$encryption_purpose=$valid=$nic=$id=$place=$serial_number=$packet_number="";

	$date= date("Y-m-d");
	putenv("TZ=Asia/Colombo");
	$t=time();$time=date('H:i:sa',$t);
	$bankid=$_SESSION["id-3"];//$place= $_SESSION['place'];

	if (isset($_GET['place'])) {
    $place = $_GET['place'];
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $serial_number= $_POST["serial_num"];
        $packet_number= $_POST["bag_num"];
        $bgroup= $_POST["bgroup"];
        $nic= $_POST["nic"];
        $valid= $_POST["valid"];

        if (!empty(trim($_POST["case"]))) {
            $simple_string= $_POST["case"];
            $encryption_purpose= Decrypt($simple_string);

/*
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
            $encryption_key, $options, $encryption_iv); */
        }
        

            $sql2= "UPDATE donor SET  validation='$valid', status='$encryption_purpose' WHERE nic='$nic'";
            mysqli_query($link, $sql2);
           if ($place=='hospital') {echo "hiiiii";
                
                $sql3="UPDATE donate_hospital SET Valid='$valid' WHERE SerialNumber='$serial_number' AND PacketNumber='$packet_number'";
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
                $sql2="UPDATE donate_campaign SET Valid='$valid' WHERE SerialNumber='$serial_number' AND PacketNumber='$packet_number'";
                mysqli_query($link, $sql2);
           }

           if ($valid==1) {
               $sql6="SELECT a.Volume AS Volume, a.BloodID AS ID FROM blood_stock a INNER JOIN blood b ON a.BloodID=b.BloodID WHERE a.StockID='$bankid' AND b.Type='$bgroup'";
                $result6=mysqli_query($link, $sql6);
                while($row = mysqli_fetch_assoc($result6)){$volume_table=$row["Volume"];$id=$row["ID"];}
                $temp_volume_int=(int)$volume_table+1;
                $sql7="UPDATE blood_stock SET Volume='$temp_volume_int' WHERE BloodID='$id' AND StockID='$bankid'";

                if($result7=mysqli_query($link, $sql7)){
                    header("location: ../insert_number?add=ok");
                }else{
                    echo "Something went wrong. Cannot Update";
                }    
           }else{
            header("Location: ../insert_number?reject=ok");
           }

       
    }else{
    	header("Location: ../../../reg_login.php");
    }


// Close connection
mysqli_close($link);

?>