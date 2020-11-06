<?php
	require '../session.php';

	$hos=$time=$date="";
    $date_err=$time_err=$hos_err="";
//  $nic = htmlspecialchars($_SESSION["nic"]);
    $NIC = $_SESSION["id-1"];

    $today= date("Y-m-d");


	if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Check if date is empty
        if(empty(trim($_POST["date"]))){
            $date_err = "Please enter Date.";
        } else{
            $date = trim($_POST["date"]);
        }

        // Check if time is empty
        if(empty(trim($_POST["time"]))){
            $time_err = "Please enter Time.";
        } else{
            $time = trim($_POST["time"]);
        }

        // Check if hospital id is empty
        if(empty(trim($_POST["hosid"]))){
            $hos_err = "Please enter HospitalID.";
        } else{
            $hos = trim($_POST["hosid"]);
        }

        $sql2 = "SELECT Name FROM blood_bank_hospital WHERE HospitalID='$hos'";
        $result2=mysqli_query($link, $sql2); 
        if (mysqli_num_rows($result2) == 0) {
            $hos_err="There is no such a hospital";
        }
        

        // Validate credentials
        if(empty($date_err) && empty($time_err) && empty($hos_err)){

            $sql2 = "INSERT INTO donor_reservation (DonorID, Dates, Tme, HosID) VALUES (?, ?, ?, ?)";
            if($stmt = mysqli_prepare($link, $sql2)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $date, $time, $hos);
            
            // Set parameters
            $param_username = $NIC;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ../donate_blood/index.php?reg=ok");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        }else{
        	header("Location: ../donate_blood/index.php?date=$date_err&time=$time_err&hos=$hos_err");
        }

         // Close connection
        mysqli_close($link);

    }
?>