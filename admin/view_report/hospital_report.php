<?php

require_once "../session.php";
require_once '../header.php';

$name=$district=$capacity=$admin_count=$donor_count=$camp_count="";

$sql="SELECT a.HospitalID AS ID, a.Name as Name, a.District AS District, a.Capacity AS Capacity, COUNT(b.NIC) AS AdminCount FROM blood_bank_hospital a LEFT JOIN blood_bank_admin b ON a.HospitalID=b.BloodBankID GROUP BY a.HospitalID ORDER BY District ASC";
$result= mysqli_query($link, $sql);


?>


<body>

	<div class="container-row admin">

        <?php
            require_once "../dashboard.php";
        ?>



        <div class="main clearfix">

            <div class="container-table100" style="padding: 0px 30px;">
                    <div style="width: 100%;">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head" >
                                <th class="cell100 column4">Hospital Name</th>
                                <th class="cell100 column6">District</th> 
                                <th class="cell100 column6">Capacity(Pr Day)</th>   
                                <th class="cell100 column6">Admins</th>
                                <th class="cell100 column6">Donors</th> 
                                <th class="cell100 column6">Campaigns</th>

                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body" style="max-height: 450px;">
                        <table>
                            <?php

                                while ($row= mysqli_fetch_assoc($result)) {
                                    $hosid=$row["ID"];
                                    $name= $row["Name"];
                                    $district= $row["District"];
                                    $capacity=$row["Capacity"];
                                    $admin_count= $row["AdminCount"];

                                    $sql2="SELECT DISTINCT DonorID FROM donor_reservation WHERE HosID='$hosid' AND Flag='1'";
                                    $result2=mysqli_query($link, $sql2);$donor_count= mysqli_num_rows($result2);
                                    $sql3="SELECT DISTINCT CampaignID FROM campaign WHERE BHospitalID='$hosid'";
                                    $result3=mysqli_query($link, $sql3);$camp_count= mysqli_num_rows($result3);

                                    echo "<tr class='row100 body'><td class='cell100 column4'>".$name."</td>";
                                    echo "<td class='cell100 column6'>".$district."</td>";
                                    echo "<td class='cell100 column6'>".$capacity."</td>";
                                    echo "<td class='cell100 column6'>".$admin_count."</td>";
                                    echo "<td class='cell100 column6'>".$donor_count."</td>";
                                    echo "<td class='cell100 column6'>".$camp_count."</td></tr>";
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