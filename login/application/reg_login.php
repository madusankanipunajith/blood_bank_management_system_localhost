<?php
session_start();

if(isset($_SESSION["id-1"]) && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("Location: ../../donor/index");
  exit;
}
if(isset($_SESSION["id-2"]) && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("Location: ../../requester/index.php");
  exit;
}
if(isset($_SESSION["id-4"]) && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("Location: ../../organization/index");
  exit;
}
if(isset($_SESSION["id-5"]) && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("Location: ../../hospital/index");
  exit;
}
if(isset($_SESSION["id-3"]) && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("Location: ../../bank_admin/index");
  exit;
}
// Include config file
require_once "../../config.php";
 
// Define variables and initialize with empty values
$nic = $password = $name= "";
$nic_err = $password_err = "";
 
// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['donor']) || isset($_POST['requester']) || isset($_POST['admins'])){

    // Check if NIC is empty
        if(empty(trim($_POST["nic"]))){
            $nic_err = "Please enter nic.";
        }else{
            $nic = trim($_POST["nic"]);
            $id_card= $nic;
        }

    }else{
    // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $nic_err = "Please enter username.";
        }else{
            $nic = trim($_POST["username"]);
        }

    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($nic_err) && empty($password_err)){

        // Prepare a select statement
        if(isset($_POST['donor'])) {
            $sql = "SELECT nic, first_name, password FROM donor WHERE nic = ?";
        }elseif (isset($_POST['requester'])) {
            $sql = "SELECT NIC, FirstName, Password FROM requestor WHERE NIC = ?";
        }elseif(isset($_POST['admins'])){
            $sql = "SELECT BloodBankID, FirstName, Password FROM blood_bank_admin WHERE NIC = ?";
        }elseif(isset($_POST['organization'])) {
            $sql = "SELECT UserName, OrganizationName, Password FROM organization WHERE UserName = ?";
        }elseif(isset($_POST['hospital'])){
            $sql = "SELECT UserName, Name, Password FROM normal_hospital WHERE UserName = ?";
        }else{
           $sql = "SELECT UserName, SID, Password FROM super_admin WHERE UserName = ?";
        }
       
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

                    mysqli_stmt_bind_result($stmt, $id, $nic, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["nic"] = $nic;                           
                            
                            // Redirect user to welcome page
                            if(isset($_POST['donor'])){
                                $_SESSION["id-1"] = $id;
                                $_SESSION["id_card"] = $id_card;
                                header("location: ../../donor/index");
                            }elseif (isset($_POST['requester'])) {
                                $_SESSION["id-2"] = $id;
                                $_SESSION["id_card2"] = $id_card;
                                header("location: ../../requester/index");
                            }elseif (isset($_POST['admins'])) {
                                $_SESSION["id-3"] = $id;
                                $_SESSION["id_card3"] = $id_card;
                                header("location: ../../bank_admin/index");
                            }elseif (isset($_POST['organization'])) {
                                $_SESSION["id-4"] = $id;
                                header("location: ../../organization/index");
                            }elseif (isset($_POST['hospital'])) {
                                $_SESSION["id-5"] = $id; 
                                header("Location: ../../hospital/index");
                            }else{
                                $_SESSION["id-6"] = $id; 
                                header("Location: ../../admin/index");
                            }
                            
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $nic_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    	
        if (!empty($nic_err) || !empty($password_err)) {
            if (isset($_POST['donor'])) {
            header("Location: ../donor.php?donor=ok&nic=$nic_err&pass=$password_err");
            }elseif (isset($_POST['requester'])) {
            header("Location: ../requester.php?requester=ok&nic=$nic_err&pass=$password_err");
            }elseif (isset($_POST['admins'])) {
            header("Location: ../admin.php?admin=ok&nic=$nic_err&pass=$password_err");
            }elseif (isset($_POST['hospital'])) {
            header("Location: ../hospital.php?hospital=ok&nic=$nic_err&pass=$password_err");
            }elseif (isset($_POST['organization'])){
            header("Location: ../organization.php?organization=ok&nic=$nic_err&pass=$password_err");
            }else{
             header("Location: ../super_login.php?super=ok&nic=$nic_err&pass=$password_err");   
            }
        }

    
    
    // Close connection
    mysqli_close($link);
}

?>