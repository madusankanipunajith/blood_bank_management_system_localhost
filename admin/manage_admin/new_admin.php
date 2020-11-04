
<?php

    require '../session.php';
    require '../header.php';
    
    $nic_err = $password_err = $first_name_err = $last_name_err = $confirm_password_err = $hosid_err = $email_err="";

    if (isset($_GET['nic']) || isset($_GET['pass']) || isset($_GET['conf']) || isset($_GET['first']) || isset($_GET['last']) || isset($_GET['hosid']) || isset($_GET['email'])) {
        $nic_err= $_GET['nic'];
        $password_err= $_GET['pass'];
        $confirm_password_err= $_GET['conf'];
        $email_err= $_GET['email'];
        $first_name_err= $_GET['first'];
        $last_name_err= $_GET['last'];
        $hosid_err= $_GET['hosid'];
    }

?>

<body>
	
	<div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>
        <div class="main clearfix">
            <div class="topic">
            <div class="form-style-2-heading">Add New Admin</div><br>
            

            <form action="application/new_admin.php" method="post">
                    <div class="form-row">
                            <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control">
                                <span class="help-block "><?php echo $first_name_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control">
                                <span class="help-block "><?php echo $last_name_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($hosid_err)) ? 'has-error' : ''; ?>">
                                <label>Hospital ID</label>
                                <input type="number" name="hosid">
                                <span class="help-block "><?php echo $hosid_err; ?></span>
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                            <label>NIC</label>
                            <input type="text" name="nic">
                             
                          </div>
                          <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email">
                            
                          </div>
                    </div>
        
                    <div class="form-row">
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                                <span class="help-block "><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control">
                                <span class="help-block "><?php echo $confirm_password_err; ?></span>
                            </div>
                    </div>
                          

                    <center><input type="submit" class="btn btn-primary" value="Submit"></center>

            </form>
          

            </div>

            <div style="float: right; margin-top: -275px; margin-right: 20px;" class="clearfix">
                <button onclick="blood_bank_list()">Hospital IDs</button>
            </div>    
        </div>
    </div>

</body>
</html>
                
