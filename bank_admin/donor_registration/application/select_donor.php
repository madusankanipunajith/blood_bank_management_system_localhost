<?php
    session_start();
	require '../../../config.php';
    $date= date("Y-m-d");
    putenv("TZ=Asia/Colombo");
    $t=time();$time=date('H:i:sa',$t);
    $place= $_SESSION['place'];
    $hosid= $_SESSION['id-3'];
    $campid=$_SESSION['id'];

	$nic_err=$bgroup_err=$donation_err=$nic=$donation_number=$bgroup="";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty(trim($_POST['nic'])) && !empty(trim($_POST['d_num'])) && !empty($_POST['bgroup'])){

            
            $sql= "SELECT nic FROM donor WHERE nic=?";

         if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"s",$param_username);
                //set parameter
                $param_username=trim($_POST["nic"]);

                //execute the prepare ststement
                if(mysqli_stmt_execute($stmt))
                {
                    //store the result
                    mysqli_stmt_store_result($stmt);
                    //count no of rows
                  
                    if(mysqli_stmt_num_rows($stmt)==0)
                    {
                        $nic_err="no account found";
                    }
                    else{
                    $nic=trim($_POST["nic"]);$donation_number=strtoupper(trim($_POST["d_num"]));$bgroup=trim($_POST["bgroup"]);
                    if ($place=='hospital') {
                        $sql2= "INSERT INTO donate_hospital (DonationNumber,HospitalID, DonorID, Dates, Tme) VALUES ('$donation_number','$hosid','$nic','$date','$time')";
                        $sql3="UPDATE donor SET bloodgroup='$bgroup' WHERE nic='$nic'";
                            mysqli_query($link, $sql2);mysqli_query($link, $sql3);
                        }else{
                        $sql2= "INSERT INTO donate_campaign (DonationNumber,CampID,HospitalID, DonorID, Dates) VALUES ('$donation_number','$id','$hosid','$nic','$date')";
                            mysqli_query($link, $sql2);    
                        }
                        
                        header("location: ../accept_donor?nic=$nic&donation_number=$donation_number");
                    }
                }
                else{
                    echo "Something went wrong. Please try again later.";

                }
                //close the statement
                mysqli_stmt_close($stmt);

            }

        }else{
            if (empty(trim($_POST['nic']))) {
                $nic_err="enter nic";
            }
            if (empty(trim($_POST['d_num']))) {
                $donation_err="enter donation number";
            }
            if (empty(trim($_POST['bgroup']))) {
                $bgroup_err="enter the blood group";
            }
        }

        if (!empty($nic_err) || !empty($donation_err) || !empty($bgroup_err) ) {
        	header("Location: ../select_donor?nic=$nic_err&donation=$donation_err&bgroup=$bgroup_err");
        }

    }else{
    	header("Location: ../../../reg_login.php");
    }

// Close connection
mysqli_close($link);


?>