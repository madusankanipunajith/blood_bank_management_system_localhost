<?php
    require '../session.php';
    require '../header.php';
?>
<?php
    $dates= date("Y-m-d");
    $bank_id= $_SESSION["id-3"];
    $sql="SELECT a.ID AS ID,a.SenderID AS SenderID, a.Type AS Type, a.Amount AS Amount, a.Dates AS Dates, b.Name AS Name, b.District AS District FROM blood_bank_request a INNER JOIN blood_bank_hospital b ON a.ReceiverID=b.HospitalID WHERE SenderID='$bank_id'";
    $result= mysqli_query($link, $sql);

?>
<body class="">

	
	<div class="container-row donor">

        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading"><div align="center"><a href="index">Packet Requests</a></div><?php echo"<input class=\"search\" type=\"text\" id=\"search\" placeholder=\"Search bar\">";?></div>
            </div>
            <div class="container-table100 clearfix">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110"> 
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column9">Req ID</th>    
                            <th class="cell100 column3">Hospital Name</th>
                            <th class="cell100 column6">District</th>
                            <th class="cell100 column6">Type</th>
                            <th class="cell100 column6">Amount</th>
                            <th class="cell100 column6">Date</th>
                            
                            </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="table100-body">
                        <table>
                            
                          <?php
                                
                            if (mysqli_num_rows($result) >0) {
                                    // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                   
                                    
                                    $id = $row["ID"];
                                    $district = $row["District"];
                                    $date= $row["Dates"];
                                    $name = $row["Name"];
                                    $amount= $row["Amount"];
                                    $type= $row["Type"];

                                        echo "<tr class='row100 body'><td class=\"cell100 column9\">".$id."</td>";
                                        echo "<td class=\"cell100 column3\" >".$name."</td>";
                                        echo "<td class=\"cell100 column6\">".$district."</td>";
                                        echo "<td class=\"cell100 column6\">".$type."</td>";
                                        echo "<td class=\"cell100 column6\">".$amount."</td>"; 
                                        echo "<td class=\"cell100 column6\">".$date."</td></tr>";
                                }
                            }else{
                                echo "<center><p>No Updates Available<p></center>";
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