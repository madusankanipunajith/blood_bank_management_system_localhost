<?php

require_once "../session.php";
require_once '../header.php';
$bankid=$_SESSION["id-3"];
$sql = "SELECT s.BloodId, s.Volume, b.BloodId, b.Type FROM blood_stock s, blood b WHERE b.BloodId = s.BloodId AND s.StockID='$bankid'";

$result = mysqli_query($link, $sql);


// Close connection
mysqli_close($link);
?>



<body>
	<div class="container-row admin">
        <?php
        require_once '../dashboard.php';
        ?>

        <div class="main">
             <?php if (isset($_GET['update'])) { echo "<center><p style=\"color:green; margin-bottom:0px;\">Updated Successfully !!!</p></center>";} ?>
            <center><h2><a href="index">Your Hospital's Blood Stock Details</a></h2></center>   
            <div class="limiter">
		        <div class="container-table100">
			        <div class="wrap-table100">
        				<div class="table100 ver2 m-b-110">
        					<div class="table100-head">
        						<table>
        							<thead>
        								<tr class="row100 head">
        									<th class="cell100 column1">Blood Type</th>
        									<th class="cell100 column2">Number of Units</th>
        								</tr>
        							</thead>
        						</table>
        					</div>
            
        					<div class="table100-body ">
        						<table>
        							<tbody>
        							    <?php 
                                            if (mysqli_num_rows($result) > 0) {
                                                  // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    $type = $row["Type"];
                                                    $volume = $row["Volume"];
                                                    
                                                    echo "<tr class='row100 body'><td class='cell100 column1'>".$type."</td>";
                                                    echo "<td class='cell100 column2'>".$volume."</td></tr>";
                                                    
                                                }
                                            } else {
                                                  echo "<p style='padding: 10px; text-align: center; padding-top: 20px;'>Unfortunately, no result found</p>";
                                            }
                                        ?>
        							</tbody>
        						</table>
        					</div>

        			    </div>
                        <center><a href="update_stock.php"><button style = "width: 200px;">Update Blood Stocks</button></a></center>
			        </div>
		        </div>
		        
		        
            </div>
            
           
            
            
        </div>
    </div>

<?php include '../../footer.php'; ?>