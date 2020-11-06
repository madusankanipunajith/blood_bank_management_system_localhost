<html>
<head>
    <title>Super Admin Login</title>
    
</head>
<?php
	session_start();
    require_once "header.php";
    $nic_err = $password_err = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['nic'])) {
            $nic_err= $_GET['nic'];
        }
        if (isset($_GET['pass'])) {
            $password_err= $_GET['pass'];
        }
    }
	/*
        require_once "../config.php";
 
    // Define variables and initialize with empty values
    $password = $nic= "";
    $nic_err = $password_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['super-admin']){
        // Check if username is empty
        if(empty(trim($_POST["nic"]))){
            $nic_err = "Please enter username.";
        }else{
            $nic = trim($_POST["nic"]);
        }

        // Check if password is empty
        if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
        } else{
        $password = trim($_POST["password"]);
        }

        // Validate credentials
        if(empty($nic_err) && empty($password_err)){
            $sql = "SELECT UserName, Password FROM super_admin WHERE UserName = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $nic;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $nic, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        
                        if(password_verify($password, $hashed_password)){
                           // echo "HIIIII";
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id-6"] = $nic; 
                            header("location: admin/index"); 

                        }else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }

                    }

                }else{
                        // Display an error message if username doesn't exist
                        $nic_err = "No account found with that username.";
                }

            }else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
        // Close connection
        mysqli_close($link);
}
    */

?>



<body class="clearfix">
	<div class="form-style-2-heading">
		<h1><center>Super Admin Login</center></h1>
	</div>

	<center>
		<div id="SuperAdmin" class="tabcontent">
			<div class="form-style-2">
				<div class="form-style-2-heading">Welcome Super Admin !</div>
					<form action="application/reg_login.php" method="post">
            			<div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                            <label>User Name</label>
                            <input type="text" name="username" class="form-control">
                            <span class="help-block "><?php echo $nic_err; ?></span>
                        </div>
            			<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block "><?php echo $password_err; ?></span>
                        </div>

						<label><input type="submit" name="super-admin" class="btn btn-primary" value="Login"></label>
					</form>
                    <a href="../reset/enter_email.php?type=super-admin">Forgot Password?</a>
			</div>
		</div>
        <a href="../reg_login">Cancel</a>
	</center>

<?php include '../footer.php'; ?>