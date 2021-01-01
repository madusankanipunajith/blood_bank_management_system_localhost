<?php
require_once "../session.php";
require('../header.php');
include '../encrypt.php';

?>
<?php
$bankid= $_SESSION["id-3"];
//date_default_timezone_set("Asia/Colombo");
$date= date("Y-m-d");
$sql= "SELECT * FROM donor_reservation WHERE HosID='$bankid' AND Flag='0' ORDER BY Tme ASC";
$result= mysqli_query($link, $sql);

 
?>
<body>
        <?php
            if (isset($_GET['id'])) {
                $reserved_id= $_GET['id'];
                echo "<center><h5 style=\"color:green; margin-bottom:0px;\">'$reserved_id' was approved succesfully<h5></center>";
            }
            if (isset($_GET['dec'])) {
                $reserved_id= $_GET['dec'];
                echo "<center><h5 style=\"color:red; margin-bottom:0px;\">'$reserved_id' was deleted succesfully<h5></center>";
            }
        ?>
	
	<div class="container-row admin">
        <?php
        require_once "../dashboard.php";
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading"><a href="index">Validate Appointments</a></div>
            </div>
            <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head" >
                             <th class="cell100 column6">NIC</th>
                             <th class="cell100 column6">Full Name</th> 
                             <th class="cell100 column6">District</th> 
                             <th class="cell100 column6">Date</th>
                             <th class="cell100 column6">Time</th>
                             <th class="cell100 column6">Approve</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body">
                        <table>
                            <?php
                                if (mysqli_num_rows($result)>0) {
                                    // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $opp_id= $row["ID"];
                                    $id = $row["DonorID"];
                                    $date = $row["Dates"];
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
                                echo "<td class='cell100 column6'>".$district."</td>";
                                $encrypt_date= Encrypt($date);
                                $encrypt_nic= Encrypt($id);
                                $encrypt_opp_id= Encrypt($opp_id);
                                $encrypt_time= Encrypt($time);
                                echo "<td class='cell100 column6'>".$date."</td>";
                                echo "<td class='cell100 column6'>".$time."</td>";
                                echo "<td class='cell100 column6'><a href=\"more_info?date=$encrypt_date&nic=$encrypt_nic&opp_id=$encrypt_opp_id&time=$encrypt_time\"><i class=\"fa fa-history\"></i></a></td>";
                                
                                
                            }
                                }else{
                                     echo "<center><p>No updates available</p></center>";
                                }
                                
                            ?>
                        
                        </table>
                    </div>
                        </div>
                    </div>
                    <center><a href="all_appointment" style="color: #585858; font-size: 15px;">All Appointments<i class="fa fa-forward"></i></a></center>
                </div>
            
        </div>

<?php
// Close connection
mysqli_close($link);
?>
</div>
<?php include '../../footer.php'; ?>