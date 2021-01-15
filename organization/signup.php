<?php
require '../config.php';
    $org_err=$district_err=$president_err=$username_err=$mobile_err=$password_err=$confirm_password_err=$email_err=$mobile_err="";
    if($_SERVER['REQUEST_METHOD']=="GET"){
        if (isset($_GET['org'])) {$org_err=$_GET['org'];}
        if (isset($_GET['dis'])) {$district_err=$_GET['dis'];}
        if (isset($_GET['pre'])) {$president_err=$_GET['pre'];}
        if (isset($_GET['user'])) {$username_err=$_GET['user'];}
        if (isset($_GET['pass'])) {$password_err=$_GET['pass'];}
        if (isset($_GET['conf'])) {$confirm_password_err=$_GET['conf'];}
        if (isset($_GET['email'])) {$email_err=$_GET['email'];}
        if (isset($_GET['mob'])) {$mobile_err=$_GET['mob'];}
        
    }
?>

<?php
   require '../header.php'; 
?>
<body>

            <div class="signup-content">
                <div class="signup-form">
                    <form action="application/signup.php" method="post" class="register-form" id="register-form">
                       <center> <h2><a href="localhost/bloodbank/organization/signup">Organization registration form</a></h2></center><br>
                        
                        <div class="form-group <?php echo (!empty($org_err)) ? 'has-error' : ''; ?>">
                            <label>Organization Name</label>
                            <input type="text" name="orgname" class="form-control" >
                            <span class="help-block"><?php echo $org_err; ?></span>
                        </div>  
                        <div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>">
                            <label>District</label>
                            <?php
                                $sql="SELECT name FROM district";
                                $result=mysqli_query($link, $sql);
                                if(mysqli_num_rows($result)){
                                    $select= '<select name="location" class="form-control">';
                                    $select.='<option value=""></option>';
                                        while($rs=mysqli_fetch_array($result)){
                                        $select.='<option value="'.$rs['name'].'">'.$rs['name'].'</option>';
                                        }
                                    }
                                    $select.='</select>';
                                    echo "$select";
                            ?>
                            <span class="help-block"><?php echo $district_err; ?></span>
                        </div> 
                        <div class="form-group <?php echo (!empty($president_err)) ? 'has-error' : ''; ?>">
                            <label>President Name</label>
                            <input type="text" name="name" class="form-control" >
                            <span class="help-block"><?php echo $president_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                            <span class="help-block"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>User Name</label>
                            <input type="text" name="username" class="form-control" >
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div> 
                        <div class="form-group">
                            <label>Purpose(Optional)</label>
                            <textarea name="purpose" placeholder="  please give a precise description" cols="60" rows="5"></textarea>
                        </div> 
                        <div class="form-group <?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>">
                            <label>Telephone</label>
                            <input type="number" name="mobile" class="form-control" >
                            <span class="help-block"><?php echo $mobile_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Telephone (Optional)</label>
                            <input type="number" name="mobile2" class="form-control" >
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control">
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        </div>
                    
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <input type="reset" class="btn btn-default" value="Reset">
                        </div>
                        <p>Already have an account? <a href="../login/organization.php" style="color: #F78181">Login here</a>.</p>
                    </form>
                </div>
            </div>


<?php include '../footer.php'; ?>