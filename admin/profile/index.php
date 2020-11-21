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
                        echo "<center><p style=\"color:green;\">Password Changed Succesfully !!!</p></center>";
                    }
                    if (isset($_GET['user'])) {
                        echo "<center><p style=\"color:green;\">User name is Changed Succesfully !!!</p></center>";
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
