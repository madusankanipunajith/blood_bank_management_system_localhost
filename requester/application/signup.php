<?php
	require '../../config.php';

	// Define variables and initialize with empty values
$nic = $password = $confirm_password = $first_name = $last_name = $dob = $gender = $addline1 = $addline2 = $telephone = $district = $email="";
$nic_err = $password_err = $confirm_password_err = $first_name_err = $last_name_err = $dob_err = $gender_err = $addline1_err = $addline2_err = $telephone_err = $district_err = $email_err="";

	// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["nic"]))){
        $nic_err = "Please enter a username.";
    }elseif (strlen(trim($_POST["nic"])) > 12) {
        $nic_err = "Your NIC is not Valid.";
    } else{
        // Prepare a select statement
        $sql = "SELECT FirstName FROM requestor WHERE NIC = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["nic"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $nic_err = "This username is already taken.";
                } else{
                    $temp = trim($_POST["nic"]);
                    $nic = strtoupper($temp);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

		$pattern = ' ^.*(?=.{7,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$ ';
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    }
		elseif(!preg_match($pattern,trim($_POST["password"])))
				{
					 $password_err = "Password must contain at least a number, uppercase letter, lowercase letter and special character"; //verify($enter_password)
				}
		 else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

     // Validate firstname
    if(empty(trim($_POST["first_name"]))){
        $first_name_err = "Please enter a first name.";
    } else{
        $first_name = trim($_POST["first_name"]);
    }

    // Validate lastname
    if(empty(trim($_POST["last_name"]))){
        $last_name_err = "Please enter a last name.";
    } else{
        $last_name = trim($_POST["last_name"]);
    }

    // Validate dob
    if(empty(trim($_POST["dob"]))){
        $dob_err = "Please enter a dob.";
    } else{
        $dob = trim($_POST["dob"]);
    }


    // Validate Gender
    if(empty(trim($_POST["gender"]))){
        $gender_err = "Please enter your gender.";
    } else{
        $gender = trim($_POST["gender"]);
    }

    // Validate District
    if(empty(trim($_POST["district"]))){
        $district_err = "Please enter your district";
    } else{
        $district = trim($_POST["district"]);
    }

    // Validate Address
    if(empty(trim($_POST["addline1"]))){
        $addline1_err = "Please enter your address";
    } else{
        $addline1 = trim($_POST["addline1"]);
    }

     // Validate Email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email";
    } else{
        $email = trim($_POST["email"]);
    }

    // Validate Address 2
    $addline2 = trim($_POST["addline2"]);

    // Validate Telephone
    if(empty(trim($_POST["telephone"]))){
        $telephone_err = "Please enter your Telephone number";
    }elseif(strlen(trim($_POST["telephone"])) != 10){
        $telephone_err = "telephone number must be 10 numbers";
    } else{
        $telephone = trim($_POST["telephone"]);
    }

    $telephone2= trim($_POST["telephone-2"]);

    // Check input errors before inserting in database
    if(empty($nic_err) && empty($password_err) && empty($confirm_password_err) && empty($dob_err) && empty($gender_err) && empty($telephone_err) && empty($district_err) && empty($first_name_err) && empty($last_name_err) && empty($addline1_err) && empty($email_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO requestor (NIC, Password, FirstName, LastName, DateOfBirth, Gender, District, Lane1, Lane2, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss", $param_username, $param_password, $first_name, $last_name, $dob, $gender, $district, $addline1, $addline2, $email);

            // Set parameters
            $param_username = $nic;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $sql1= "INSERT INTO requestor_telephone (NIC, TelephoneNo, Flag) VALUES ('$nic', '$telephone', '1')";
                    if (mysqli_query($link, $sql1)){
                        if (!empty($telephone2)) {
                        $sql2= "INSERT INTO requestor_telephone (NIC, TelephoneNo, Flag) VALUES ('$nic', '$telephone2', '0')";
                            mysqli_query($link, $sql2);
                        }
                    }else{echo "Telephone1 errors";}
                // Redirect to login page
                header("location: ../../reg_login.php?reg=ok");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }else{
    	header("Location: ../signup?nic=$nic_err&first=$first_name_err&last=$last_name_err&dob=$dob_err&dis=$district_err&add=$addline1_err&tel=$telephone_err&email=$email_err&pass=$password_err&conf=$confirm_password_err");
    }

    // Close connection
    mysqli_close($link);
}else{
	header("Location: ../signup.php");
}
?>
