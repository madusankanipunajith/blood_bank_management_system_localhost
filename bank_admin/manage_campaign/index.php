<?php
require_once "../session.php";
require('../header.php');
include '../encrypt.php';
?>
<?php
$bankid= $_SESSION["id-3"];
$date= Date("Y-m-d");
$sql="SELECT * FROM campaign WHERE BHospitalID='$bankid' AND Flag='0' AND Dates>='$date' ORDER BY Dates DESC";
$result=mysqli_query($link, $sql);
$count=mysqli_num_rows($result);

?>

<body>
	<div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>
        <div class="main">
    <p><center><h2><a href="index">New Campaigns</a>&nbsp;|&nbsp;<a href="details" style="color: #BDBDBD;">All Campaigns</a></h2></center><span style=" margin-right: 20px;">
    <?php
        if (isset($_GET['del'])) {
            echo "<center><p style=\"color:red; font-size:20px;\">Deleted Successfully !!!</p></center>";
        }
        if (isset($_GET['accept'])) {
            echo "<center><p style=\"color:green; font-size:20px;\">Campaign Accepted Successfully !!!</p></center>";
        }
        if (isset($_GET['decline'])) {
            echo "<center><p style=\"color:red; font-size:20px;\">Campaign was Declined !!!</p></center>";
        }
    ?>

            <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th style="width: 15%;">Campaign Name</th>
                            <th style="width: 25%">Location</th>
                            <th style="width: 15%">Org. Name</th>
                            <th style="width: 15%">Date</th>
                            <th style="width: 8%;">Time</th>
                            <th style="width: 8%">Estimate</th>
                            <th style="width: 10%">Validate</th>
                            
                            </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="table100-body" style="max-height: 330px;">
                        <table>
                            <?php
                                while($row = mysqli_fetch_assoc($result)){
                                    $name= $row["Name"];
                                    $location= $row["Location"];
                                    $date= $row["Dates"];
                                    $time= $row["Tme"];
                                    $estimate= $row["Estimate"];
                                    $user=$row["OrganizationID"];
                                    $id=$row["CampaignID"];
                                    

                                    $sql2="SELECT OrganizationName FROM organization WHERE UserName='$user'";
                                    $result2=mysqli_query($link, $sql2);
                                    while($rows= mysqli_fetch_assoc($result2)){$orgname=$rows["OrganizationName"];}
                                echo "<tr class='row100 body'><td style=\" line-height : 2.5;width: 15%;\">".$name."</td>";
                                echo "<td style=\"line-height : 2.5;width: 25%;\">".$location."</td>";
                                echo "<td style=\"line-height : 2.5;width: 15%;\">".$orgname."</td>";
                                echo "<td style=\"line-height : 2.5;width: 15%;\">".$date."</td>";
                                echo "<td style=\"line-height : 2.5;width: 8%;\">".$time."</td>";
                                echo "<td style=\"line-height : 2.5;width: 8%;\">".$estimate."</td>";
                                    
                                echo "<td style=\"line-height : 2.5;width: 10%;\"><a href=\"session_update?id=$id&name=$name&loc=$location&org=$orgname&date=$date&time=$time&estim=$estimate\"><i class=\"fa fa-info-circle\"><i></a></td></tr>";
                                }

                                if ($count==0) {
                                    echo "<p>There is no updates yet</p>";
                                }

                            ?>
                               
                        
                        </table>
                    </div>
                    
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

