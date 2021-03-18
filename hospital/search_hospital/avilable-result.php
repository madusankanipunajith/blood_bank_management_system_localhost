<?php
// Initialize the session
require_once "../session.php";
// Define variables and initialize with empty values
$btype=$count="";
if($_SERVER['REQUEST_METHOD']=="GET")
{
  if(isset($_GET['blood'])){$btype=$_GET['blood'];}
  if(isset($_GET['vol'])){$count=$_GET['vol'];}
}
    //echo "$btype";
    //$sql1 ="SELECT blood_bank_hospital.HospitalID, blood_bank_hospital.Name, blood_stock.Volume FROM blood_bank_hospital INNER JOIN blood_stock ON blood_bank_hospital.HospitalID=blood_stock.StockID INNER JOIN blood ON blood.BloodID= blood_stock.BloodID WHERE blood.Type='$btype' AND blood_stock.Volume>0";
    $sql1 ="SELECT blood_bank_hospital.Name, blood_bank_hospital.District,blood_stock.Volume, GROUP_CONCAT(blood_bank_hospital_telephone.TelephoneNo SEPARATOR ' / ') blood_bank_hospital_telephone FROM blood_bank_hospital INNER JOIN blood_bank_hospital_telephone ON blood_bank_hospital.HospitalID=blood_bank_hospital_telephone.BBID INNER JOIN blood_stock ON blood_bank_hospital.HospitalID=blood_stock.StockID INNER JOIN blood ON blood_stock.BloodId=blood.BloodID WHERE blood.Type='$btype' AND blood_stock.Volume>0 GROUP BY blood_bank_hospital.Name";
    $result1= mysqli_query($link,$sql1);
    $x =(int)$count/4;


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
                          <th class="cell100 column3">Name</th>
        									<th class="cell100 column3">District</th>
        									<th class="cell100 column6">Volume(ml)</th>
                          <th class="cell100 column4">Telephone number(s)</th>
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
                                      //$id = $row["HospitalID"];
                                       $name = $row["Name"];
                                       $district = $row["District"];
                                       $volume = $row["Volume"];
                                       $mobile = $row["blood_bank_hospital_telephone"];

                                       if($volume < $x)
                                       {
                                           $fontColor = '#f17878';
                                       }
                                       elseif($volume < 2*$x)
                                       {
                                           $fontColor = '#bb1c1c';
                                       }
                                       elseif($volume < 3*$x)
                                       {
                                         
                                        $fontColor = ' #640b0b';
                                       }
                                       else{
                                           $fontColor='#350505';
                                       }

                                       //echo "<tr class='row100 body'><td class='cell100 column1'>".$firstname." ".$lastname."</td>";
                                       echo "<td class='cell100 column3'>".$name."</td>";
                                       echo "<td class='cell100 column3'>".$district."</td>";
                                       echo "<td class='cell100 column6'><i class='fa fa-tint' aria-hidden='true' style='color: $fontColor;'></i></td>"; //".$volume."
                                       echo "<td class='cell100 column4'>".$mobile."</td>";

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
            <div class='bloodVolume'>
            <i class='fa fa-tint' aria-hidden='true' style='color:#f17878;'>  0-<?php echo $x;?></i>
            <i class='fa fa-tint' aria-hidden='true' style='color:#bb1c1c;'>  <?php echo $x+1," - ", 2*$x; ?></i>
            <i class='fa fa-tint' aria-hidden='true' style='color:#640b0b;'>  <?php echo 2*$x+1," - ", 3*$x; ?></i>
            <i class='fa fa-tint' aria-hidden='true' style='color:#350505;'>  <?php echo 3*$x+1," - ", 4*$x; ?></i>
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
