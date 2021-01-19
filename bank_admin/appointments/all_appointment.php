<?php
	require '../session.php';
	require '../header.php';

	$bankid= $_SESSION["id-3"];

	$sql="SELECT a.Tme AS Tme,a.Dates AS Dates,a.DonorID AS DonorID,a.Flag AS Flag,a.HosID AS HosID, b.first_name AS first_name, b.last_name AS last_name, b.district AS district, b.gender AS gender FROM donor_reservation a, donor b WHERE b.nic=a.DonorID AND HosID='$bankid' ORDER BY Dates DESC ";
	$result= mysqli_query($link, $sql);

?>
<body>
        
	
	<div class="container-row admin">
        <?php
        require_once "../dashboard.php";
        ?>

        <div class="main">
            <center>
                <div class="form-style-2-heading"><div align="center"><a href="all_appointment">All Appointments</a></div><?php echo"<input class=\"search\" type=\"text\" id=\"search\" placeholder=\"Search bar\">";?></div>
            </center>
            <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head" >
                             <th class="cell100 column6">NIC</th>
                             <th class="cell100 column6">Full Name</th> 
                             <th class="cell100 column6">Gender</th> 
                             <th class="cell100 column6">District</th> 
                             <th class="cell100 column6">Date</th>
                             <th class="cell100 column6">Time</th>  
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body">
                        <table>
                            <?php
                                if (mysqli_num_rows($result)>0) {
                                    // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    
                                    $id = $row["DonorID"];
                                    $time = $row["Tme"];
                                    $first_name= $row["first_name"];
                                    $last_name= $row["last_name"];
                                    $name= $first_name." ".$last_name;
                                    $district= $row["district"];
                                    $gender= $row["gender"];
                                    $date= $row["Dates"];

                                

                                echo "<tr class='row100 body'><td class='cell100 column6'>".$id."</td>";
                                echo "<td class='cell100 column6'>".$name."</td>";
                                echo "<td class='cell100 column6'>".$gender."</td>";
                                echo "<td class='cell100 column6'>".$district."</td>";
                                echo "<td class='cell100 column6'>".$date."</td>";
                                echo "<td class='cell100 column6'>".$time."</td></tr>";

                            }
                                }else{
                                     echo "<center><p>No updates available</p></center>";
                                }
                                
                            ?>
                        
                        </table>
                    </div>
                        </div>
                    </div>
                    
                </div>
                <center><a href="index" style="color: #585858; font-size: 15px;"><i class="fa fa-backward"></i>Back</a></center>
            
        </div>

<?php
// Close connection
mysqli_close($link);
?>
</div>
<?php include '../../footer.php'; ?>