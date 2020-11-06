<?php
	require '../session.php';
	require '../header.php';
?>
<?php
$nic=$_SESSION["id-1"];
$sql="SELECT a.Volume AS Volume, b.Name AS Name, b.Dates AS Dates, b.Location AS Location,c.OrganizationName AS OrganizationName FROM donate_campaign a INNER JOIN campaign b ON a.campId=b.CampaignID INNER JOIN organization c ON c.UserName=b.OrganizationID WHERE donorId='$nic' ORDER BY Dates DESC";
$result=mysqli_query($link, $sql);

// Close connection
mysqli_close($link);
?>
<body>
	<div class="container-row donor">
        <?php
            require '../dashboard.php';
        ?>
        <div class="main">
            
            <div class="topic">
                 <div class="form-style-2-heading">Campaign Donations</div>
            </div>
            
             <div class="container-table200">
                <div style="width: 100%">
                    <div class="table100 ver2 m-b-110">
                        <div class="table100-head">
                            <table>
                                <thead>
                                <tr class="row100 head">
                                <th style="width: 30%;">Campaign Name</th>
                                <th style="width: 15%">Location</th>
                                <th style="width: 20%">Organization Name</th>
                                <th style="width: 15%">Volume</th>
                                <th style="width: 15%">Date</th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                            <div class="table100-body">
                                <table>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $date= $row["Dates"];
                                    $org= $row["OrganizationName"];
                                    $name= $row["Name"];
                                    $loc= $row["Location"];
                                    $volume= $row["Volume"];

                                    
                            echo "<tr class='row100 body'><td style=\" line-height : 2.5;width: 30%;\">".$name."</a></b></td>";
                            echo "<td style=\"line-height : 2.5;width: 15%;\">".$loc."</td>";
                            echo "<td style=\"line-height : 2.5;width: 20%;\">".$org."</td>";
                            echo "<td style=\"line-height : 2.5;width: 15%;\">".$volume."</td>";
                            echo "<td style=\"line-height : 2.5;width: 15%;\">".$date."</td><tr>";
                                
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