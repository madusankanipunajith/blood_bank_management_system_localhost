<?php
	require '../session.php';
	require '../header.php';
?>

<?php 
$nic=$_SESSION["id-1"];
$sql= "SELECT DISTINCT d.HospitalID AS HosID, d.Satisfaction AS Satisfaction, b.Name AS Name, b.District AS District FROM donor_satisfaction AS d INNER JOIN blood_bank_hospital AS b ON d.HospitalID=b.HospitalID WHERE d.DonorID='$nic'";
$result=mysqli_query($link, $sql);

?>

<body>
	<div class="container-row donor">
        <?php
            require '../dashboard.php';
        ?>
        <div class="main">
            <div class="topic">
                 <div class="form-style-2-heading">Hospital Donations</div>
            </div>
            
            <div class="container-table200">
                <div style="width: 100%">
                    <div class="table100 ver2 m-b-110">
                        <div class="table100-head">
                            <table>
                                <thead>
                                <tr class="row100 head">
                                <th style="width: 30%;">Hospital Name</th>
                                <th style="width: 15%">District</th>
                                <th style="width: 20%">Total Volume (ml)</th>
                                <th style="width: 15%">Like</th>
                                <th style="width: 15%">Dislike</th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                            <div class="table100-body">
                                <table>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $class="";
                                    $hosid= $row["HosID"];
                                    $flag= $row["Satisfaction"];
                                    $name= $row["Name"];
                                    $district= $row["District"];

                                    $sql2="SELECT SUM(Volume) AS sum FROM donate_hospital WHERE DonorId='$nic' AND HospitalId='$hosid'";
                                    $result2=mysqli_query($link, $sql2);
                                    while($rows= mysqli_fetch_assoc($result2)){$sum_volume=$rows["sum"];}

                                    if ($flag==2){
                                        $class="dislike";

                                    }
                                    if($flag==1){
                                    
                                        $class="like";
                                    }    

                            echo "<tr class='row100 body'><td style=\" line-height : 2.5;width: 30%;\"><b><a href=\"hospital_report?hosid=$hosid&hosname=$name&dis=$district\">".$name."</a></b></td>";
                            echo "<td style=\"line-height : 2.5;width: 15%;\">".$district."</td>";
                            echo "<td style=\"line-height : 2.5;width: 20%;\">".$sum_volume."</td>";
                                    if($class=='dislike'){$class="normal";}
                            echo "<td style=\"line-height : 2.5;width: 15%;\"><a href=\"satisfaction?like=$hosid\" class=\"$class clearfix\">Like</a></td>";
                                   if ($class=='normal') {$class="dislike"; } if($class=='like'){$class='normal';}
                            echo "<td style=\"line-height : 2.5;width: 15%;\"><a href=\"satisfaction?dislike=$hosid\" class=\"$class clearfix\">Dislike</a></td><tr>";
                                
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


