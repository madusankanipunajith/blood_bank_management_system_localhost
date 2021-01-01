<?php
require '../session.php';
require '../header.php';

$serial_err=$bag_err="";

if (!isset($_SESSION['pcount'])) {
    $_SESSION['pcount']=0;
}

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
                <?php
                
                if (isset($_GET['finish'])) {
                    echo "<center><p style=\"color:red;\">Finish Current Transfusion for Adding New Patient. You can remove current transfusion(s) also, when you finish the Transfusion</p></center>";
                }
                elseif (isset($_GET['already'])) {
                    echo "<center><p style=\"color:red;\">Blood packet was already transfused.</p></center>";
                }
                elseif (isset($_GET['notfound'])) {
                    echo "<center><p style=\"color:red;\">No such a blood packet was found.</p></center>";
                }
                elseif(isset($_GET['add'])){
                    echo "<center><p style=\"color:green;\">Added Successfully.</p></center>";
                }else{
                    echo "<center><p style=\"color:green;\">Enter the packet's details.</p></center>";
                }
                
                ?>
                <div class="form-style-2-heading"><a class="fa fa-backward" href="select_patient">(Back)</a>&nbsp;&nbsp;Transfusion Blood Packet( to <?php echo $_SESSION['pnic']." - ".$_SESSION['pdistrict']." - ".$_SESSION['ptype'];?>)</div>
                
                <center><b><p>Number of Packets : <?php if(isset($_SESSION['pcount'])){echo $_SESSION['pcount'];}else{echo "0";}?></p></b></center>
                <!--
                    <div class="column6" style="float: right;"> <a <?php if(!isset($_GET['recover'])){echo "href=\"select_packet?recover=ok\"";}else{echo "href=\"select_packet\"";}?>><div class="button btn-delete"><?php if(!isset($_GET['recover'])){echo "Recover Packet";}else{echo "Cancel";}?></div></a></div>
                -->
           
            
           
            <center>
            	<form action="application/add_transfusion" method="post" class="column50" style="margin-top: 30px;">
                
                    <div class="form-group">
                        <label>Serial Number</label>
                        <input type="text" name="serial_num" value="<?php echo isset($_SESSION["tserial_num"])?$_SESSION["tserial_num"]:""; ?>" required>
                        <label class="help-block"><?php echo $serial_err;?></label>
                    </div>
                    <div class="form-group">
                        <label>Packet Number</label>
                        <input type="text" name="bag_num" value="<?php echo isset($_SESSION["tbag_num"])?$_SESSION["tbag_num"]:""; ?>" required>
                        <label class="help-block"><?php echo $bag_err;?></label>
                    </div>
                </div>
                <center><input type="submit" name="submit" class="button btn-edit"></center>
            </form><br>
               <div align="center"> <a href="packet_review" class="button" width="200px">To Finish</a></div>
            </center>
            
            
             </div>
        </div>
    </div>

<?php include '../../footer.php'; ?>