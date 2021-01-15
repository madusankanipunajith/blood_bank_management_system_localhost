<?php

    // Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$nic_err = $password_err = $confirm_password_err = $first_name_err = $last_name_err = $dob_err = $gender_err = $addline1_err = $addline2_err = $telephone_err= $district_err = $email_err="";
 
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['nic'])) {$nic_err=$_GET['nic'];}
        if (isset($_GET['dis'])) {$district_err=$_GET['dis'];}
        if (isset($_GET['first'])) {$first_name_err=$_GET['first'];}
        if (isset($_GET['last'])) {$last_name_err=$_GET['last'];}
        if (isset($_GET['pass'])) {$password_err=$_GET['pass'];}
        if (isset($_GET['conf'])) {$confirm_password_err=$_GET['conf'];}
        if (isset($_GET['email'])) {$email_err=$_GET['email'];}
        if (isset($_GET['tel'])) {$telephone_err=$_GET['tel'];}
        if (isset($_GET['add'])) {$addline1_err=$_GET['add'];}
        if (isset($_GET['dob'])) {$dob_err=$_GET['dob'];}
    }


	require ('../header.php');
?>


<body>

            <div class="signup-content">
                <div class="signup-form">
                    <form action="application/signup.php" method="post" class="register-form" id="register-form">
                       <center> <h2>Requester registration form</h2></center><br>
                        <div class="form-row">
                            <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control">
                                <span class="help-block"><?php echo $first_name_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control">
                                <span class="help-block"><?php echo $last_name_err; ?></span>
                            </div>
                        </div>
                        <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                            <label>National Identification Number (NIC)</label>
                            <input type="text" name="nic" class="form-control">
                            <span class="help-block"><?php echo $nic_err; ?></span>
                        </div>    
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                            <span class="help-block"><?php echo $email_err; ?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control">
                            <span class="help-block"><?php echo $dob_err; ?></span>
                        </div>
                        
                        <div class="form-group">
                            <label>Gender</label>
                            <select id="gender" name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <span class="help-block"><?php echo $gender_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>">
                            <label>District</label>
                            <?php
                                $sql="SELECT name FROM district";
                                $result=mysqli_query($link, $sql);
                                if(mysqli_num_rows($result)){
                                    $select= '<select name="district" class="form-control">';
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
                        <div class="form-group <?php echo (!empty($addline1_err)) ? 'has-error' : ''; ?>">
                            <label>Address Line 1</label>
                            <input type="text" name="addline1" class="form-control">
                            <span class="help-block"><?php echo $addline1_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Address Line 2 (Optional)</label>
                            <input type="text" name="addline2" class="form-control">
                            <span class="help-block"><?php echo $addline2_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($telephone_err)) ? 'has-error' : ''; ?>">
                            <label>Telephone</label>
                            <input type="number" name="telephone" class="form-control">
                            <span class="help-block"><?php echo $telephone_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Telephone (Optional)</label>
                            <input type="number" name="telephone-2" class="form-control">
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
                        <p>Already have an account? <a href="../login/requester" style="color: #F78181">Login here</a>.</p>
                    </form>
                </div>
            </div>

	
<?php include '../footer.php'; ?>