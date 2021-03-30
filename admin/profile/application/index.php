<?php
	require '../../session.php';

	$email=$user_name=$nic=$username_err=$username="";
    $email_err=$old_err=$new_err=$confirm_err="";
    if (isset($_SESSION["id-6"])) {
        $nic= $_SESSION["id-6"];
    }

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // validate username
        if(empty(trim($_POST["username"])))
        {
            $username_err="Please enter a user name";
            set_setting_user_err($username_err);

        }elseif(trim($_POST["username"])=="$nic"){
            $username=trim($_POST["username"]);
        }
        else
        {
            //prepare statement
            $sql2="SELECT UserName FROM super_admin WHERE UserName=?";
            if($stmt=mysqli_prepare($link,$sql2))
            {
                mysqli_stmt_bind_param($stmt,"s",$param_username);
                //set parameter
                $param_username=trim($_POST["username"]);

                //execute the prepare ststement
                if(mysqli_stmt_execute($stmt))
                {
                    //store the result
                    mysqli_stmt_store_result($stmt);
                    //count no of rows
                  
                    if(mysqli_stmt_num_rows($stmt)==1)
                    {
                        $username_err="This user name is already taken";
                        set_setting_user_err($username_err);
                    }
                    else{
                        $username=trim($_POST["username"]);
                        set_setting_user($username);
                    }
                }
                else{
                    echo "Something went wrong. Please try again later.";

                }
                //close the statement
                mysqli_stmt_close($stmt);


                
            }
        }

        //validate email
        if(empty(trim($_POST["email"])))
        {
            $email_err="Please enter the Email";
            set_setting_email_err($email_err);
        }
        else{
            $email=trim($_POST["email"]);
            set_setting_email($email);
        }

        if (empty($username_err) && empty($email_err)) {
            $sql3="UPDATE super_admin SET UserName='$username', Email='$email' WHERE UserName='$nic'";
            if ($result=mysqli_query($link, $sql3)) {
                $_SESSION["id-6"]=$username;
                unset_cache();
                header("Location: ../index?user=ok");
            }else{
                echo "Cannot update plz check again";
            }
        }else{
        	header("Location: ../index");
        }
    }

    mysqli_close($link);
?>