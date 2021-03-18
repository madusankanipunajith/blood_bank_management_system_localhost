<?php
require "../../session.php";
?>

<?php
 $nics = $_SESSION["id_card3"];
 $nic= strtoupper($nics);
 // Initialization
$old_err=$new_err=$confirm_err="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {unset_cache();
    	//validate organization name
        if(empty(trim($_POST["old"])))
        {
            $old_err="Please enter the Old Password";
            set_old_password_err($old_err);
        }
        else{
            $password= $_POST["old"];
            $sql = "SELECT Password FROM blood_bank_admin WHERE NIC= '$nic'";
            if ($stmt = mysqli_prepare($link, $sql)) {
            	if (mysqli_stmt_execute($stmt)) {
            		mysqli_stmt_store_result($stmt);
            			if(mysqli_stmt_num_rows($stmt) == 1){
            				mysqli_stmt_bind_result($stmt, $hashed_password);
            					if(mysqli_stmt_fetch($stmt)){
            						if(password_verify($password, $hashed_password)){
            							$old=trim($_POST["old"]);
                                        set_old_password($old);
            						}else{
            							$old_err="Entered Password is not matched";
                                        set_old_password_err($old_err);
            						}
            					}
            			}else{
            				$server_err= "There is an execution problem";
            			}
            	}
            }
        }

        //validation of password
        if (isset($_SESSION['password_pattern'])) {
             $pattern = $_SESSION['password_pattern'];
         } 
     
        if(empty(trim($_POST["new"])))
        {
            $new_err="Please enter the new password";
            set_new_password_err($new_err);
        }
        elseif(strlen(trim($_POST["new"])) < 8)
        {
            $new_err="Password must have at least 8 characters";
            set_new_password_err($new_err);
        }elseif(!preg_match_all($pattern,trim($_POST["new"]))){
            $password_err = "Password must contain at least a number, uppercase letter, lowercase letter and special character"; //verify($enter_password)
            set_new_password_err($password_err);
        }
        else{
            $new=trim($_POST["new"]);
            set_new_password($new);
        }
        //validation of confirm password
        if(empty(trim($_POST["confirm"])))
        {
            $confirm_err= "Please enter the confirm password";
            set_confirm_password_err($confirm_err);
        }
        else
        {
            $confirm=trim($_POST["confirm"]);
            if(empty($new_err)&&($new!=$confirm))
            {
                $confirm_err="Passwords did not match";
                set_confirm_password_err($confirm_err);
            }else{
                set_confirm_password($confirm);
            }
        }

        if (empty($old_err) && empty($new_err) && empty($confirm_err) && empty($server_err)) {
        	 $param_password=password_hash($new, PASSWORD_DEFAULT);
        	$sql2= "UPDATE blood_bank_admin SET Password='$param_password' WHERE NIC='$nic'";
        	if (mysqli_query($link, $sql2)) {
        		// Redirect to update page
                unset_cache();
                header("location: ../edit_admin?password=ok");

        	}else{echo "Something went wrong";}
        }else{
            header("Location: ../edit_password");
        }


    }

    // Close connection
    mysqli_close($link);
?>