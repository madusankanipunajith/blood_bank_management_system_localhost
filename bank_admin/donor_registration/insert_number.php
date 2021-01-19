<?php
require '../session.php';
require '../header.php';

$serial_err=$bag_err="";

if (isset($_GET['serial'])) {
	$serial_err= $_GET['serial'];
}
if (isset($_GET['bag'])) {
	$bag_err= $_GET['bag'];
}
?>

<body>
	

	<div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading">Validate Blood Packet</div>
           
            <?php
                if (isset($_GET['add'])) {
                    echo "<center><p style=\"color:green;\">Validated the Blood Packet Succesfully.</p></center>";
                }
                if (isset($_GET['reject'])) {
                	echo "<center><p style=\"color:orange;\">Rejected the Blood Packet Succesfully.</p></center>";
                }
                if (isset($_GET['fail'])) {
                    echo "<center><p style=\"color:red;\">No such a blood packet was found.</p></center>";
                }
            ?>
           
            <center>
            	<form action="accept_donor" method="post" class="column50" style="margin-top: 50px;">
                
                    <div class="form-group">
                        <label>Serial Number</label>
                        <input type="text" name="serial_num" value="<?php echo isset($_SESSION["serial_num"])?$_SESSION["serial_num"]:""; ?>" required>
                        <label class="help-block"><?php echo $serial_err;?></label>
                    </div>
                    <div class="form-group">
                        <label>Packet Number</label>
                        <input type="text" name="bag_num" value="<?php echo isset($_SESSION["bag_num"])?$_SESSION["bag_num"]:""; ?>" required>
                        <label class="help-block"><?php echo $bag_err;?></label>
                    </div>
            </div>
                <center><input type="submit" name="submit" class="button btn-edit"></center>
            	</form>
            </center>
            
            
             </div>
        </div>
    </div>

<?php include '../../footer.php'; ?>