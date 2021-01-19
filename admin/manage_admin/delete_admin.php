<?php
    require '../session.php';
    require '../header.php';
?>
<?php
    $nic=$id=$hos_err=$first=$last=$hosid="";
    if (isset($_GET['nic'])) {
        $nic= $_GET['nic'];
        $sql= "SELECT * FROM blood_bank_admin WHERE NIC='$nic'";
        $result=mysqli_query($link, $sql);
        while ($row=mysqli_fetch_assoc($result)) {
            $first= $row["FirstName"];
            $last= $row["LastName"];
            $nic= $row["NIC"];
            $hosid= $row["BloodBankID"];
        }
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
                <div class="form-style-2-heading">Delete Admin</div><br>
                    <form action="" method="post">
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
                            <div class="form-group">
                                <label>Hospital ID</label>
                                <input type="number" name="id" value="<?php echo $hosid; ?>" readonly>
                            </div>
                        </div>    
                    
                    </form>
                <center>
                    <br>
                       <div class="form-group"> <a href="<?php echo "application/delete_admin?delnic=$nic&hosid=$hosid";?>" onclick="return confirm('Are you Sure ?');" ><div class="button btn-delete clearfix">Delete</div></div>
                        </a>
                        <div class="form-group"><a href="select_admin"><div class="button">Cancel</div></a></div>
                </center>    
                    
                    
            </div>

                    
        
        </div>
            
    </div>

<?php include '../../footer.php'; ?>