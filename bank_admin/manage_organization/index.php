<?php
    require '../session.php';
    require '../header.php';
?>
<?php
    $dates= date("Y-m-d");
    $bank_id= $_SESSION["id-3"];
    $sql= "SELECT DISTINCT organization.OrganizationName AS org_name, organization.District AS district, organization.President AS president, organization.Created_At AS tme, organization.UserName AS username FROM organization INNER JOIN campaign ON organization.UserName=campaign.OrganizationID WHERE campaign.BHospitalID='$bank_id' ORDER BY tme DESC";
    $result = mysqli_query($link, $sql);

?>
<body class="">

	
	<div class="container-row donor">

        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading"><div align="center"><a href="index">Organization Details</a></div><?php echo"<input class=\"search\" type=\"text\" id=\"search\" placeholder=\"Search bar\">";?></div>
            </div>
            <div class="container-table100 clearfix">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110"> 
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column4">Organization Name</th>
                            <th class="cell100 column6">District</th>
                            <th class="cell100 column6">President Name</th>
                            <th class="cell100 column6">Telephone</th>
                            <th class="cell100 column6">Telephone2</th>
                            <th class="cell100 column9">Count</th>
                            
                            </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="table100-body">
                        <table>
                            
                          <?php
                                
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $approve="";
                                    
                                    $name = $row["org_name"];
                                    $location = $row["district"];
                                    $date= $row["tme"];
                                    $president = $row["president"];
                                    $username= $row["username"];

                                    $telephone= array();$i=0;$telephone[1]="";
                                    $sql2= "SELECT DISTINCT TelephoneNo FROM organization_telephone WHERE OrgId='$username' ORDER BY Flag DESC";
                                    $result2= mysqli_query($link, $sql2);
                                    while ($rows= mysqli_fetch_assoc($result2)) {
                                        $telephone[$i]=$rows["TelephoneNo"];
                                        $i++;
                                    }
                                    $tel1= $telephone[0];
                                    $tel2= $telephone[1];
                                    /*
                                    $sql3= "SELECT COUNT(CampaignID) FROM campaign WHERE OrganizationID='$username' AND BHospitalID='$bank_id'";
                                    $result3= mysqli_query($link, $sql3);
                                    $count = mysqli_fetch_row($result3);
                                    */
                                    $sql4= "SELECT COUNT(CampaignID) AS count FROM campaign WHERE OrganizationID='$username' AND BHospitalID='$bank_id' AND Flag='1'";
                                    $result4= mysqli_query($link, $sql4);
                                    while ($rows= mysqli_fetch_assoc($result4)) {$approve= $rows["count"];}
                                    

                                        echo "<tr class='row100 body'><td class=\"cell100 column4\">".$name."</td>";
                                        echo "<td class=\"cell100 column6\" >".$location."</td>";
                                        echo "<td class=\"cell100 column6\">".$president."</td>";
                                        echo "<td class=\"cell100 column6\">".$tel1."</td>";
                                        echo "<td class=\"cell100 column6\">".$tel2."</td>"; 
                                        echo "<td class=\"cell100 column9\">".$approve."</td></tr>";
                                }
                                
                            ?>      
                            
                        
                        </table>
                    </div>
                    
                        </div>
                    </div>
                </div>

        </div>
<?php 
// Close connection
mysqli_close($link);
?>
    </div>



<?php include '../../footer.php'; ?>