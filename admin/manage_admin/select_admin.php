<?php
   require '../session.php';
   require '../header.php';
    
?>
<?php
$nic=$nic_err=$process="";
if (isset($_GET['update'])) {
    $process= "update";
}
if(isset($_GET['delete'])){
    $process= "delete";
}

if (isset($_GET['nic'])) {
    $nic_err= $_GET['nic'];
}
         
?>

<body>
	<div class="container-row admin">
        <?php 
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
            <div class="form-style-2-heading">Select Admin</div><br>
           
                
                <center>
                <form action="application/select_admin.php?process=<?php echo $process;?>" method="post" style="margin-top: 30px;">
                    
                        <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                        <label>Provide NIC/ID number</label>
                        <input type="text" name="nic" placeholder="NIC">
                        <span class="help-block "><?php echo $nic_err; ?></span>
                        </div>
            
                    <input type="submit" value="Submit">
                    
                </form>
            
               </center>
            

            </div>
        </div>
    </div>

</body>
