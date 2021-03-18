<?php
session_start();
require 'cache.php';
require '../config.php';
    $hos_err=$address_err=$district_err=$dr_err=$username_err=$mobile_err=$mobile2_err=$password_err=$confirm_password_err=$email_err="";
    /*if($_SERVER['REQUEST_METHOD']=="GET")
    {
        if (isset($_GET['hos'])) {$hos_err=$_GET['hos'];}
        if (isset($_GET['add'])) {$address_err=$_GET['add'];}
        if (isset($_GET['dis'])) {$district_err=$_GET['dis'];}
        if (isset($_GET['dr'])) {$dr_err=$_GET['dr'];}
        if (isset($_GET['user'])) {$username_err=$_GET['user'];}
        if (isset($_GET['mobi'])) {$mobile_err=$_GET['mobi'];}
        if (isset($_GET['mobi2'])) {$mobile2_err=$_GET['mobi2'];}
        if (isset($_GET['pass'])) {$password_err=$_GET['pass'];}
        if (isset($_GET['compass'])) {$confirm_password_err=$_GET['compass'];}
        if (isset($_GET['mail'])) {$email_err=$_GET['mail'];}

        if (isset($_GET['fdistrict'])) {$fdistrict=$_GET['fdistrict'];}

    }*/
    $email_err=get_email_err();
    $password_err=get_new_password_err();
    $confirm_password_err=get_confirm_password_err();
    $mobile_err=get_telephone_err();
    $mobile2_err=get_telephone2_err();
    $district_err=get_district_err();
    $hos_err=get_hosname_err();
    $username_err=get_username_err();
    $dr_err=get_doctor_err();
    $address_err=get_address_err();

?>
<?php
    require '../header.php';
?>

<body>

            <div class="signup-content">
                <div class="signup-form">
                    <form action="application/signup.php" method="post" class="register-form" id="register-form">
                       <center> <h2><a href="/bloodbank/hospital/signup">Hospital registration form</a></h2></center><br>

                        <div class="form-group <?php echo (!empty($hos_err)) ? 'has-error' : ''; ?>">
                            <label>Hospital Name</label>
                            <input type="text" name="hosname" class="form-control" value="<?php echo isset($_SESSION["hosname"])?$_SESSION["hosname"]:""; ?>" required>
                            <span class="help-block"><?php echo $hos_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo isset($_SESSION["address"])?$_SESSION["address"]:""; ?>" required>
                            <span class="help-block"><?php echo $address_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>">
                            <label>District</label>
                            <?php
                                $sql="SELECT name FROM district";
                                $result=mysqli_query($link, $sql);
                                if(mysqli_num_rows($result)){
                                $select= '<select name="district" class="form-control"> required';
                                if (!isset($_SESSION['district'])) {
                                    $select.='<option value="">'."Select District".'</option>';
                                }else{
                                    $new_district= $_SESSION['district'];
                                    $select.="<option value=\"$new_district\">"."$new_district"."</option>";
                                }

                                        while($rs=mysqli_fetch_array($result)){
                                        $select.='<option value="'.$rs['name'].'">'.$rs['name'].'</option>';
                                        }
                                }

                                    $select.='</select>';
                                    echo "$select";
                            ?>
                            <span class="help-block"><?php echo $district_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($dr_err)) ? 'has-error' : ''; ?>">
                            <label>Cheif Doctor Name</label>
                            <input type="text" name="drname" class="form-control" value="<?php echo isset($_SESSION["doctor"])?$_SESSION["doctor"]:""; ?>" required>
                            <span class="help-block"><?php echo $dr_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>User Name</label>
                            <input type="text" name="username" class="form-control" value="<?php echo isset($_SESSION["username"])?$_SESSION["username"]:""; ?>" required>
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo isset($_SESSION["email"])?$_SESSION["email"]:""; ?>" required>
                            <span class="help-block"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>">
                            <label>Telephone</label>
                            <input type="number" name="mobile" class="form-control" value="<?php echo isset($_SESSION["telephone"])?$_SESSION["telephone"]:""; ?>" required>
                            <span class="help-block"><?php echo $mobile_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($mobile2_err)) ? 'has-error' : ''; ?>">
                            <label>Telephone (Optional)</label>
                            <input type="number" name="mobile2" class="form-control" value="<?php echo isset($_SESSION["telephone2"])?$_SESSION["telephone2"]:""; ?>">
                            <span class="help-block"><?php echo $mobile2_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span></label>
                            <input type="password" name="password" class="form-control" id="pass_log_id" value="<?php echo isset($_SESSION["new_password"])?$_SESSION["new_password"]:""; ?>" required>
                            <span class="help-block"><?php echo $password_err; ?></span>

                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" value="<?php echo isset($_SESSION["confirm_password"])?$_SESSION["confirm_password"]:""; ?>" required>
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="button btn-delete" value="Submit">
                            <a href="/bloodbank/hospital/signup"><div class="button">Reset</div></a>
                        </div>
                        <p>Already have an account? <b><a href="../login/hospital" style="color: red;">Login here</a></b></p>
                    </form>
                </div>
            </div>


<?php include '../footer.php'; ?>
