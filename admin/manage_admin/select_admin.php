<?php
   require '../session.php';
   require '../header.php';
    
?>
<?php
$nic=$nic_err=$process="";
if (isset($_GET['update'])) {
    $_SESSION['process']= "update";
}
if(isset($_GET['delete'])){
    $_SESSION['process']= "delete";
}

/*if (isset($_GET['nic'])) {
    $nic_err= $_GET['nic'];
}*/
$nic_err= get_nic_err();

if (isset($_GET['fnic'])) {
    $nic= $_GET['fnic'];
}
         
?>

<body>
	<div class="container-row admin">
        <?php 
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">

                <?php
                    if (isset($_GET['error'])) {
                        echo "<p class=\"has-error\">This is the only admin who belongs to the blood bank hospital. Add a new admin to the hospital before delete this user</p>";
                    }
                ?>

            <div class="form-style-2-heading">Select Admin</div><br>
           
            <?php $process=$_SESSION['process'];?>
                
                <center>
                <form action="application/select_admin.php?process=<?php echo $process;?>" method="post" style="margin-top: 30px;">
                    
                        <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                        <label>Provide NIC/ID number</label>
                        <input type="text" name="nic" placeholder="NIC" value="<?php echo $nic;?>" required>
                        <span class="help-block "><?php echo $nic_err; ?></span>
                        </div>
            
                    <input class="button btn-edit" type="submit" value="Submit">
                    
                </form>
            
               </center>
            

            </div>
        </div>
    </div>

<?php include '../../footer.php'; ?>
