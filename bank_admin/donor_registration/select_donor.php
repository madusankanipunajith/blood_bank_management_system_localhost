<?php

    require "../session.php";
    require ('../header.php');
?>
<?php
    if (isset($_GET['hospital'])) {
        $_SESSION['place']="hospital";
    }
    if(isset($_GET['campaign'])){
        $_SESSION['place']="campaign";
    }
    $place= $_SESSION['place'];
?>

<?php
    $nic_err=$nic="";
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET['err'])){
            $nic_err= $_GET['err'];
        }
    }

?>

<body>
	

	<div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading">Donor Registration  (<?php echo "$place";?>)</div>
            </div>
            <?php
                if (isset($_GET['add'])) {
                    echo "<center><p style=\"color:green;\">Added Succesfully</p></center>";
                }
            ?>
            <center>
            <form action="application/select_donor.php" method="post">
                <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>" style="margin-top: 100px;">
                <label style="font-size: 20px;">Enter Donor's NIC</label>
                <input type="text" name="nic">
                </div>
                <input type="submit" name="submit">
            </form>
            <br><br>
            
                <a href="index">
                <div class="tile-3 clearfix">Hospital / Campaign</div>
                </a>
            
            </center>
        </div>
    </div>

<?php include '../../footer.php'; ?>