<?php
	
    require_once "../session.php";
    $today="";$today= date("Y-m-d");
	$username= $_SESSION["id-4"];
	// query
	$sql = "SELECT a.Name AS Name,a.Location AS Location,a.Estimate AS Estimate,a.Dates AS Dates,a.Tme AS Tme, b.Name AS HName FROM campaign a INNER JOIN blood_bank_hospital b ON a.BHospitalID=b.HospitalID WHERE Dates>'$today' ORDER BY Dates ASC";
	$result = mysqli_query($link, $sql);

?>
<?php
	require '../header.php';
?>
<body>

	<div class="container-row organization">
        <?php
            require('../sidebar.php');
        ?>

        <div class="main">
            <div class="topic">
            <div class="form-style-2-heading"><div align="center">Upcomming Campaigns</div><?php echo"<input class=\"search\" type=\"text\" id=\"search\" placeholder=\"Search bar\">";?></div></div>
                
				<div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th style="width: 20%;">Campaign Name</th>
                            <th style="width: 30%">Location</th>
                            <th style="width: 20%">Hospital</th>
                            <th style="width: 10%">Date</th>
                            <th style="width: 10%;">Time</th>
                            <th style="width: 5%">Estimate</th>
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
                                    
                                    $name = $row["Name"];
                                    $location = $row["Location"];
                                    $estimate = $row["Estimate"];
                                    $date= $row["Dates"];
                                    $time= $row["Tme"];
                                    $hosname = $row["HName"];

                                    echo "<tr class='row100 body'><td style=\" line-height : 2.5;width: 20%;\">".$name."</td>";
                                    echo "<td style=\"line-height : 2.5;width: 30%;\">".$location."</td>";
                                    echo "<td style=\"line-height : 2.5;width: 20%;\">".$hosname."</td>";
                                    echo "<td style=\"line-height : 2.5;width: 10%;\">".$date."</td>";
                                    echo "<td style=\"line-height : 2.5;width: 10%;\">".$time."</td>";
                                    echo "<td style=\"line-height : 2.5;width: 5%;\">".$estimate."</td></tr>";
                                
                                
                                }
                            }else{
                                echo "<center><p>No campaigns available !!!</p></center>";
                            }
                                
                        ?>
                            
                        
                        </table>
                            
                    </div>
                    
                        </div>
                    </div>
                </div>
			
<?php 
// Close connection
mysqli_close($link);
?>  
        </div>
    </div>
<?php include '../../footer.php'; ?>