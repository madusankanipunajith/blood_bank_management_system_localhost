<?php
require '../session.php';
require '../header.php';

$pnic= $_SESSION['pnic'];
$pcount= $_SESSION['pcount'];
$sql="SELECT a.SerialNumber AS SerialNumber,a.PacketNumber AS PacketNumber,a.DNIC AS NIC,b.bloodgroup AS Type FROM transfusion a INNER JOIN donor b ON a.DNIC=b.nic WHERE PNIC='$pnic' ORDER BY Dates DESC LIMIT $pcount";
$result=mysqli_query($link,$sql);

mysqli_close($link);
?>

<body class="">

	
	<div class="container-row donor">

        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading"><a class="fa fa-backward" href="select_packet?finish">(Back)</a>&nbsp;&nbsp;Transfusion Review( On <?php echo $_SESSION['pnic']." - ".$_SESSION['pdistrict']." - ".$_SESSION['ptype'];?>)</div>
                <center><b><p>Number of Packets : <?php if(isset($_SESSION['pcount'])){echo $_SESSION['pcount'];}else{echo "0";}?></p></b></center>
            </div>
            <div class="container-table100 clearfix" style="padding-top: 0px;">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110"> 
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column9">Number</th>    
                            <th class="cell100 column3">Serial Number</th>
                            <th class="cell100 column3">Packet Number</th>
                            <th class="cell100 column6">Type</th>
                            <th class="cell100 column6">Donor NIC</th>
                            <th class="cell100 column6">Delete</th>
                            
                            </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="table100-body" style="max-height: 200px;">
                        <table>
                            
                          <?php
                                
                            if (mysqli_num_rows($result) >0) {
                            	$i=0;
                                    // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                   
                                    
                                    $serial = $row["SerialNumber"];
                                    $packet = $row["PacketNumber"];
                                    $type= $row["Type"];
                                    $nic = $row["NIC"];
                            
                                        echo "<tr class='row100 body'><td class=\"cell100 column9\">".$i."</td>";
                                        echo "<td class=\"cell100 column3\" >".$serial."</td>";
                                        echo "<td class=\"cell100 column3\">".$packet."</td>";
                                        echo "<td class=\"cell100 column6\">".$type."</td>";
                                        echo "<td class=\"cell100 column6\">".$nic."</td>"; 
                                        echo "<td class=\"cell100 column6\"><a onclick=\"return confirm('sure?');\" href=\"application/del_tranfusion?ser=$serial&bag=$packet\"><i class=\"fa fa-times\"></i></a></td></tr>";
                                	$i++;
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
                <center><a onclick="return confirm('sure?');" href="application/finish_review" class="button" width="200px;">Finish</a></center>

        </div>
<?php 
// Close connection
mysqli_close($link);
?>
    </div>



<?php include '../../footer.php'; ?>