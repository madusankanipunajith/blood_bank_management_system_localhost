<?php
   require '../session.php';
   include '../header.php'; 


?>

<?php
    $email=$user_name=$nic=$username_err=$username="";
    $email_err=$old_err=$new_err=$confirm_err="";
    if (isset($_SESSION["id-6"])) {
        $nic= $_SESSION["id-6"];
    }

    $sql="SELECT Email FROM super_admin WHERE UserName='$nic'";
    $result=mysqli_query($link, $sql);
    while ($row=mysqli_fetch_assoc($result)) {
        $email= $row["Email"];
    }

    /*
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // validate username
        if(empty(trim($_POST["username"])))
        {
            $username_err="Please enter a user name";

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
                    }
                    else{
                        $username=trim($_POST["username"]);
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
        }
        else{
            $email=trim($_POST["email"]);
        }

        if (empty($username_err) && empty($email_err)) {
            $sql3="UPDATE super_admin SET UserName='$username', Email='$email' WHERE UserName='$nic'";
            if ($result=mysqli_query($link, $sql3)) {
                $_SESSION["id-6"]=$username;
                header("Location: index?user=ok");
            }else{
                echo "Cannot update plz check again";
            }
        }
    }
    */

    mysqli_close($link);
?>

<body>
	

	<div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>

        <div class="main clearfix">
            <div class="topic" style="margin-top: 0px;">
                <div class="form-style-2-heading">Settings</div>
                <?php
                    if (isset($_GET['password'])) {
                        echo "<center><h5 style=\"color:green;\">Password Changed Succesfully !!!</h5></center>";
                    }
                    if (isset($_GET['user'])) {
                        echo "<center><h5 style=\"color:green;\">User name is Changed Succesfully !!!</h5></center>";
                    }
                    if (isset($_GET['users']) || isset($_GET['email'])) {
                        $email_err= $_GET['email'];
                        $username_err= $_GET['users'];
                    }
                    if (isset($_GET['old']) || isset($_GET['new']) || isset($_GET['confirm'])) {
                        $old_err=$_GET['old'];
                        $new_err=$_GET['new'];
                        $confirm_err=$_GET['confirm'];
                    }
                ?>
                <center>
                <form action="application/index.php" method="post">
                
                    <div class="form-row">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>User Name</label>
                            <input type="text" name="username" value="<?php echo $nic;?>">
                            <span style="font-size: 15px;"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo $email;?>">
                            <span style="font-size: 15px;"><?php echo $email_err; ?></span>
                        </div>

                    </div>
                
                <input type="submit" name="change_nic" value="Change">
                </form>
            </center>

            </div>
            <br>
            <div class="form-style-2-heading"></div>
            <center>
            <form action="application/edit_password.php" method="post">
                
                    <div class="form-group <?php echo (!empty($old_err)) ? 'has-error' : ''; ?>">
                        <label>Old Password</label>
                        <input type="password" name="old" >
                    </div>
                
                <div class="form-row" style="width: 70%;">
                    <div class="form-group <?php echo (!empty($new_err)) ? 'has-error' : ''; ?>">
                        <label>New Password</label>
                        <input type="password" name="new" >
                    </div>
                    <div class="form-group <?php echo (!empty($confirm_err)) ? 'has-error' : ''; ?>">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm">
                    </div>
                </div>
                
                <input type="submit" name="change_pwd" value="Change">
            </form>
            </center>
            
        </div>
    </div>

</body>
