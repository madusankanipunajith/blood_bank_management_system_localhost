<?php
	
    require_once "../session.php";
    $today="";
	$username= $_SESSION["id-4"];
	// query
	$sql = "SELECT * FROM campaign WHERE OrganizationID ='$username' ORDER BY Dates DESC";
	$result = mysqli_query($link, $sql);

    $today= date("Y-m-d");

?>
<?php
	require '../header.php';
?>
<body>
	<div style="float: right; width: 100%; height: 100%;">
    <p><center><h2><a href="details">More Details</a></h2></center><span style="float: right; margin-right: 20px;"><a href="index">Back</a>&nbsp;|&nbsp;<a href="../index">Home</a></span></p>
    <?php
        if (isset($_GET['del'])) {
            echo "<center><p style=\"color:red; font-size:20px;\">Deleted Successfully !!!</p></center>";
        }
    ?>
				<div class="container-table200">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th style="width: 20%;">Campaign Name</th>
                            <th style="width: 15%">Location</th>
                            <th style="width: 20%">Hospital Name</th>
                            <th style="width: 8%">Date</th>
                            <th style="width: 8%;">Time(24 H)</th>
                            <th style="width: 8%">Estimate</th>
                            <th style="width: 8%">Status</th>
                            <th style="width: 10%">Delete</th>
                            
                            </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="table200-body">
                        <table>
                            
								<?php
								
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $status= "";
    								
                                    $name = $row["Name"];
                                    $location = $row["Location"];
                                    $estimate = $row["Estimate"];
                                    $date= $row["Dates"];
                                    $time= $row["Tme"];
                                    $id = $row["BHospitalID"];
                                    $campid = $row["CampaignID"];
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




                                   //query
							$sql2 = "SELECT blood_bank_hospital.Name FROM blood_bank_hospital  INNER JOIN campaign ON blood_bank_hospital.HospitalID = '$id'";
							$result2 = mysqli_query($link, $sql2);
							$rows = mysqli_fetch_row($result2);
  							$hosname= $rows[0];


                             echo "<tr class='row100 body'><td style=\" line-height : 2.5;width: 20%;\">".$name."</td>";
                                echo "<td style=\"line-height : 2.5;width: 15%;\">".$location."</td>";
                                echo "<td style=\"line-height : 2.5;width: 20%;\">".$hosname."</td>";
                                echo "<td style=\"line-height : 2.5;width: 8%;\">".$date."</td>";
                                echo "<td style=\"line-height : 2.5;width: 8%;\">".$time."</td>";
                                echo "<td style=\"line-height : 2.5;width: 8%;\">".$estimate."</td>";
                                echo "<td style=\"line-height : 2.5;width: 8%;\" class=\"$class clearfix\">".$status."</td>";
                                echo "<td style=\"line-height : 2.5;width: 10%;\"><a href=\"delete-campaign?index=$campid\" onclick=\"return confirm('Warning! : This Cannot be undone... If you proceed, your all data will be lost. (cannot be recover)')\"> Delete</a></td></tr>";
                                
                                }
                                
                            ?>
                            
                        
                        </table>
                    </div>
                    
                        </div>
                    </div>
                </div>
			</div>
<?php 
// Close connection
mysqli_close($link);
?>
</body>
<?php include '../../footer.php'; ?>