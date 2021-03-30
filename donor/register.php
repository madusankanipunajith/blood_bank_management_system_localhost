<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$nic = $password = $confirm_password = $first_name = $last_name = $dob = $bgroup = $gender = $addline1 = $addline2 = $telephone = $district = $email = "";
$nic_err = $password_err = $confirm_password_err = $first_name_err = $last_name_err = $dob_err = $bgroup_err = $gender_err = $addline1_err = $addline2_err = $telephone_err = $telephone2_err = $district_err = $email_err = "";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['nic'])) {$nic_err=$_GET['nic'];}
        if (isset($_GET['dis'])) {$district_err=$_GET['dis'];}
        if (isset($_GET['first'])) {$first_name_err=$_GET['first'];}
        if (isset($_GET['last'])) {$last_name_err=$_GET['last'];}
        if (isset($_GET['pass'])) {$password_err=$_GET['pass'];}
        if (isset($_GET['conf'])) {$confirm_password_err=$_GET['conf'];}
        if (isset($_GET['email'])) {$email_err=$_GET['email'];}
        if (isset($_GET['tel'])) {$telephone_err=$_GET['tel'];}
        if (isset($_GET['tel'])) {$telephone2_err=$_GET['tel2'];}
        if (isset($_GET['add'])) {$addline1_err=$_GET['add'];}
        if (isset($_GET['dob'])) {$dob_err=$_GET['dob'];}
    }
 

 require('../header.php');

?>
 

<body>

            <div class="signup-content"> 
                <div class="signup-form">
                    <form action="application/register.php" method="post" class="register-form" id="register-form">
                       <center> <h2>Donor registration form</h2></center><br>
                        <div class="form-row">
                            <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                                <label>First Name (මුල් නම)</label>
                                <input type="text" name="first_name" class="form-control">
                                <span class="help-block"><?php echo $first_name_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                                <label>Last Name (වාසගම)</label>
                                <input type="text" name="last_name" class="form-control">
                                <span class="help-block"><?php echo $last_name_err; ?></span>
                            </div>
                        </div>
                        <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                            <label>National Identification Number (ජාතික හැදුනුම්පත් අංකය)</label>
                            <input type="text" name="nic" class="form-control">
                            <span class="help-block"><?php echo $nic_err; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>">
                            <label>District (පදිංචි දිස්ත්‍රික්කය)</label>
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
                        <div class="form-group <?php echo (!empty($bgroup_err)) ? 'has-error' : ''; ?>">
                            <label>Blood Group (ලේ වර්ගය)</label>
                            <select id="bgroup" name="bgroup" class="form-control " required>
                                <option value="<?php echo isset($_SESSION["group"])?$_SESSION["group"]:"";?>"><?php echo isset($_SESSION["group"])?$_SESSION["group"]:"";?></option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="NA">Do not know</option>
                            </select>
                            <span class="help-block"><?php echo $bgroup_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email (විද්‍යුත් තැපැල් ලිපිනය)</label>
                            <input type="email" name="email" class="form-control">
                            <span class="help-block"><?php echo $email_err; ?></span>
                        </div>    
                        <div class="form-group <?php echo (!empty($addline1_err)) ? 'has-error' : ''; ?>">
                            <label>Address Line 1 (ලිපිනය)</label>
                            <input type="text" name="addline1" class="form-control">
                            <span class="help-block"><?php echo $addline1_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Address Line 2 (Optional)</label>
                            <input type="text" name="addline2" class="form-control">
                            
                        </div>
                        
                        <div class="form-group <?php echo (!empty($telephone_err)) ? 'has-error' : ''; ?>">
                            <label>Telephone (දුරකතන)</label>
                            <input type="number" name="telephone-1" class="form-control">
                            <span class="help-block"><?php echo $telephone_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($telephone2_err)) ? 'has-error' : ''; ?>">
                            <label>Telephone(Optional)</label>
                            <input type="number" name="telephone-2" class="form-control">
                            <span class="help-block"><?php echo $telephone2_err; ?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password (මුරපදය)<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span></label>
                            <input type="password" name="password" class="form-control" id="pass_log_id" value="<?php echo isset($_SESSION["new_password"])?$_SESSION["new_password"]:""; ?>" minlength="8" required>
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <label>Confirm Password (මුරපදය සනාථ කරන්න)<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span></label>
                            <input type="password" name="confirm_password" class="form-control" minlength="8" required>
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div>
                            <p>(Optional) Check the box below if you agree to reveal your Email to the Blood Requesters who uses the system.</p>
                            <label><input class = "column9 checkmark" type="checkbox" name="agree" class="form-control" value = "Yes">
                            I agree</label>
                        </div>
                        <div class="form-group">
                            <input type="submit"  value="Submit">
                            <input type="reset" class="btn btn-default" value="Reset">
                        </div>
                        <p>Already have an account? <b><a href="../login/donor.php" style="color: red;">Login here</a></b></p>
                    </form>
                </div>
            </div>

    <?php include '../footer.php'; ?>
