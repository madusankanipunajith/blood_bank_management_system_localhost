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
// initialize a patient nic session
$_SESSION['patient_nic']="";
?>

<body>
	

	<div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>

        <div class="main">
            <div class="topic">
                
           
            <?php
                if (isset($_GET['fail'])) {
                    echo "<center><p style=\"color:red;\">No such a blood packet was found.</p></center>";
                }
            ?>
           
            <center>
                <p align="center">Blood Packet Details</p>
            	<form action="packet_detail" method="post" class="column50" style="margin-top: 20px;" autocomplete="off">
                
                    <div class="form-group">
                        <label>Serial Number</label>
                        <input type="text" name="serial_num" required>
                        <label class="help-block"><?php echo $serial_err;?></label>
                    </div>
                    <div class="form-group">
                        <label>Packet Number</label>
                        <input type="text" name="bag_num" required>
                        <label class="help-block"><?php echo $bag_err;?></label>
                    </div>
                
                <center><input type="submit" name="submit" class="button btn-edit"></center>
            </form>
            </center><br><hr>
            <p align="center">Patient's NIC number</p>
            <center>
                <form action="patient_detail" method="post" class="column50" style="margin-top: 20px;" autocomplete="off">
                    <div class="form-group">
                        <label>NIC</label>
                        <input type="text" name="nic" required>
                    </div>
                    <center><input type="submit" name="submit" class="button btn-edit"></center>
                </form>
            </center>
             </div>
        </div>
    </div>

<?php include '../../footer.php'; ?>