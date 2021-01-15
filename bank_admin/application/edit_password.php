<?php
require "../session.php";
require '../header.php';
?>
<?php
 $nics = $_SESSION["id_card3"];
 $nic= strtoupper($nics);
 // Initialization
$old_err=$new_err=$confirm_err="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	//validate organization name
        if(empty(trim($_POST["old"])))
        {
            $old_err="Please enter the Old Password";
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
            						}else{
            							$old_err="Entered Password is not matched";
            						}
            					}
            			}else{
            				$server_err= "There is an execution problem";
            			}
            	}
            }
        }
        //validation of password 
        if(empty(trim($_POST["new"])))
        {
            $new_err="Please enter the new password";
        }
        elseif(strlen(trim($_POST["new"])) < 6)
        {
            $new_err="Please enter valid password";
        }
        else{
            $new=trim($_POST["new"]);
        }
        //validation of confirm password
        if(empty(trim($_POST["confirm"])))
        {
            $confirm_err= "Please enter the confirm password";
        }
        else
        {
            $confirm=trim($_POST["confirm"]);
            if(empty($new_err)&&($new!=$confirm))
            {
                $confirm_err="Passwords did not match";
            }
        }

        if (empty($old_err) && empty($new_err) && empty($confirm_err) && empty($server_err)) {
        	 $param_password=password_hash($new, PASSWORD_DEFAULT);
        	$sql2= "UPDATE blood_bank_admin SET Password='$param_password' WHERE NIC='$nic'";
        	if (mysqli_query($link, $sql2)) {
        		// Redirect to update page
                header("location: ../profile/edit_admin?password=ok");

        	}else{echo "Something went wrong";}
        }else{
            header("Location: ../profile/edit_password?old=$old_err&new=$new_err&conf=$confirm_err");
        }


    }

    // Close connection
    mysqli_close($link);
?>