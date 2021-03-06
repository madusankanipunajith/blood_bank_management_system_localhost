<?php
	
require '../session.php';
// Include config file
require_once "../../config.php";
 
// Define variables and initialize with empty values
$name = $location = $estimate= $date =$time= $hosid="";
$name_err = $location_err = $estimate_err= $date_err = $time_err= $hosid_err="";

$today=date("Y-m-d");

// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){unset_cache();
	
    if (isset($_GET['hosid'])) {$hosid= $_GET['hosid'];}

	// Check if campaign name is empty
    if(empty(trim($_POST["campaign_name"]))){
        $name_err = "Please enter your campaign name.";
        set_camp_name_err($name_err);
    } else{
        $name = trim($_POST["campaign_name"]);
        set_camp_name($name);
    }
    // Check if location is empty
    if(empty(trim($_POST["location"]))){
        $location_err = "Please enter your location.";
        set_location_err($location_err);
    } else{
        $location = trim($_POST["location"]);
        set_location($location);
    }
    // Check if estimation is empty
    if(empty(trim($_POST["estimate"]))){
        $estimate_err = "Please enter your estimation roughly.";
        set_estimate_err($estimate_err);
    } else{
        $estimate = trim($_POST["estimate"]);
        set_estimate($estimate);
    }
    // Check if date is empty
    if(empty(trim($_POST["date"]))){
        $date_err = "Please enter your date.";
        set_camp_date_err($date_err); 
    }else{
        $date = trim($_POST["date"]);
        set_camp_date($date);
    }
    // Check if time is empty
    if(empty(trim($_POST["time"]))){
        $time_err = "Please enter your time.";
        set_camp_time_err($time_err);
    } else{
        $time = trim($_POST["time"]);
        set_camp_time($time);
    }

    //check the errors before inserting database
        if(empty($name_err) && empty($location_err) && empty($estimate_err) && empty($date_err) && empty($time_err)){
        	//prepare insert statemet
            $sql= "INSERT INTO campaign (Name, Location, Estimate, Dates, Tme, BHospitalID, OrganizationID) VALUES(?, ?, ?, ?, ?, ?, ?)";

            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"sssssss",$name,$location,$estimate,$date,$time, $hosid, $param_username);
                
                //set parameters
                $param_username=$_SESSION["id-4"];

                //execute the prepare statement
                if(mysqli_stmt_execute($stmt))
                {
                    // Redirect to login page
                    unset($_SESSION['hosid']);unset($_SESSION['hosname']);
                    unset_cache();
                    header("location: ../add-campaign/index?reg=ok");
                }
                else{
                    echo "Something went wrong, please try again later";
                }
                //close statement
                mysqli_stmt_close($stmt);

            }
        }else{
            header("Location:../add-campaign/more_info?hos=$hosid_err&name=$name_err&loc=$location_err&est=$estimate_err&date=$date_err&time=$time_err&hosid=$hosid&fname=$name&floc=$location&festimate=$estimate&ftime=$time&fdate=$date");
        }


	// Close connection
    mysqli_close($link);
}


?>