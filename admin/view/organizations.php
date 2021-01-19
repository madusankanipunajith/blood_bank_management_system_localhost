<?php
    require '../session.php';
    require '../header.php';
$date= Date("Y-m-d");   
$sql="SELECT a.OrganizationName AS Name, a.President AS President, a.District AS District, a.Email AS Email, GROUP_CONCAT(b.TelephoneNo SEPARATOR ' / ') AS Telephone FROM organization a INNER JOIN organization_telephone b ON a.UserName=b.OrgId GROUP BY a.UserName ORDER BY District ASC";
$result=mysqli_query($link,$sql);    

?>
<body class="">

	
	<div class="container-row donor">

        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
                 <div class="form-style-2-heading"><div align="center">Organizations</div><?php echo"<input class=\"search\" type=\"text\" id=\"search\" placeholder=\"Search bar\">";?></div>
            </div>

            <div class="container-table100 clearfix" style="padding-top: 0px;">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110"> 
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column6">Org Name</th>
                            <th class="cell100 column6">President Name</th>
                            <th class="cell100 column6">District</th>
                            <th class="cell100 column4">Email</th>
                            <th class="cell100 column3">Contact</th>
                            </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="table100-body">
                        <table>
                            
                          <?php
                                
                            if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $name=$row["Name"];
                                    $president=$row["President"];
                                    $district=$row["District"];
                                    $email = $row["Email"];
                                    $telephone = $row["Telephone"];
                                    

                                        echo "<tr class='row100 body'><td class=\"cell100 column6\">".$name."</td>";
                                        echo "<td class=\"cell100 column6\" >".$president."</td>";
                                        echo "<td class=\"cell100 column6\">".$district."</td>";
                                        echo "<td class=\"cell100 column4\">".$email."</td>";
                                    
                                        echo "<td class=\"cell100 column3\">".$telephone."</td></tr>";
                                }
                            }else{
                                echo "<center><p>No Updates Available !!!</p></center>";
                            }  
                                
                            ?>      
                            
                        
                        </table>
                    </div>
                    
                        </div>
                    </div>
                </div>

                <center><a href="../index" class="button">Back</a></center>

        </div>
<?php mysqli_close($link);?>
    </div>



<?php include '../../footer.php'; ?>