<?php
require_once "../session.php";
require('../header.php');

?>
<?php
$bankid= $_SESSION["id-3"];
$date= date("Y-m-d");
$sql= "SELECT * FROM donor_reservation WHERE Dates>'$date' AND HosID='$bankid' AND Flag!='2' ORDER BY Dates ASC";
$result= mysqli_query($link, $sql);

 
?>
<body>
	
	<div class="container-row admin">
        <?php
        require_once "../dashboard.php";
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading"><a href="index">Upcomming Appointments</a></div>
            </div>
            <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head" >
                             <th class="cell100 column6">NIC</th>
                             <th class="cell100 column3">Full Name</th> 
                              <th class="cell100 column6">Gender</th> 
                             <th class="cell100 column6">District</th> 
                             <th class="cell100 column6">Date</th>
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
                                echo "<td class='cell100 column3'>".$name."</td>";
                                echo "<td class='cell100 column6'>".$gender."</td>";
                                echo "<td class='cell100 column6'>".$district."</td>";
                                echo "<td class='cell100 column6'>".$date."</td>";
                                echo "<td class='cell100 column6'>".$time."</td></tr>";
                            }
                                
                            ?>
                        
                        </table>
                    </div>
                        </div>
                    </div>
                    <center><a href="index" style="color: #585858; font-size: 15px;">Today Appointment</a></center>
                </div>
            
        </div>

<?php
// Close connection
mysqli_close($link);
?>
<?php include '../../footer.php'; ?>