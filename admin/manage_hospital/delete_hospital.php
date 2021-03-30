<?php
    require '../session.php';
    require '../header.php';
?>
<?php
    $name=$id=$district=$address="";
    if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['dis']) && isset($_GET['add'])) {
        $id= $_GET['id'];
        $name= $_GET['name'];
        $district= $_GET['dis'];
        $address= $_GET['add'];
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

                <?php
                    if (isset($_GET['admin'])) {
                        echo "<p class=\"has-error\">admins are already working belongs to this hospital. please take an action to them before delete the Hospital-<a href=\"admin_action\">Do Action</a></p>";
                    }
                    if (isset($_GET['packet'])) {
                        echo "<p class=\"has-error\">There are some blood packets belongs to this hospital. please take an action to them before delete the Hospital-<a href=\"packet_action\">Do Action</a></p>";
                    }
                ?>

                <div class="form-style-2-heading">Delete Hospital</div><br>
                    <form action="" method="post">
                        
                        <div class="form-group" style="width: 100%;">
                            <label>Hospital Name</label>
                            <input type="text" name="hosname" class="form-control" value="<?php echo $name; ?>" readonly>
                        </div>
        
            
                        <div class="form-row">
                            <div class="form-group">
                                <label>Address (RD)</label>
                                <input type="text" name="address" value="<?php echo $address; ?>" readonly>  
                           
                            </div>
                            <div class="form-group">
                                <label>District</label>
                                <input type="text" name="district" value="<?php echo $district; ?>" readonly>
                            </div>
                        </div>    
                    
                    </form>
                <center>
                    <br><a href="<?php echo "application/delete_hospital?delid=$id&name=$name&dis=$district&add=$address";?>" onclick="return confirm('Are You sure?');" >
                        <div class="button btn-delete">Delete</div></a>
                        <a href="select_hospital"><div class="button">Cancel</div></a>
                </center>    
                    
                    
            </div>

                    
        
        </div>
            
    </div>

<?php include '../../footer.php'; ?>