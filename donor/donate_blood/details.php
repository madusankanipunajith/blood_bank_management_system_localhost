<?php
   require '../session.php';
   require '../header.php';

    $NIC = $_SESSION["id-1"];

    $flag=$status=$date=$time=$district=$hosname="";

    $today= date("Y-m-d");

        // queries
        $sql = "SELECT a.Dates AS Dates, a.Tme AS Tme, b.Name AS Name, b.District AS District FROM donor_reservation a INNER JOIN blood_bank_hospital b ON a.HosID= b.HospitalID ORDER BY Dates DESC";
        $result = mysqli_query($link, $sql);    


mysqli_close($link);

?>

<body>
	<div class="container-row donor">

        <?php
            require '../dashboard.php';
        ?>

        <div class="main clearfix">
            
            
            <div style=" width: 100%">
                <center><h5>All Appointments</h5></center>
                <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column4">Hospital Name</th>
                            <th class="cell100 column4">District</th>
                            <th class="cell100 column6">Date</th>
                            <th class="cell100 column6">Time</th>
                            <th class="cell100 column6">Status</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body clearfix">
                        <table>
                            <?php
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
    
                                    $hosname = $row["Name"];
                                    $district = $row["District"];
                                    $date= $row["Dates"];
                                    $time= $row["Tme"];

                                    if ($flag==0) {
                                        $status="Pending";
                                        $class="pending";
                                    }elseif($flag==2){
                                        $status="Rejected";
                                        $class="rejected";
                                    }else{
                                        $status="Active";
                                        $class="activate";
                                    } 
                                    
                                    if ($today>$date) {
                                        $status="Expired";
                                        $class="expired";
                                    }

                                echo "<tr class='row100 body'><td class='cell100 column4'>".$hosname."</td>";
                                echo "<td class='cell100 column4'>".$district."</td>";
                                echo "<td class='cell100 column6'>".$date."</td>";
                                echo "<td class='cell100 column6'>".$time."</td>";
                                echo "<td class='cell100 column6 $class clearfix'>".$status."</td></tr>";

                                }
                                
                            ?>
                        
                        </table>
                    </div>
                        </div>
                    </div>
                </div>
                    
                <div style="margin-left: 35%;">
                    <a href="latest_appointment" style="font-size: 20px;">
                        <div class="tile-3">
                        Back
                        </div>
                    </a>
                </div>
                
            </div>



        </div>

    </div>



<?php include '../../footer.php'; ?>