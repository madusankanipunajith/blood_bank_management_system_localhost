<?php
	require "../session.php";
    require ('../header.php');
?>
<?php
$email_err=$nic_err=$firstname_err=$lastname_err="";
$email=$firstname=$lastname=$nic="";

    $nics = $_SESSION["id_card3"];
	// queries
    $sql = "SELECT * FROM blood_bank_admin WHERE NIC= '$nics'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    
        $firstname = $row["FirstName"];
        $lastname = $row["LastName"];
        $nic= $row["NIC"];
        $email= $row["Email"];
        }
    }

   // Close connection
    mysqli_close($link); 
?>
<?php
    if($_SERVER['REQUEST_METHOD']=="GET"){
        if (isset($_GET['first'])) {$firstname_err=$_GET['first'];}
        if (isset($_GET['last'])) {$lastname_err=$_GET['last'];}
        if (isset($_GET['nic'])) {$nic_err=$_GET['nic'];}
        if (isset($_GET['email'])) {$email_err=$_GET['email'];}
        
    }
?>
<body>
	<div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>

        <div class="main clearfix">
            <div class="topic">
            	
            </div>
            
            <center>
            	<form action="../application/edit_admin.php" method="post">
            	
                
                    <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>" required>
                        <span class="help-block"><?php echo $firstname_err; ?></span>
                    </div>
                
               
                    <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>" required>
                        <span class="help-block" ><?php echo $lastname_err; ?></span>
                    </div>
                
        
                
                    <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                        <label>NIC</label>
                        <input type="text" name="nic" value="<?php echo $nic; ?>" required>  
                        <span class="help-block" ><?php echo $nic_err; ?></span>   
                    </div>
                    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" required>  
                        <span class="help-block" ><?php echo $email_err; ?></span>   
                    </div>
                  
                
                
            <input type="submit"  name="Submit" class="button btn-edit">
            <div class="form-group">
                
                    <a href="edit_password"><div class="button">Edit Password</div></a>
                
                
            </div>
            </form>
            <div style="float: right;font-size: 15px; margin-top: -30px;"><a href="edit_hospital"><i class="fa fa-cogs"></i>Edit Hospital</a></div>
            </center>
          
           </div> 
           </div>
            
               
        
    
<?php include '../../footer.php'; ?>