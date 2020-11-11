<?php
require_once "../session.php";
require('../header.php');
include '../encrypt.php';

?>
<?php
$bankid= $_SESSION["id-3"];
$date=$nic=$count=$opp_id="";
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
                <div><a href="more_info">Appointments in <?php echo "   ("."$date".")      =>     "."$count"; ?></a></div>
            </center>
            <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head" >
                             <th class="cell100 column6">NIC</th>
                             <th class="cell100 column6">Full Name</th> 
                              <th class="cell100 column6">Gender</th> 
                             <th class="cell100 column6">District</th> 
                             <th class="cell100 column6">Time</th>  
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
                                    $district= $rows["district"];
                                    $gender= $rows["gender"];
                                    $name= $fname." ".$lname;
                                }

                                echo "<tr class='row100 body'><td class='cell100 column6'>".$id."</td>";
                                echo "<td class='cell100 column6'>".$name."</td>";
                                echo "<td class='cell100 column6'>".$gender."</td>";
                                echo "<td class='cell100 column6'>".$district."</td>";
                                echo "<td class='cell100 column6'>".$time."</td>";

                            }
                                
                            ?>
                        
                        </table>
                    </div>
                        </div>
                    </div>
                    <center>
                        <div class="form-row">
                            <div class="form-group">
                                <a href="../application/opp_approve?id=<?php echo $nic;?>&opp_id=<?php echo $opp_id;?>" onclick="return confirm('confirm');">
                                <div class="tile-3 clearfix">Approve</div>
                                </a>
                            </div>
                            <div class="form-group">
                                <a href="../application/opp_decline?id=<?php echo $nic;?>&opp_id=<?php echo $opp_id;?>" onclick="return confirm('confirm');">
                                <div class="tile-3 clearfix">Decline</div>
                                </a>
                            </div>
                        </div>
                    </center>
                </div>
            
        </div>

<?php
// Close connection
mysqli_close($link);
?>
<?php include '../../footer.php'; ?>