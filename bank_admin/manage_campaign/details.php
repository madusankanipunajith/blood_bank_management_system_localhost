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
	<div style="float: right; width: 100%;">
    <p><center><h2><a href="index" style="color: #BDBDBD;">New Campaigns</a>&nbsp;|&nbsp;<a href="details">All Campaigns</a></h2></center><span style="float: right; margin-right: 20px;"><a href="../index">Home</a></span></p>
    
           <div class="container-table200">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th style="width: 20%;">Campaign Name</th>
                            <th style="width: 15%">Location</th>
                            <th style="width: 20%">President Name</th>
                            <th style="width: 10%">Date</th>
                            <th style="width: 10%;">Time(24 H)</th>
                            <th style="width: 10%">Estimate</th>
                            <th style="width: 10%">Status</th>
                           
                            
                            </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="table200-body">
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

                                    $sql2="SELECT President FROM organization WHERE UserName='$user'";
                                    $result2=mysqli_query($link, $sql2);
                                    while($rows= mysqli_fetch_assoc($result2)){$president=$rows["President"];}

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
                                echo "<td style=\"line-height : 2.5;width: 20%;\">".$president."</td>";
                                echo "<td style=\"line-height : 2.5;width: 10%;\">".$date."</td>";
                                echo "<td style=\"line-height : 2.5;width: 10%;\">".$time."</td>";
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
<?php 
// Close connection
mysqli_close($link);
?>
<?php include '../../footer.php'; ?>