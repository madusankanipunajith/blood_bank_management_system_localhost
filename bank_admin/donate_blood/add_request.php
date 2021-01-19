
<?php
    require '../session.php';
    require '../header.php';

    $hosid= $_SESSION['id-3'];
    $_SESSION['bloodid']="";
    if(isset($_GET['bloodbank'])){
        $_SESSION['hostype']="bloodbank";
    }
    if (isset($_GET['hospital'])) {
        $_SESSION['hostype']="hospital";
    }

    if ($_SESSION['hostype']=="bloodbank") {
        $sql="SELECT a.Name AS Name, a.District AS District, b.Dates AS Dates, b.Type AS Type, b.Amount AS Amount, b.ID AS ID FROM blood_bank_request b INNER JOIN blood_bank_hospital a ON b.SenderID=a.HospitalID WHERE b.ReceiverID='$hosid' ORDER BY Dates DESC";
        $result= mysqli_query($link, $sql);
    }
    if ($_SESSION['hostype']=="hospital") {
        $sql="SELECT a.Name AS Name, a.District AS District, b.Dates AS Dates, b.Type AS Type, b.Amount AS Amount, b.ID AS ID FROM normal_blood_request b INNER JOIN normal_hospital a ON b.SenderID=a.UserName WHERE b.ReceiverID='$hosid' ORDER BY Dates DESC";
        $result= mysqli_query($link, $sql);
    }

?>
<body class="">

	
	<div class="container-row donor">

        <?php
            require '../dashboard.php';
        ?>

        <div class="main">

            <div class="topic">
                 <div class="form-style-2-heading">Blood Requests</div>
            </div>

            <div class="container-table100 clearfix" style="padding-top: 0px;">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110"> 
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column4">Hospital Name</th>
                            <th class="cell100 column6">District</th>
                            <th class="cell100 column6">Date</th>
                            <th class="cell100 column9">Blood Type</th>
                            <th class="cell100 column9">Amount</th>
                            <th class="cell100 column9">Veiw/Add</th>
                            <th class="cell100 column9">Delete</th>
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
                                    $id=$row["ID"];
                                    $name = $row["Name"];
                                    $location = $row["District"];
                                    $date= $row["Dates"];
                                    $amount= $row["Amount"];
                                    $btype = $row["Type"];$sql2="SELECT BloodID FROM blood WHERE Type='$btype'";$result2=mysqli_query($link, $sql2);
                                    while ($row= mysqli_fetch_assoc($result2)) {$blood_id=$row["BloodID"];}

                                        echo "<tr class='row100 body'><td class=\"cell100 column4\">".$name."</td>";
                                        echo "<td class=\"cell100 column6\" >".$location."</td>";
                                        echo "<td class=\"cell100 column6\">".$date."</td>";
                                        echo "<td class=\"cell100 column9\">".$btype."</td>";
                                        echo "<td class=\"cell100 column9\">".$amount."</td>"; 
                                        echo "<td class=\"cell100 column9\"><i class=\"fa fa-eye\"></i></td>";
                                        echo "<td class=\"cell100 column9\"><a href=\"../application/delete_request?id=$id&bid=$blood_id&amount=$amount\" onclick=\"return confirm('Are you Sure ?');\"><i class=\"fa fa-times\"></i></a></td></tr>";
                                }
                            }else{
                                echo "<center><p>No requests available !!!</p></center>";
                            }  
                                
                            ?>      
                            
                        
                        </table>
                    </div>
                    
                        </div>
                    </div>
                </div>

                <center><a href="appointment" class="button">+ Add New</a></center>

        </div>
<?php mysqli_close($link);?>
    </div>



<?php include '../../footer.php'; ?>

