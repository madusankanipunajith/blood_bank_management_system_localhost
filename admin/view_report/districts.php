<?php
   require '../session.php';
   require '../header.php';

$sql="SELECT district, COUNT(nic) AS count FROM donor WHERE validation=1 GROUP BY district ORDER BY district ASC";
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
                <div class="form-style-2-heading">Valid Donors (District Wise)</div>
            </div>
           
            <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head" >
                             <th class="cell100 column8">District</th>
                             <th class="cell100 column4">Validate Donors</th> 
                              <th class="cell100 column4">View More</th> 
                             
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body">
                        <table>
                            <?php
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                        
                                    $count= $row["count"];
                                    $district = $row["district"];
                                    

                                echo "<tr class='row100 body'><td class='cell100 column8'>".$district."</td>";
                                echo "<td class='cell100 column4'>".$count."</td>";
                                echo "<td class='cell100 column4'><a href=\"donor_report?dis=$district\"><i class='fa fa-info-circle'></i></a></td></tr>";
                                
                                
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

</body>
</html>