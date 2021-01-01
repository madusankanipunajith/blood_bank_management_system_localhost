<?php
    require '../session.php';
    require '../header.php';
$date= Date("Y-m-d");   
$sql="SELECT a.Name AS Name, a.Location AS Location, a.Estimate AS Estimate,a.Tme AS Tme, b.Name AS HospitalName, b.District AS District, c.OrganizationName AS Organization FROM campaign a INNER JOIN blood_bank_hospital b ON a.BHospitalID=b.HospitalID INNER JOIN organization c ON a.OrganizationID=c.UserName WHERE a.Dates='$date'";
$result=mysqli_query($link,$sql);    

?>
<body class="">

	
	<div class="container-row donor">

        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
                 <div class="form-style-2-heading">Today's Campaigns</div>
            </div>

            <div class="container-table100 clearfix" style="padding-top: 0px;">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110"> 
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column6">Camp Name</th>
                            <th class="cell100 column11">Organization</th>
                            <th class="cell100 column6">Hospital</th>
                            <th class="cell100 column4">Location</th>
                            <th class="cell100 column9">Estimate</th>
                            <th class="cell100 column9">Time</th>
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
                                    $organization=$row["Organization"];
                                    $district=$row["District"];
                                    $estimate = $row["Estimate"];
                                    $hosname = $row["HospitalName"];
                                    $time= $row["Tme"];
                                    $location = $row["Location"];
                                    $hospital=$hosname." / ".$district;

                                        echo "<tr class='row100 body'><td class=\"cell100 column6\">".$name."</td>";
                                        echo "<td class=\"cell100 column11\" >".$organization."</td>";
                                        echo "<td class=\"cell100 column6\">".$hospital."</td>";
                                        echo "<td class=\"cell100 column4\">".$location."</td>";
                                        echo "<td class=\"cell100 column9\">".$estimate."</td>"; 
                                    
                                        echo "<td class=\"cell100 column9\">".$time."</td></tr>";
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