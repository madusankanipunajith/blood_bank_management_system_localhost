<?php
require_once "../session.php";
require('../header.php');
?>
<?php
$bankid= $_SESSION["id-3"];
$today= Date("Y-m-d");
$sql="SELECT * FROM campaign WHERE BHospitalID='$bankid' ORDER BY Dates DESC";
$result=mysqli_query($link, $sql);
?>

<body>

    <div class="container-row admin">
         <?php
            require '../dashboard.php';
        ?>

	<div class="main">
        <p><center><h2><a href="index" style="color: #BDBDBD;">New Campaigns</a>&nbsp;|&nbsp;<a href="details">All Campaigns</a></h2></center><span style=" margin-right: 20px;">
    
           <div class="container-table100">
                    <div style="width: 100%;">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th style="width: 20%;">Campaign Name</th>
                            <th style="width: 20%">Location</th>
                            <th style="width: 20%">Organization Name</th>
                            <th style="width: 15%">Date</th>
                            <th style="width: 10%">Estimate</th>
                            <th style="width: 10%">Status</th>
                           
                            
                            </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="table100-body" style="max-height: 370px;">
                        <table>
                            
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $name= $row["Name"];
                                    $location= $row["Location"];
                                    $date= $row["Dates"];
                                    $time= $row["Tme"];
                                    $estimate= $row["Estimate"];
                                    $user=$row["OrganizationID"];
                                    $flag = $row["Flag"];

                                    $sql2="SELECT OrganizationName FROM organization WHERE UserName='$user'";
                                    $result2=mysqli_query($link, $sql2);
                                    while($rows= mysqli_fetch_assoc($result2)){$org=$rows["OrganizationName"];}

                                    if ($flag==0) {
                                        $status="Pending";
                                        $class="pending";
                                    }elseif($flag==2){
                                        $status="Rejected";
                                        $class="rejected";
                                    }else{
                                        $status="Active";
                                        $class="activate";
                                    } 
                                    
                                    if ($today>$date) {
                                        $status="Expired";
                                        $class="expired";
                                    }


                                echo "<tr class='row100 body'><td style=\" line-height : 2.5;width: 20%;\">".$name."</td>";
                                echo "<td style=\"line-height : 2.5;width: 15%;\">".$location."</td>";
                                echo "<td style=\"line-height : 2.5;width: 20%;\">".$org."</td>";
                                echo "<td style=\"line-height : 2.5;width: 10%;\">".$date."</td>";
                                echo "<td style=\"line-height : 2.5;width: 10%;\">".$estimate."</td>";
                                echo "<td style=\"line-height : 2.5;width: 10%;\"class=\"$class clearfix\">".$status."</td><tr>";
                                
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