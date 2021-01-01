<?php
require '../session.php';
require '../header.php';

$bankid=$_SESSION["id-3"];
$sql = "SELECT s.BloodId, s.Volume, b.BloodId, b.Type FROM blood_stock s, blood b WHERE b.BloodId = s.BloodId AND s.StockID='$bankid'";
$result = mysqli_query($link, $sql);

$name=$district=$amount=$bid="";
$type= $_SESSION['type'];
$sql2= "SELECT BloodId AS ID FROM blood WHERE Type='$type'";
$result2=mysqli_query($link, $sql2);while ($row = mysqli_fetch_assoc($result2)) {$bid=$row["ID"];}

$req_id= $_SESSION['req_id'];

if($_SERVER["REQUEST_METHOD"] == "GET"){

	if (isset($_GET['name'])) {
		$name= $_GET['name'];
	}
	if (isset($_GET['dis'])) {
		$district= $_GET['dis'];
	}
	if (isset($_GET['amount'])) {
		$amount= $_GET['amount'];
	}

}



mysqli_close($link);
?>
<body>

	<div class="container-row admin">
        <?php
        require_once '../dashboard.php';
        ?>

        <div class="main">
           <?php 
           if (isset($_GET['approve'])) { echo "<center><p style=\"color:green; margin-bottom:0px;\">Request accepted Successfully !!!</p></center>";} 
           if (isset($_GET['fail'])) { echo "<center><p style=\"color:red; margin-bottom:0px;\">Unfortunately requested blood amount is insufficient !!!</p></center>";} 
           ?>
            <center><h2><a href="index">Approve/Decline the Blood Request</a></h2></center>
            <div style="width: 40%; float: left;">
            	<div class="form-style-2-heading">Requested Hospital Details</div>
            	<div class="form-group">
            		<label>Hospital Name</label>
            		<input type="text" name="name" value="<?php echo $name;?>" readonly>
            	</div>
            	<div class="form-group">
            		<label>District</label>
            		<input type="text" name="district" value="<?php echo $district;?>" readonly>
            	</div>
            	<div class="form-row">
            		<div class="form-group">
            			<label>Blood Type</label>
            			<input type="text" name="type" value="<?php echo $type;?>" readonly>
            		</div>
            	<div class="form-group">
            		<label>Amount(ml)</label>
            		<input type="text" name="amount" value="<?php echo $amount;?>" readonly>
            	</div>
            	</div> 

            	<div class="form-row">
                    <div class="form-group">
                        <a href="../application/req_approve?id=<?php echo $req_id;?>&bloodid=<?php echo $bid;?>&amount=<?php echo $amount;?>&name=<?php echo $name;?>&dis=<?php echo $district;?>" class="like clearfix" onclick="return confirm('Are you sure ?')">
                        <div class="tile-3 clearfix"><i class="fa fa-check"></i>Approve</div>
                        </a>
                    </div>
                    <div class="form-group">
                    <a href="../application/req_decline?id=<?php echo $req_id;?>&bloodid=<?php echo $bid;?>&amount=<?php echo $amount;?>" class="dislike clearfix" onclick="return confirm('Are you sure ?')">
                        <div class="tile-3 clearfix"><i class="fa fa-times"></i>Decline</div>
                        </a>
                    </div>
                </div>
                <a href="list">
                <div class="form-group tile-3">
                	<i class="fa fa-backward"></i> Back to List
                </div>
                </a>
            </div>

            <div style="float: right; width: 60%;">
		        <div class="container-table100" style="padding-bottom: 10px;">
			        <div class="wrap-table100">
        				<div class="table100 ver2 m-b-110">
        					<div class="table100-head">
        						<table>
        							<thead>
        								<tr class="row100 head">
        									<th class="cell100 column1">Blood Type</th>
        									<th class="cell100 column2">Number of Units</th>
        								</tr>
        							</thead>
        						</table>
        					</div>
            
        					<div class="table100-body " style="max-height: 365px;">
        						<table>
        							<tbody>
        							    <?php 
                                            if (mysqli_num_rows($result) > 0) {
                                                  // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    $type = $row["Type"];
                                                    $volume = $row["Volume"];
                                                    
                                                    echo "<tr class='row100 body'><td class='cell100 column1'>".$type."</td>";
                                                    echo "<td class='cell100 column2'>".$volume."</td></tr>";
                                                    
                                                }
                                            } else {
                                                  echo "<p style='padding: 10px; text-align: center; padding-top: 20px;'>Unfortunately, no result found</p>";
                                            }
                                        ?>
        							</tbody>
        						</table>
        					</div>
        			    </div>
			        </div>
		        </div>
		        
		        
            </div>
            
           
            
            
        </div>
    </div>

<?php include '../../footer.php'; ?>