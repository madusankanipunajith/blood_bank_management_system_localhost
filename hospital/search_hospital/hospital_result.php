<?php
// Initialize the session
require_once "../session.php";

// Define variables and initialize with empty values
$btype = $volume = "";
$btype_err = $volume_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){


     // Validate bloodgroup
    if(empty(trim($_POST["btype"]))){
        $btype_err = "Please select a blood Type";
    } else{
        $btype = trim($_POST["btype"]);
    }
    //echo "$btype";
    // Validate volume
    if(empty(trim($_POST["volume"]))){
        $volume_err = "Please enter a volume.";
    } else{
        $volume = trim($_POST["volume"]);
    }
    //remove the + symbol
    if (strpos($btype, '+') !== false) {
      $btypen = substr_replace($btype,"",-1);
      //echo "$btypen";
      }
    else {
         $btypen=$btype;
         //echo "$btypen";
    }

    $sql1 ="SELECT StockID FROM blood_stock INNER JOIN blood ON blood_stock.BloodID=blood.BloodID WHERE blood_stock.Volume>='$volume' AND blood.Type='$btype'";
    $result1= mysqli_query($link,$sql1);
    $count = mysqli_num_rows($result1);

    if(empty($btype_err) && empty($volume_err)){
      if($count > 0){

        $sql="SELECT blood_bank_hospital.HospitalID,blood_bank_hospital.Name, blood_bank_hospital.District, GROUP_CONCAT(blood_bank_hospital_telephone.TelephoneNo SEPARATOR ' / ') blood_bank_hospital_telephone FROM blood_bank_hospital INNER JOIN blood_bank_hospital_telephone ON blood_bank_hospital.HospitalID=blood_bank_hospital_telephone.BBID INNER JOIN blood_stock ON blood_bank_hospital.HospitalID=blood_stock.StockID INNER JOIN blood ON blood_stock.BloodId=blood.BloodID WHERE blood.Type='$btype' AND blood_stock.Volume>='$volume' GROUP BY blood_bank_hospital.Name, blood_bank_hospital.District";
        $result = mysqli_query($link, $sql);

      }
      else {
        //check + symbol
        if (strpos($btype, '+') !== false) {
          // code...
          header("location: avilable-result.php?blood=$btypen%2B&vol=$volume");
        }
        else {
          header("location: avilable-result.php?blood=$btypen&vol=$volume");
        }



      }


    }
    else{
        header("location: ../search_hospital/index.php?berror=$btype_err&verror=$volume_err");
    }

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
            <div class="topic">Search Results - <?php echo "(". "$btype". ")";?></div>

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
                          <th class="cell100 column4">Telephone Numbers</th>
        								</tr>
        							</thead>
        						</table>
        					</div>

        					<div class="table100-body ">
        						<table>
        							<tbody>
        							    <?php

                                  // output data of each row
                                  while($row = mysqli_fetch_assoc($result)) {
                                       $id = $row["HospitalID"];
                                       $name = $row["Name"];
                                       $district = $row["District"];
                                       $mobile= $row["blood_bank_hospital_telephone"];

                                       //echo "<tr class='row100 body'><td class='cell100 column1'>".$firstname." ".$lastname."</td>";
                                       if(strpos($btype, '+') !== false)
                                       {
                                         echo "<td class='cell100 column3'><a style=\"font-weight:bold;\" href=\"request.php?blood=$btypen%2B&vol=$volume&id=$id&name=$name\">".$name."</a></td>";
                                       }
                                       else {
                                         echo "<td class='cell100 column3'><a style=\"font-weight:bold;}\" href=\"request.php?blood=$btypen&vol=$volume&id=$id&name=$name\">".$name."</a></td>";
                                       }
                                       //echo "<td class='cell100 column6'><a style=\"a:hover{color:black; font-weight:bold;}\" href=\"request.php?blood=$btype&vol=$volume&id=$id\">".$id."</a></td>";
                                       //echo "<td class='cell100 column3'>".$name."</td>";
                                       echo "<td class='cell100 column3'>".$district."</td>";
                                       echo "<td class='cell100 column4'>".$mobile."</td>";

                                       echo "</tr>";
                                        }
                                    }
                              ?>
        							</tbody>
        						</table>
        					</div>
        				</div>
			        </div>
		        </div>
	        </div>
       <div style="font-size:20px; color:#848484; text-align:center;">Click on the Hospital Name to send a  Blood Request</div>

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
