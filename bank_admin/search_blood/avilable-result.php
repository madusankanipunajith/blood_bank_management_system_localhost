<?php
// Initialize the session
require_once "../session.php";
// Define variables and initialize with empty values
$btype="";
if($_SERVER['REQUEST_METHOD']=="GET")
{
  if(isset($_GET['blood'])){$btype=$_GET['blood'];}
}
    //echo "$btype";
    $sql1 ="SELECT blood_bank_hospital.HospitalID, blood_bank_hospital.Name, blood_stock.Volume FROM blood_bank_hospital INNER JOIN blood_stock ON blood_bank_hospital.HospitalID=blood_stock.StockID INNER JOIN blood ON blood.BloodID= blood_stock.BloodID WHERE blood.Type='$btype' AND blood_stock.Volume>0";
    $result1= mysqli_query($link,$sql1);

?>

<?php

require_once "../header.php";

?>


<body class="">


	<div class="container-row hospital">

    <?php
        require_once "../dashboard.php";
    ?>


        <div class="main">
            <div class="topic" style="color:red;font-size:15px;">Request blood volume not available</div>
            <div class="topic" style="font-size:20px; margin-top:10px;">Available blood stock</div>

            <div class="limiter">
		        <div class="container-table100">
			        <div class="wrap-table100">
        				<div class="table100 ver2 m-b-110">
        					<div class="table100-head">
        						<table>
        							<thead>
        								<tr class="row100 head">
                          <th class="cell100 column3">Hospital ID</th>
        									<th class="cell100 column3">Name</th>
        									<th class="cell100 column3">Volume</th>
        								</tr>
        							</thead>
        						</table>
        					</div>

        					<div class="table100-body ">
        						<table>
        							<tbody>
        							    <?php

                                  // output data of each row
                                  while($row = mysqli_fetch_assoc($result1)) {
                                       $id = $row["HospitalID"];
                                       $name = $row["Name"];
                                       $volume = $row["Volume"];

                                       //echo "<tr class='row100 body'><td class='cell100 column1'>".$firstname." ".$lastname."</td>";
                                       echo "<td class='cell100 column3'>".$id."</td>";
                                       echo "<td class='cell100 column3'>".$name."</td>";
                                       echo "<td class='cell100 column3'>".$volume."</td>";


                                       echo "</tr>";
                                        }


                              ?>
        							</tbody>
        						</table>
        					</div>
        				</div>
			        </div>
		        </div>
	        </div>
       <!--<div style="font-size:20px; color:#848484; text-align:center;">Click on the Hospital ID to send a  Blood Request</div>-->

       </div>
        </div>

    </div>
<?php
// Close connection
mysqli_close($link);
?>
<?php include '../../footer.php'; ?>
</body>

</html>
