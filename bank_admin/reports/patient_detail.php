<?php
    require '../session.php';
    require '../header.php';
    require '../application/nic_validator.php';

    $hosid= $_SESSION['id-3'];
    $nic_err=$nic="";
    if (isset($_POST['nic']) || !empty($_SESSION['patient_nic'])) {
        if (isset($_POST['nic'])) {$nic= trim($_POST['nic']);}
        if (!empty($_SESSION['patient_nic'])) {$nic= $_SESSION['patient_nic'];}

        if (!empty($nic) && is_valid_nic($nic)) {
            $sql2="SELECT NIC FROM patient WHERE NIC='$nic'";
            $result2=mysqli_query($link,$sql2);
            if (mysqli_num_rows($result2) >0) {
                $_SESSION['patient_nic']=$nic;
                $res=1;
                $sql="SELECT a.NIC AS NIC, a.Name AS Name, b.SerialNumber AS SerialNumber, b.PacketNumber AS PacketNumber,b.Dates AS Tranfusion,c.first_name AS FName,c.district AS District, c.bloodgroup AS Type FROM patient a INNER JOIN transfusion b ON a.NIC=b.PNIC INNER JOIN donor c ON b.DNIC=c.nic WHERE b.PNIC='$nic' ORDER BY Dates DESC";
                $result=mysqli_query($link,$sql);
            }else{
                $res=2;
            }
            
        }else{
            if (empty($_POST['nic'])) {
                $nic_err="NIC is empty";
            }elseif (!is_valid_nic(trim($_POST['nic']))) {
                $nic_err="NIC is not Valid";
            }
            header("Location: find?nic=$nic&nic_err=$nic_err");
        }
    }
    


?>
<body class="">

	
	<div class="container-row donor">

        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
                 <div class="form-style-2-heading">Transfusion History (<?php echo $nic;?>)</div>
            </div>

            <div class="container-table100 clearfix" style="padding-top: 0px;">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110"> 
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column4">Donor Name/District</th>
                            <th class="cell100 column6">Serial Number</th>
                            <th class="cell100 column6">Packet Number</th>
                            <th class="cell100 column9">Blood Type</th>
                            <th class="cell100 column6">Trans.Date</th>
                            <th class="cell100 column9">Info</th>
                            </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="table100-body">
                        <table>
                            
                          <?php
                                
                            if (mysqli_num_rows($result2) > 0) {
                                    // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $id="";
                                    $name=$row["FName"];
                                    $district=$row["District"];
                                    $serial = $row["SerialNumber"];
                                    $packet = $row["PacketNumber"];
                                    $date= $row["Tranfusion"];
                                    $btype = $row["Type"];

                                        echo "<tr class='row100 body'><td class=\"cell100 column4\">".$name.' / '.$district."</td>";
                                        echo "<td class=\"cell100 column6\" >".$serial."</td>";
                                        echo "<td class=\"cell100 column6\">".$packet."</td>";
                                        echo "<td class=\"cell100 column9\">".$btype."</td>";
                                        echo "<td class=\"cell100 column6\">".$date."</td>"; 
                                    
                                        echo "<td class=\"cell100 column9\"><a href=\"packet_detail?ser=$serial&pack=$packet\"><i class=\"fa fa-info-circle\"></i></a></td></tr>";
                                }
                            }else{
                                echo "<center><p>No Patient was Found with the given NIC !!!</p></center>";
                            }  
                                
                            ?>      
                            
                        
                        </table>
                    </div>
                    
                        </div>
                    </div>
                </div>

                <center><a href="find" class="button">Back</a></center>

        </div>
<?php mysqli_close($link);?>
    </div>



<?php include '../../footer.php'; ?>