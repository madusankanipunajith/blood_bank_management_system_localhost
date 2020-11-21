<?php

require_once "../session.php";
require_once '../header.php';

$time=$date=$hosname=$err=$status=$district="";
$nic= $_SESSION["id-1"];
$today= date("Y-m-d");
    // queries
$sql = "SELECT * FROM donor_reservation WHERE ID=(SELECT MAX(ID) FROM donor_reservation WHERE DonorID= '$nic')";

$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if($count!=1){
   $err= "no result";
}


?>
<?php
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
        $hosid = $row["HosID"];
        $date = $row["Dates"];
        $time = $row["Tme"];
        $flag = $row["Flag"];

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
}
    //query
    $sql2 = "SELECT blood_bank_hospital.Name, blood_bank_hospital.District FROM blood_bank_hospital  INNER JOIN campaign ON blood_bank_hospital.HospitalID = '$hosid'";
        $result2 = mysqli_query($link, $sql2);
        $rows = mysqli_fetch_row($result2);
        $hosname= $rows[0];
        $district= $rows[1];


    // Close connection
    mysqli_close($link);
        

?>


<body>

	<div class="container-row organization">

        <?php
            require_once "../dashboard.php";
        ?>



        <div class="main">

            <div class="topic">
                <div>Latest Appointment <?php 
                if (!empty($status)) {
                    echo "<p class=\"$class\">".$status."</p>";
                }
                ?>                    
                </div>
            </div>
            <?php
                if (!empty($err)) {
                    echo "<center><p style=\"color:red;\">No Result Found</p></center>";
                }
            ?>
            <div class="container-table100" style="padding: 0px 30px;">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head" >
                            <marquee style="font-size: 15px;">*   *   *   *   *   * Latest Appointment Details  *   *   *   *   *   *   *</marquee>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body">
                        <table>
                            <?php

                                echo "<tr class='row100 body'><td class='cell100 column2'>Hospital Name</td>";
                                echo "<td class='cell100 column2'>".$hosname."</td></tr>";
                                echo "<tr class='row100 body'><td class='cell100 column2'>District</td>";
                                echo "<td class='cell100 column2'>".$district."</td></tr>";
                                echo "<tr class='row100 body'><td class='cell100 column2'>Date</td>";
                                echo "<td class='cell100 column2'>".$date."</td></tr>";
                                echo "<tr class='row100 body'><td class='cell100 column2'>Time( 24 hours)</td>";
                                echo "<td class='cell100 column2'>".$time."</td></tr>";

                                
                                
                            ?>
                        
                        </table>
                    </div>
                        </div>
                    </div>
                    <center><a href="details" style="color: #585858; font-size: 15px;">View More Result</a></center>
                </div>

                

        </div>

    </div>



<?php include '../../footer.php'; ?>