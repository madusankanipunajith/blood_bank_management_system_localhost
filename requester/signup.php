<?php

    // Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$nic = $password = $confirm_password = $first_name = $last_name = $dob = $gender = $addline1 = $addline2 = $telephone = $district = $email="";
$nic_err = $password_err = $confirm_password_err = $first_name_err = $last_name_err = $dob_err = $gender_err = $addline1_err = $addline2_err = $telephone_err = $district_err = $email_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["nic"]))){
        $nic_err = "Please enter a username.";
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
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
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
                header("location: ../reg_login.php?reg=ok");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}


	require ('../header.php');
?>


<body>

            <div class="signup-content">
                <div class="signup-form">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="register-form" id="register-form">
                       <center> <h2>Requester registration form</h2></center><br>
                        <div class="form-row">
                            <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control">
                                <span class="help-block"><?php echo $first_name_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control">
                                <span class="help-block"><?php echo $last_name_err; ?></span>
                            </div>
                        </div>
                        <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                            <label>National Identification Number (NIC)</label>
                            <input type="text" name="nic" class="form-control">
                            <span class="help-block"><?php echo $nic_err; ?></span>
                        </div>    
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                            <span class="help-block"><?php echo $email_err; ?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control">
                            <span class="help-block"><?php echo $dob_err; ?></span>
                        </div>
                        
                        <div class="form-group">
                            <label>Gender</label>
                            <select id="gender" name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <span class="help-block"><?php echo $gender_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>">
                            <label>District</label>
                            <select id="location" name="district" class="form-control">
                                <option value=""></option>
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticoloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Mullativu">Mullativu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavniya">Vavniya</option>
                            </select>
                            <span class="help-block"><?php echo $district_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($addline1_err)) ? 'has-error' : ''; ?>">
                            <label>Address Line 1</label>
                            <input type="text" name="addline1" class="form-control">
                            <span class="help-block"><?php echo $addline1_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Address Line 2 (Optional)</label>
                            <input type="text" name="addline2" class="form-control">
                            <span class="help-block"><?php echo $addline2_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($telephone_err)) ? 'has-error' : ''; ?>">
                            <label>Telephone</label>
                            <input type="number" name="telephone" class="form-control">
                            <span class="help-block"><?php echo $telephone_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Telephone (Optional)</label>
                            <input type="number" name="telephone-2" class="form-control">
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control">
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <input type="reset" class="btn btn-default" value="Reset">
                        </div>
                        <p>Already have an account? <a href="../login/requester" style="color: #F78181">Login here</a>.</p>
                    </form>
                </div>
            </div>

	
<?php include '../footer.php'; ?>