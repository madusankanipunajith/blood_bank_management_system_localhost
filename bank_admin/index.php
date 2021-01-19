<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["id-3"]) || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location: ../reg_login.php");
exit;
}
require '../config.php';    

$bankid= $_SESSION["id-3"];
$count4=$count5=0;
?>
<?php
require_once 'header.php';
//date_default_timezone_set("Asia/Colombo");
$date= date("Y-m-d");
$sql= "SELECT COUNT(DISTINCT DonorID) AS count FROM donor_reservation WHERE HosID='$bankid' AND Flag='1' AND Dates='$date'";
$result= mysqli_query($link, $sql);
while ($row = mysqli_fetch_assoc($result)) {$count=$row["count"];}
$sql2= "SELECT COUNT(DISTINCT CampaignID) AS count FROM campaign WHERE BHospitalID='$bankid' AND Flag='0' AND Dates>='$date'";
$result2= mysqli_query($link, $sql2);
while ($rows = mysqli_fetch_assoc($result2)) {$count2=$rows["count"];}
$sql3= "SELECT COUNT(DISTINCT DonorID) AS count FROM donor_reservation WHERE HosID='$bankid' AND Flag='0' AND Dates>='$date'";
$result3= mysqli_query($link, $sql3);
while ($row = mysqli_fetch_assoc($result3)) {$count3=$row["count"];}

/*$sql4= "SELECT COUNT(DISTINCT ID) AS count FROM normal_blood_request WHERE ReceiverID='$bankid' AND Flag='0'";
$result4= mysqli_query($link, $sql4);
while ($row = mysqli_fetch_assoc($result4)) {$count4=$row["count"];$_SESSION['hospital_count']=$count4;}
$sql5= "SELECT COUNT(DISTINCT ID) AS count FROM blood_bank_request WHERE ReceiverID='$bankid' AND Flag='0'";
$result5= mysqli_query($link, $sql5);
while ($row = mysqli_fetch_assoc($result5)) {$count5=$row["count"];$_SESSION['blood_bank_count']=$count5;}
$count6=$count5+$count4;
*/
// Close connection
mysqli_close($link);

?>

<body onload="initClock()">

    <div class="container-row admin">
        <?php
        require_once "dashboard.php";
        ?>
        <div class="main">

                <div class="page-header">
                <p class="greeting">Hi, <b><?php echo htmlspecialchars($_SESSION["nic"]); ?></b>. Welcome to your dashboard!</p> 
                </div>

                <center>
                    <!--digital clock start-->
                <div >
                    <div class="date">
                        <span id="dayname">Day</span>,
                        <span id="month">Month</span>
                        <span id="daynum">00</span>,
                        <span id="year">Year</span>
                    </div>
                    <div class="time">
                        <span id="hour">00</span>:
                        <span id="minutes">00</span>:
                        <span id="seconds">00</span>
                        <span id="period">AM</span>
                    </div>
                </div>
                    <!--digital clock end-->
                </center>

                
                    <div class="tile-container-2">
                    <div class="tile-row">
                    <a href="appointments/index">
                        <div class="tile-2" style="width: 340px; margin-right: 15px; margin-left: 10px;">
                            <h2><b>Today Appointments</b></h2>
                            <center><h1><b><?php echo "$count";?></b></h1></center>
                            
                        </div>
                    </a>
                    <a href="manage_campaign/index">
                        <div class="tile-2" style="width: 340px; margin-right: 15px;">
                            <h2><b>New Campaigns</b></h2>
                            <center><h1><b><?php echo "$count2";?></b></h1></center>
                        </div>
                    </a>
                    <a href="approve_appointment/index">
                        <div class="tile-2" style="width: 340px;">
                        <h2><b>New Appointment</b></h2>
                        <center><h1><b><?php echo "$count3";?></b></h1></center>
                        </div>
                    </a>
                    </div>
                    <div> 
                        <a href="donate_blood/index">
                        <div class="tile-4">   
                        <h2><b>New Blood Request</b></h2>
                        <center><p><b><marquee>click for reserving packets</marquee></b></p></center>
                        </div> 
                        </a>                          
                    </div>   
                    
                </div>
                
            

            
        </div>

    </div>

<?php include '../footer.php'; ?>