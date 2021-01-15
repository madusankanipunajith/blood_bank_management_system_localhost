<?php
    require "../session.php";
    require('../header.php');
?>
<?php
    $bank_id= $_SESSION["id-3"];
    $sql= "SELECT DISTINCT organization.OrganizationName AS org_name, organization.District AS district, organization.President AS president, organization.Created_At AS tme, organization.UserName AS username FROM organization INNER JOIN campaign ON organization.UserName=campaign.OrganizationID WHERE campaign.BHospitalID='$bank_id' ORDER BY tme DESC";
    $result = mysqli_query($link, $sql);

?>
<body>
	
    <div style="float: right; width: 100%;">
    <p><center><h2><a href="index">Organization Details</a></h2></center><span style="float: right; margin-right: 20px;"><a href="../index">Home</a></span></p>
    
                <div class="container-table200">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110"> 
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th style="width: 20%;">Organization Name</th>
                            <th style="width: 12%">District</th>
                            <th style="width: 13%">President Name</th>
                            <th style="width: 15%">Date & Time</th>
                            <th style="width: 11%">Telephone</th>
                            <th style="width: 11%">Telephone2</th>
                            <th style="width: 9%">Count</th>
                            <th style="width: 9%">Approve</th>
                            
                            </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="table200-body">
                        <table>
                            
                          <?php
                                
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $status= "";
                                    
                                    $name = $row["org_name"];
                                    $location = $row["district"];
                                    $date= $row["tme"];
                                    $president = $row["president"];
                                    $username= $row["username"];

                                    $telephone= array();$i=0;
                                    $sql2= "SELECT DISTINCT TelephoneNo FROM organization_telephone WHERE OrgId='$username'";
                                    $result2= mysqli_query($link, $sql2);
                                    while ($rows= mysqli_fetch_assoc($result2)) {
                                        $telephone[$i]=$rows["TelephoneNo"];
                                        $i++;
                                    }
                                    $tel1= $telephone[0];
                                    $tel2= $telephone[1];

                                    $sql3= "SELECT COUNT(CampaignID) FROM campaign WHERE OrganizationID='$username' AND BHospitalID='$bank_id'";
                                    $result3= mysqli_query($link, $sql3);
                                    $count = mysqli_fetch_row($result3);

                                    $sql4= "SELECT COUNT(CampaignID) FROM campaign WHERE OrganizationID='$username' AND BHospitalID='$bank_id' AND Flag='1'";
                                    $result4= mysqli_query($link, $sql4);
                                    $approve = mysqli_fetch_row($result4);


                             echo "<tr class='row100 body'><td style=\" line-height : 2.5;width: 20%;\">".$name."</td>";
                                echo "<td style=\"line-height : 2.5;width: 12%;\">".$location."</td>";
                                echo "<td style=\"line-height : 2.5;width: 13%;\">".$president."</td>";
                                echo "<td style=\"line-height : 2.5;width: 15%;\">".$date."</td>";
                                echo "<td style=\"line-height : 2.5;width: 11%;\">".$tel1."</td>";
                                echo "<td style=\"line-height : 2.5;width: 11%;\">".$tel2."</td>"; 
                                echo "<td style=\"line-height : 2.5;width: 9%;\">".$count[0]."</td>";
                                echo "<td style=\"line-height : 2.5;width: 9%;\">".$approve[0]."</td></tr>";
                                
                                
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
<?php include '../../footer.php'; ?>