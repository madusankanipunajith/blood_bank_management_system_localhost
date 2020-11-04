<?php
	session_start();
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["id-4"]) || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../reg_login.php");
    exit;
}

// Include config file
require_once "../../config.php";
 
// Define variables and initialize with empty values
$name = $location = $estimate= $date =$time= $hosid="";
$name_err = $location_err = $estimate_err= $date_err = $time_err= $hosid_err="";

$today=date("Y-m-d");

// queries
    $sql = "SELECT HospitalID, Name, District FROM blood_bank_hospital";
    $result = mysqli_query($link, $sql);

// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){
	// Check if hosid is empty
    if(empty(trim($_POST["hosid"]))){
        $hosid_err = "Please enter your blood bank hospital ID from the given table.";
    }else{
     	//prepare statement
            $sql="SELECT Name FROM blood_bank_hospital WHERE HospitalID=?";
            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"s",$param_id);
                //set parameter
                $param_id=trim($_POST["hosid"]);

                //execute the prepare ststement
                if(mysqli_stmt_execute($stmt))
                {
                    //store the result
                    mysqli_stmt_store_result($stmt);
                    //count no of rows
                  
                    if(mysqli_stmt_num_rows($stmt)==0)
                    {
                        $hosid_err="There is no such a Hospital. please check the table again";
                    }
                    else{
                        $hosid=trim($_POST["hosid"]);
                    }
                }
                else{
                    echo "Something went wrong. Please try again later.";

                }
                //close the statement
                mysqli_stmt_close($stmt);
				}   
	
		}



	// Check if campaign name is empty
    if(empty(trim($_POST["campaign_name"]))){
        $name_err = "Please enter your campaign name.";
    } else{
        $name = trim($_POST["campaign_name"]);
    }
    // Check if location is empty
    if(empty(trim($_POST["location"]))){
        $location_err = "Please enter your location.";
    } else{
        $location = trim($_POST["location"]);
    }
    // Check if estimation is empty
    if(empty(trim($_POST["estimate"]))){
        $estimate_err = "Please enter your estimation roughly.";
    } else{
        $estimate = trim($_POST["estimate"]);
    }
    // Check if date is empty
    if(empty(trim($_POST["date"]))){
        $date_err = "Please enter your date.";
    }else{
        $date = trim($_POST["date"]);
    }
    // Check if time is empty
    if(empty(trim($_POST["time"]))){
        $time_err = "Please enter your time.";
    } else{
        $time = trim($_POST["time"]);
    }

    //check the errors before inserting database
        if(empty($hosid_err)&& empty($name_err) && empty($location_err) && empty($estimate_err) && empty($date_err) && empty($time_err)){
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
                    header("location: ../index?reg=ok");
                }
                else{
                    echo "Something went wrong, please try again later";
                }
                //close statement
                mysqli_stmt_close($stmt);

            }
        }else{
            header("Location:../add-campaign?hos=$hosid_err&name=$name_err&loc=$location_err&est=$estimate_err&date=$date_err&time=$time_err");
        }


	// Close connection
    mysqli_close($link);
}


?>