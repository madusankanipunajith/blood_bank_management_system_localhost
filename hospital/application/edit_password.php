<?php 
   require_once "../session.php";
   $data=$_SESSION["id-5"];
   //initialize variables
   $old_err=$new_err=$confirm_err="";
   if($_SERVER["REQUEST_METHOD"]=="POST")
   {
       //validate hospital
       if(empty(trim($_POST["old"])))
       {
           $old_err="Please enter the old password";
       }
       else
       {
           $old_password=trim($_POST["old"]);
           $sql = "SELECT Password FROM normal_hospital WHERE UserName=? ";
           if($stmt=mysqli_prepare($link,$sql))
           {
               mysqli_stmt_bind_param($stmt,"s",$data);
               if(mysqli_stmt_execute($stmt))
               {
                   //store the result
                   mysqli_stmt_store_result($stmt);
                   if(mysqli_stmt_num_rows($stmt)==1)
                   {
                       mysqli_stmt_bind_result($stmt,$hashPassword);
                       if(mysqli_stmt_fetch($stmt))
                       {
                           if(password_verify($old_password,$hashPassword))
                           {
                               $old = trim($_POST["old"]);
                           }
                           else
                           {
                               $old_err="Password is not match";
                           }
                       }
                   }
                   else
                   {
                       echo "Execution problem";
                   }

               }
           }

       }

       //validate new password
       if(empty(trim($_POST['new'])))
       {
           $new_err="Please enter new password";
       }
       elseif(strlen(trim($_POST['new']))<6)
       {
           $new_err ="Please enter valid password";
       }
       else
       {
           $new_password=trim($_POST['new']);
       }
       //validate confirm password
       if(empty(trim($_POST['confirm'])))
       {
           $confirm_err = "Please enter confirm password";
       }
       elseif($new_password!=trim($_POST['confirm']))
       {
           $confirm_err="Password did not match";
       }
       else
       {
           $confirm_pass=trim($_POST['confrim']);
       }

       if(empty($new_err) && empty($confirm_err) && empty($old_err))
       {
           $sql1 = "UPDATE normal_hospital SET Password=? WHERE UserName=?";
           if($stmt=mysqli_prepare($link,$sql1))
           {
               mysqli_stmt_bind_param($stmt,"ss",$param_pass,$param_user);
               $param_pass=password_hash($new_password, PASSWORD_DEFAULT);
               $param_user=$data;
               if(mysqli_stmt_execute($stmt))
               {
                   header("location: ../../reg_login.php");
               }
               else
               {
                   echo "something went wrong";
               }
           }
           else
           {
               echo "something went wrong";
           }
       }
       else
       {
           header("location: ../profile/edit_password.php?old=$old_err&new=$new_password&conf=$confirm_pass");
       }
    }

   mysqli_close($link);

?>