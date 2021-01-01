<?php
require_once "../session.php";
require('../header.php');
include '../encrypt.php';

?>
<?php
$bankid= $_SESSION["id-3"];
$date=$nic=$count=$opp_id=$time="";
//date_default_timezone_set("Asia/Colombo");
if (isset($_GET['date'])) {
    $enc_date= $_GET['date'];
    $date= Decrypt($enc_date);
}
if (isset($_GET['nic'])) {
    $enc_nic= $_GET['nic'];
    $nic= Decrypt($enc_nic);
}
if (isset($_GET['opp_id'])) {
    $enc_opp_id= $_GET['opp_id'];
    $opp_id= Decrypt($enc_opp_id);
}
if (isset($_GET['time'])) {
    $enc_time= $_GET['time'];
    $time= Decrypt($enc_time);
}


$sql= "SELECT * FROM donor_reservation WHERE Dates='$date' AND HosID='$bankid' AND Flag='1' ORDER BY Tme ASC";
$result= mysqli_query($link, $sql);
$count= mysqli_num_rows($result);

 
?>
<body>
        
	
	<div class="container-row admin">
        <?php
        require_once "../dashboard.php";
        ?>

        <div class="main">
            <center>
                <div class="form-style-2-heading"><a href="more_info">Validated Appointments in <?php echo "   "."$date"."     =>     "."$count"; ?></a></div>
            </center>
            <div style="float: left; width: 40%;">
                <div class="form-group">
                   <h6>Selected donor appointment details</h6> 
                </div>
                <div class="form-group">
                    <label>NIC</label>
                    <input type="text" name="nic" value="<?php echo $nic;?>" readonly>
                </div>
                <div class="form-group">
                    <label>Appointed Date</label>
                    <input type="date" name="date" value="<?php echo $date;?>" readonly>
                </div>
                <div class="form-group">
                    <label>Appointed Time</label>
                    <input type="time" name="time" value="<?php echo $time;?>" readonly>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <a href="../application/opp_approve?id=<?php echo $nic;?>&opp_id=<?php echo $opp_id;?>" class="like clearfix" onclick="return confirm('confirm');">
                                <div class="tile-3 clearfix"><i class="fa fa-check"></i>Approve</div>
                        </a>
                    </div>
                    <div class="form-group">
                        <a href="../application/opp_decline?id=<?php echo $nic;?>&opp_id=<?php echo $opp_id;?>" class="dislike clearfix" onclick="return confirm('confirm');">
                        <div class="tile-3 clearfix"><i class="fa fa-times"></i>Decline</div>
                        </a>
                    </div>
                </div>
            </div>
            <div style="float: right; width: 60%;">
                <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head" >
                            <th class="cell100 column8">NIC</th>
                            <th class="cell100 column4">Full Name</th>  
                             <th class="cell100 column4">Time</th>  
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body">
                        <table>
                            <?php
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    
                                    $id = $row["DonorID"];
                                    $time = $row["Tme"];
                                $sql2="SELECT first_name, last_name, district, gender FROM donor WHERE nic='$id'";
                                $result2= mysqli_query($link, $sql2);

                                while($rows = mysqli_fetch_assoc($result2)){
                                    $fname= $rows["first_name"];$lname=$rows["last_name"];
                                    $name= $fname." ".$lname;
                                }

                                echo "<tr class='row100 body'><td class='cell100 column8'>".$id."</td>";
                                echo "<td class='cell100 column4'>".$name."</td>";
                                echo "<td class='cell100 column4'>".$time."</td>";

                            }
                            if($count==0){
                                echo "<center><p>There is no appointment yet for $date</p></center>";
                            }    
                            ?>
                            
                        
                        </table>
                    </div>
                        </div>
                    </div>
                   
                        
                    
                </div>
            </div>
            
        </div>

<?php
// Close connection
mysqli_close($link);
?>
</div>
<?php include '../../footer.php'; ?>