<?php

    require "../session.php";
    require ('../header.php');
?>
<?php
$bankid= $_SESSION["id-3"];
$today=date("Y-m-d");
$sql="SELECT CampaignID, OrganizationID, Name, Location, Dates FROM campaign WHERE BHospitalID='$bankid' AND Flag='1' AND Dates<='$today' ORDER BY Dates DESC";
$result = mysqli_query($link, $sql);

// Close connection
mysqli_close($link);
?>

<body>
    <div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>
        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading">SELECT CAMPAIGN</div>
            </div>
            
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th style="width: 35%;">Campaign Name</th>
                            <th style="width: 25%">Location</th>
                            <th style="width: 25%">Date</th>
                            <th style="width: 15%">Select</th>
                            
                            </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="table200-body">
                        <table>
                            
                                <?php
                                
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    
                                    $name = $row["Name"];
                                    $location = $row["Location"];
                                    $date = $row["Dates"];
                                    $username= $row["OrganizationID"];
                                    $id= $row["CampaignID"];

                                   
                                echo "<tr class='row100 body'><td style=\" line-height : 2.5;width: 35%;\">".$name."</td>";
                                echo "<td style=\"line-height : 2.5;width: 25%;\">".$location."</td>";
                                echo "<td style=\"line-height : 2.5;width: 25%;\">".$date."</td>";
                                echo "<td style=\"line-height : 2.5;width: 15%;\"><a href=\"getuser?campid=$id\" style=\"color:blue;\"><i class=\"fa fa-info-circle\"></i></a></td></tr>";
                                
                                }
                                
                            ?>
                            
                        
                        </table>
                    </div>
                    
                        </div>
                    </div>
                
            
        </div>
    </div>    
<?php include '../../footer.php'; ?>