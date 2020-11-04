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
                <div class="form-style-2-heading">Delete Admin</div><br>
                    <form action="" method="post">
                        
                        <div class="form-group" style="width: 100%;">
                            <label>Hospital Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $name; ?>" readonly>
                        </div>
        
            
                        <div class="form-row">
                            <div class="form-group">
                                <label>Address (RD)</label>
                                <input type="text" name="nic" value="<?php echo $address; ?>" readonly>  
                           
                            </div>
                            <div class="form-group">
                                <label>District</label>
                                <input type="text" name="id" value="<?php echo $district; ?>" readonly>
                            </div>
                        </div>    
                    
                    </form>
                <center>
                    <br><a class="has-error" href="<?php echo "application/delete_hospital?delid=$id";?>" onclick="return confirm('Are You sure?');" >Delete</a>
                </center>    
                    
                    
            </div>

                    
        
        </div>
            
    </div>

</body>