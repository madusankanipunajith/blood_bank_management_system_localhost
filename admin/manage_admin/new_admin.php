
<?php

    require '../session.php';
    require '../header.php';
    $email=$first_name=$last_name=$nic=$hosid=$hosname="";
    $nic_err = $password_err = $first_name_err = $last_name_err = $confirm_password_err = $hosid_err = $email_err="";

    /*

    if (isset($_GET['nic']) || isset($_GET['pass']) || isset($_GET['conf']) || isset($_GET['first']) || isset($_GET['last']) || isset($_GET['hosid']) || isset($_GET['email'])) {
        $nic_err= $_GET['nic'];
        $password_err= $_GET['pass'];
        $confirm_password_err= $_GET['conf'];
        $email_err= $_GET['email'];
        $first_name_err= $_GET['first'];
        $last_name_err= $_GET['last'];
        $hosid_err= $_GET['hosid'];
    }   */

        $nic_err= get_nic_err();
        $password_err= get_password_err();
        $confirm_password_err= get_confirm_err();
        $email_err= get_email_err();
        $first_name_err= get_first_name_err();
        $last_name_err= get_last_name_err();
        $hosid_err= get_hospital_err();

//    if (isset($_GET['fhosid'])) {$hosid= $_GET['fhosid'];}
//    if (isset($_GET['fname'])) {$hosname= $_GET['fname'];}

?>

<body>
	
	<div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>
        <div class="main clearfix">
            <div class="topic" style="margin-top: 0px;">
                <div class="form-style-2-heading">Add New Admin</div><br>
                <div style="float: right; margin-top: -120px; margin-right: 20px;" class="clearfix">
                    <button onclick="blood_bank_list()">Hospital IDs</button>
                </div> 
            
            <form action="application/new_admin.php" method="post">
                    <div class="form-row">
                            <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" value="<?php echo isset($_SESSION["first_name"])?$_SESSION["first_name"]:""; ?>" required>
                                <span class="help-block "><?php echo $first_name_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="<?php echo isset($_SESSION["last_name"])?$_SESSION["last_name"]:""; ?>" required>
                                <span class="help-block "><?php echo $last_name_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($hosid_err)) ? 'has-error' : ''; ?>">
                                <label>Hospital ID</label>
                                
                                <?php
                                    $sql2="SELECT HospitalID, Name FROM blood_bank_hospital";
                                    $result2=mysqli_query($link, $sql2);
                                    if(mysqli_num_rows($result2)){
                                        $select= '<select name="hosid" class="form-control"> required';
                                        if (!isset($_SESSION['hospital'])) {

                                            $select.='<option value="">'."".'</option>';
                                        }else{
                                            if (isset($_SESSION['hospital'])) {
                                                $hospital= $_SESSION['hospital'];
                                            }
                                            $select.="<option value=\"$hospital\">"."$hospital"."</option>";
                                        }
                                    
                                        while($rs=mysqli_fetch_array($result2)){
                                        $select.='<option value="'.$rs['HospitalID'].'">'.$rs['HospitalID'].' / '.$rs['Name'].'</option>';
                                        }
                                    }
                                        $select.='</select>';
                                        echo "$select";
                                ?>
                                <span class="help-block "><?php echo $hosid_err; ?></span>
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                            <label>NIC</label>
                            <input type="text" name="nic" class="form-control" value="<?php echo isset($_SESSION["nic"])?$_SESSION["nic"]:""; ?>" required>
                            <span class="help-block "><?php echo $nic_err; ?></span> 
                          </div>
                          <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo isset($_SESSION["email"])?$_SESSION["email"]:""; ?>" required>
                            <span class="help-block "><?php echo $email_err; ?></span>
                          </div>
                    </div>
        
                    <div class="form-row">
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo isset($_SESSION["password"])?$_SESSION["password"]:""; ?>" minlength="8" required>
                                <span class="help-block "><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" value="<?php echo isset($_SESSION["confirm"])?$_SESSION["confirm"]:""; ?>" minlength="8" required>
                                <span class="help-block "><?php echo $confirm_password_err; ?></span>
                            </div>
                    </div>
                          

                    <center><input class="button btn-edit" type="submit" class="btn btn-primary" value="Submit"></center>

                </form>
            </div>
               
        </div>
    </div>
<?php mysqli_close($link); ?>
<?php include '../../footer.php'; ?>
                
