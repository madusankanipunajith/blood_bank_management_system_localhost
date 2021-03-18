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
                    /*
                    if (isset($_GET['users']) || isset($_GET['email'])) {
                        $email_err= $_GET['email'];
                        $username_err= $_GET['users'];
                    }
                    
                    if (isset($_GET['old']) || isset($_GET['new']) || isset($_GET['confirm'])) {
                        $old_err=$_GET['old'];
                        $new_err=$_GET['new'];
                        $confirm_err=$_GET['confirm'];
                    }
                    */
                    $email_err= get_setting_email_err();
                    $username_err= get_setting_user_err();
                    $old_err= get_old_password_err();
                    $new_err= get_new_password_err();
                    $confirm_err= get_confirm_password_err();
                ?>
                <center>
                <form action="application/index.php" method="post">
                
                    <div class="form-row">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?> tooltip">
                            <label>User Name</label>
                            <input type="text" name="username" value="<?php echo isset($_SESSION["setting_user"])?$_SESSION["setting_user"]:"$nic"; ?>" required>
                            <span class="tooltiptext tooltip_font"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?> tooltip">
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo isset($_SESSION["setting_email"])?$_SESSION["setting_email"]:"$email"; ?>" required>
                             <span class="tooltiptext tooltip_font"><?php echo $email_err;?></span>
                        </div>

                    </div>
                
                <input class="button btn-delete" type="submit" name="change_nic" value="Change">
                </form>
            </center>

            </div>
            <br>
            <div class="form-style-2-heading"></div>
            <center>
            <form action="application/edit_password.php" method="post">
                
                    <div class="form-group <?php echo (!empty($old_err)) ? 'has-error' : ''; ?> tooltip">
                        <label>Old Password<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span></label>
                        <input type="password" name="old" value="<?php echo isset($_SESSION["old_password"])?$_SESSION["old_password"]:""; ?>" id="pass_log_id" required>
                        <span class="tooltiptext tooltip_font"><?php echo $old_err;?></span>
                    </div>
                
                <div class="form-row" style="width: 70%;">
                    <div class="form-group <?php echo (!empty($new_err)) ? 'has-error' : ''; ?> tooltip">
                        <label>New Password <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span></label>
                        <input type="password" name="new" value="<?php echo isset($_SESSION["new_password"])?$_SESSION["new_password"]:""; ?>" id="pass_log_id" required>
                         <span class="tooltiptext tooltip_font"><?php echo $new_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($confirm_err)) ? 'has-error' : ''; ?> tooltip">
                        <label>Confirm Password<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span></label>
                        <input type="password" name="confirm" value="<?php echo isset($_SESSION["confirm_password"])?$_SESSION["confirm_password"]:""; ?>" id="pass_log_id" required>
                         <span class="tooltiptext tooltip_font"><?php echo $confirm_err;?></span>
                    </div>
                </div>
                
                <input class="button btn-delete" type="submit" name="change_pwd" value="Change">
            </form>
            </center>
            
        </div>
    </div>

<?php include '../../footer.php'; ?>
