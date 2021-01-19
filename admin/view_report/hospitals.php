<?php
   require '../session.php';
   require '../header.php';

$sql="SELECT * FROM blood_bank_hospital";
$result= mysqli_query($link, $sql);

mysqli_close($link);   
?>
<body>
	
	<div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            
            <div class="topic">
                <div class="form-style-2-heading"><div align="center">View Report</div><?php echo"<input class=\"search\" type=\"text\" id=\"search\" placeholder=\"Search bar\">";?></div>
            </div>
           
            <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head" >
                             <th class="cell100 column8">Hospital Name</th>
                             <th class="cell100 column4">District</th> 
                              <th class="cell100 column4">View Stock</th> 
                             
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
                                    $name= $row["Name"];
                                    $district = $row["District"];
                                    

                                echo "<tr class='row100 body'><td class='cell100 column8'>".$name."</td>";
                                echo "<td class='cell100 column4'>".$district."</td>";
                                echo "<td class='cell100 column4'><a href=\"stock_report?id=$hosid\"><i class='fa fa-info-circle'></i></a></td></tr>";
                                
                                
                            }
                                
                            ?>
                        
                        </table>
                    </div>
                        </div>
                    </div>
                   
                </div>
        </div>
        </div>
    </div>

<?php include '../../footer.php'; ?>