<?php
require '../session.php';
require '../header.php';

$today=Date("Y-m-d");
$tomorrow = date( "Y-m-d", strtotime( "+1 days" ) );
$bankid= $_SESSION['id-3'];

if (isset($_GET['id'])) {
	$id=trim($_GET['id']);

	$sql="SELECT a.SerialNumber AS SerialNumber, a.PacketNumber AS PacketNumber, a.Dates AS Dates, c.bloodgroup AS Type FROM donate_hospital a INNER JOIN blood_stock b ON b.StockID=a.HospitalID INNER JOIN donor c ON a.DonorID=c.nic INNER JOIN blood d ON d.BloodID=b.BloodID WHERE c.bloodgroup=d.Type AND d.BloodID='$id' AND a.HospitalID='$bankid' AND a.ExpDate='$today' AND a.Valid='1' UNION SELECT a.SerialNumber AS SerialNumber, a.PacketNumber AS PacketNumber, a.ExpDate AS Exp, c.bloodgroup AS Type FROM donate_campaign a INNER JOIN blood_stock b ON b.StockID=a.HospitalID INNER JOIN donor c ON a.DonorID=c.nic INNER JOIN blood d ON d.BloodID=b.BloodID WHERE c.bloodgroup=d.Type AND d.BloodID='$id' AND a.HospitalID='$bankid' AND a.ExpDate='$today' AND a.Valid='1'";

	$result= mysqli_query($link,$sql);
}


mysqli_close($link);
?>

<body>

	<div class="container-row admin">
        <?php
			require('../dashboard.php');
		?>

        <div class="main">
           
            <div class="topic">
            	<div class="form-style-2-heading"><div align="center"><?php echo "Packets";?></div><?php echo"<input class=\"search\" type=\"text\" id=\"search\" placeholder=\"Search bar\">";?></div>
            </div>
            
            <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head" >
                            <th class="cell100 column9">No</th>
                            <th class="cell100 column8">Registration Number</th> 
                            <th class="cell100 column11">Selected Type</th> 
                            <th class="cell100 column11">Collected Date</th>
                            <th class="cell100 column9">Status</th>
                          
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body">
                        <table>
                           <?php
                            if (mysqli_num_rows($result) >0) {
                            	$i=1;
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $serial= $row["SerialNumber"];
                                    $packet = $row["PacketNumber"];
                                    $date = $row["Dates"];
                                    $type = $row["Type"];

                                    	echo "<tr class='row100 body'><td class='cell100 column9'>".$i."</td>";
                                		echo "<td class='cell100 column8'>".$serial." / ".$packet."</td>";
                                		echo "<td class='cell100 column11'>".$type."</td>";
                                		echo "<td class='cell100 column11'>".$date."</td>";
                                		echo "<td class='cell100 column9'>"."Expired"."</td></tr>";
                                
                              		$i++;
                                    
                                
                            	}

                            
                            }else{
                            	echo "<center><p>No Packets Available !!!</p></center>";
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