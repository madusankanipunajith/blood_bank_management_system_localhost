<?php
    require '../session.php';
    require '../header.php';
?>
<?php
    $first=$last=$hosid="";
    $nic=$id=$hos_err="";
    if (isset($_GET['nic'])) {$nic= $_GET['nic']; $_SESSION['admin_nic']=$nic;}
        $nic= $_SESSION['admin_nic'];
        $sql= "SELECT * FROM blood_bank_admin WHERE NIC='$nic'";
        $result=mysqli_query($link, $sql);
        while ($row=mysqli_fetch_assoc($result)) {
            $first= $row["FirstName"];
            $last= $row["LastName"];
            $nic= $row["NIC"];
            $hosid= $row["BloodBankID"];
        }
    
    
    if (isset($_GET['hosid'])) {
        $hos_err=$_GET['hosid'];
    }
// Close connection
mysqli_close($link);
?>
<body>
    
	<div class="container-row admin">
        
    <?php
        require '../dashboard.php';
    ?>
        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading">Update Admin</div><br>
                    <form action="application/update_admin.php" method="post">
                        <div class="form-row">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" value="<?php echo $first; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="<?php echo $last; ?>" readonly>
                            </div>
                            
                        </div>
        
            
                        <div class="form-row">
                            <div class="form-group">
                                <label>NIC</label>
                                <input type="text" name="nic" value="<?php echo $nic; ?>" readonly>  
                           
                            </div>
                            <div class="form-group <?php echo (!empty($hos_err)) ? 'has-error' : ''; ?>">
                                <label>Hospital ID</label>
                                <input type="number" name="id" value="<?php echo $hosid; ?>">
                                <span class="help-block "><?php echo $hos_err; ?></span>
                            </div>
                        </div>    
                
                <center>
                    <input type="submit" value="Update"><br>
                </center>     
                    </form>
                    
                  

                <center><button onclick="blood_bank_list()">Hospital IDs</button></center> 
                    
                    
            </div>

                    
        
        </div>
            
    </div>

</body>
</html>