<?php
require '../session.php';
require '../header.php';


$sql="SELECT * FROM blood_bank_hospital ORDER BY District ASC";
$result= mysqli_query($link, $sql);

mysqli_close($link);
?>

<body>

	<div class="container-row organization">
        <?php
			require('../sidebar.php');
		?>

        <div class="main">
            <?php
                if (isset($_GET['reg'])) {
                    echo "<p style=\"color:green;\">Campaign Created successfully !!!</p>";
                }
            ?>
            
            <div class="topic">
            	<div class="form-style-2-heading"><div align="center">Hospital Selection</div><?php echo"<input class=\"search\" type=\"text\" id=\"search\" placeholder=\"Search bar\">";?></div>
            </div>
            
            <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head" >
                             <th class="cell100 column9">HosID</th>
                             <th class="cell100 column4">Hospital Name</th> 
                             <th class="cell100 column6">Address</th> 
                             <th class="cell100 column4">District</th>
                             <th class="cell100 column9">Select</th>
                          
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body">
                        <table>
                            <?php
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $hosid= $row["HospitalID"];
                                    $name = $row["Name"];
                                    $address = $row["Address"];
                                    $district = $row["District"];
                                
                                echo "<tr class='row100 body'><td class='cell100 column9'>".$hosid."</td>";
                                echo "<td class='cell100 column4'>".$name."</td>";
                                echo "<td class='cell100 column6'>".$address."</td>";
                                
                                echo "<td class='cell100 column4'>".$district."</td>";
                                echo "<td class='cell100 column9'><a href=\"more_info?hosid=$hosid&hosname=$name\"><i class=\"fa fa-history\"></i></a></td>";
                                
                                
                            }
                                
                            ?>
                        
                        </table>
                    </div>
                        </div>
                    </div>
                    
                </div>
            	
            
        </div>
    </div>
<?php include '../../footer.php'; ?>