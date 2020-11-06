<?php
	require '../session.php';
	require '../header.php';
?>
<?php
$nic=$_SESSION["id-1"];
if (isset($_GET['hosid'])) {
	$id=$_GET['hosid'];
}
if (isset($_GET['hosname'])) {
	$name=$_GET['hosname'];
}
if (isset($_GET['dis'])) {
	$district=$_GET['dis'];
}

$sql="SELECT Dates, Tme, Volume FROM donate_hospital WHERE DonorID='$nic' AND HospitalID='$id' ORDER BY Dates DESC";
$result=mysqli_query($link, $sql);

// Close connection
mysqli_close($link);
?>
<body>
	<div class="container-row donor">
		<?php
		require '../dashboard.php';
	?>
	<div class="main">
		<div class="topic">
          <div class="form-style-2-heading">Selected Hospital Donations	(<?php echo "<a href=\"hospital_donations\" style=\"color:blue;\">Back</a>"?>)</div>
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
                                <th style="width: 20%">Volume (ml)</th>
                                <th style="width: 15%">Date</th>
                                <th style="width: 15%">Time</th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                            <div class="table100-body">
                                <table>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $date= $row["Dates"];
                                    $time= $row["Tme"];
                                    $volume= $row["Volume"];

                            echo "<tr class='row100 body'><td style=\" line-height : 2.5;width: 30%;\">".$name."</td>";
                            echo "<td style=\"line-height : 2.5;width: 15%;\">".$district."</td>";
                            echo "<td style=\"line-height : 2.5;width: 20%;\">".$volume."</td>";
                            echo "<td style=\"line-height : 2.5;width: 15%;\">".$date."</td>";
                            echo "<td style=\"line-height : 2.5;width: 15%;\">".$time."</td><tr>";
                                
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