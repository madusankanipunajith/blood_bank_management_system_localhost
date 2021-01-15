<?php
require '../session.php';
require '../header.php';
// Define variables and initialize with empty values
$bgroup = $location = "";
$bgroup_err = $location_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

     // Validate bloodgroup
    if(empty(trim($_POST["bgroup"]))){
        $bgroup_err = "Please select a blood group";     
    } else{
        $bgroup = trim($_POST["bgroup"]);
    }

    // Validate location
    if(empty(trim($_POST["location"]))){
        $location_err = "Please enter a location.";     
    } else{
        $location = trim($_POST["location"]);
    }
    
    if(empty($bgroup_err) && empty($location_err)){
        $sql = "SELECT nic, first_name, last_name, addressline1, addressline2, bloodgroup FROM donor WHERE bloodgroup = '$bgroup' AND district= '$location' AND validation='1'";

        $result = mysqli_query($link, $sql);
        
        
        
    }
    
    
}

?>

<body class="">


	<div class="container-row donor">

        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">Search Results - <?php echo "(". "$bgroup"." | "."$location". ")";?></div>

            <div class="limiter">
		        <div class="container-table100">
			        <div class="wrap-table100">
        				<div class="table100 ver2 m-b-110">
        					<div class="table100-head">
        						<table>
        							<thead>
        								<tr class="row100 head">
        									<th class="cell100 column3">Name</th>
        									<th class="cell100 column3">Address</th>
        									<th class="cell100 column3">Telephone</th>
                                            <th class="cell100 column3">Telephone</th>
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
                                                    $firstname = $row["first_name"];
                                                    $lastname = $row["last_name"];
                                                    $address = $row["addressline1"]." ".$row["addressline2"];
                                                    $nic= $row["nic"];

                                                    $sql2="SELECT TelephoneNo FROM donor_telephone WHERE NIC='$nic' ORDER BY Flag DESC";
                                                    $result2=mysqli_query($link, $sql2);
                                                    
                                                    echo "<tr class='row100 body'><td class='cell100 column3'>".$firstname." ".$lastname."</td>";
                                                    echo "<td class='cell100 column3'>".$address."</td>";
                                                    while($rows = mysqli_fetch_assoc($result2)){
                                                            $telephone= $rows["TelephoneNo"];
                                                            echo "<td class='cell100 column3'>".$telephone."</td>";
                                                        }
                                                    echo "</tr>";
                                                    
                                                }
                                            } else {
                                                  echo "<p style='padding: 10px; text-align: center; padding-top: 20px;'>Unfortunately, no Donors were found for the blood type</p>";
                                            }
                                        ?>
        							</tbody>
        						</table>
        					</div>
        				</div>
			</div>
		</div>
	        </div>
            
        </div>
    </div>    


<?php
// Close connection
mysqli_close($link);
?>
<?php include '../../footer.php'; ?>