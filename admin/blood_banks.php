<?php
   //require '../config.php';
   require 'session.php';
   require 'header.php';
    // queries
    $sql = "SELECT HospitalID, Name, District FROM blood_bank_hospital ORDER BY Name ASC";
    $result = mysqli_query($link, $sql);

    
    // Close connection
    mysqli_close($link);

?>

<body>

	<center>
		<div style="width: 60%">
                <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column6">Hospital ID</th>
                            <th class="cell100 column7">Hospital Name</th>
                            <th class="cell100 column8">District</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body">
                        <table>
                            <?php
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
    
                                    $id = $row["HospitalID"];
                                    $hosname = $row["Name"];
                                    $district= $row["District"];

                                echo "<tr class='row100 body'><td class='cell100 column6'>".$id."</td>";
                                echo "<td class='cell100 column7'>".$hosname."</td>";
                                echo "<td class='cell100 column8'>".$district."</td></tr>";

                                }
                                
                            ?>
                        
                        </table>
                    </div>
                        </div>
                    </div>
                </div>
                    
                    
            </div>
	</center>
	
<?php include '../footer.php'; ?>