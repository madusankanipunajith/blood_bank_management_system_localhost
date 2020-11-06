<?php
require_once "../session.php";
require('../header.php');
?>
<?php
$bankid= $_SESSION["id-3"];
$sql= "SELECT DISTINCT DonorID FROM donor_satisfaction WHERE HospitalID='$bankid'";
$result= mysqli_query($link, $sql);$count=mysqli_num_rows($result);
$sql2= "SELECT DISTINCT DonorID FROM donor_satisfaction WHERE HospitalID='$bankid' AND Validation='1'";
$result2= mysqli_query($link, $sql2);$count2=mysqli_num_rows($result2);
$count3=$count-$count2; 

// donor satisfation
$sql3="SELECT COUNT(DonorID) AS good FROM donor_satisfaction WHERE HospitalID='$bankid' AND Satisfaction='1'";
$result3= mysqli_query($link, $sql3); while ($row = mysqli_fetch_assoc($result3)) {$good_count=$row["good"];}
$sql4="SELECT COUNT(DonorID) AS bad FROM donor_satisfaction WHERE HospitalID='$bankid' AND Satisfaction='2'";
$result4= mysqli_query($link, $sql4); while ($row = mysqli_fetch_assoc($result4)) {$bad_count=$row["bad"];}
$good= ($good_count/$count)*100;
$bad= ($bad_count/$count)*100;

// Close connection
mysqli_close($link);   
?>
<body>
	
	<div class="container-row admin">
        <?php
        require_once "../dashboard.php";
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading">Manage Donor</div>
            </div>
            <div class="tile-container">
                <div class="tile-row">
                    <a href="#">
                        <div class="tile-2">
                            <h2><b>Registered Donors</b></h2>
                            <center><p><b><?php echo "$count";?></b></p></center>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                        </div>
                    </a>
                    <a href="#">
                    <div class="tile-2">
                        <h2><b>Donor Satisfaction</b></h2>
                        <center><p>Like<b><?php echo " "."$good"." "."%";?></b>&emsp;Dislike<b><?php echo " "."$bad"." "."%";?></b></p></center>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                    </div>
                    </a>
                </div>
                <div class="tile-row">
                    <a href="#">
                    <div class="tile-2">
                        <h2><b>Verified Donors</b></h2>
                        <center><p><b><?php echo "$count2";?></b></p></center>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                    </div>
                    </a>
                    <a href="#">
                    <div class="tile-2">
                        <h2><b>Rejected Donors</b></h2>
                       <center><p><b><?php echo "$count3";?></b></p></center>
                       <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php include '../../footer.php'; ?>