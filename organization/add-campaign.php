<?php
    require 'session.php';

    $name_err = $location_err = $estimate_err= $date_err = $time_err= $hosid_err="";
    if($_SERVER['REQUEST_METHOD']=="GET"){
        if (isset($_GET['hos'])) {$hosid_err=$_GET['hos'];}
        if (isset($_GET['name'])) {$name_err=$_GET['name'];}
        if (isset($_GET['loc'])) {$location_err=$_GET['loc'];}
        if (isset($_GET['est'])) {$estimate_err=$_GET['est'];}
        if (isset($_GET['date'])) {$date_err=$_GET['date'];}
        if (isset($_GET['time'])) {$time_err=$_GET['time'];}
        
    }
?>


<?php

	require 'header.php';
    $today=date("Y-m-d");

    // queries
    $sql = "SELECT HospitalID, Name, District FROM blood_bank_hospital";
    $result = mysqli_query($link, $sql);
?>
<body >

	<div class="container" style="display: inline;">
		<div class="signup-content" >
			<div style="float: left;">
				<form action="application/add-campaign.php" method="post" class="campaign_reg_form" id="register-form">
					<center> <h2><b><a href="localhost/bloodbank/organization/add-campaign">Provide Your Campaign Information</a></b></h2></center><br><br>
					<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
						<label>Campaign Name</label>
						<input type="text" name="campaign_name" class="form-control">
					</div>

					<div class="form-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
						<label>Location</label>
						<input type="text" name="location" class="form-control">
					</div>

					<div class="form-group <?php echo (!empty($hosid_err)) ? 'has-error' : ''; ?>">
						<label>Hospital ID</label>
						<input type="number" name="hosid" class="form-control" placeholder="select your hospital id (H-ID) from the table">
                        <span class="help-block "><?php echo $hosid_err; ?></span>
					</div>

					<div class="form-group <?php echo (!empty($estimate_err)) ? 'has-error' : ''; ?>">
						<label>Estimation</label>
						<input type="text" name="estimate" class="form-control">
					</div>

					<div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
						<label>Date</label>
						<input type="date" name="date" min="<?php echo($today);?>" class="form-control">
					</div>
					<div class="form-group <?php echo (!empty($time_err)) ? 'has-error' : ''; ?>">
						<label>Time</label>
						<input type="time" name="time" class="form-control">
					</div>
					<center><p style="color: #DF01D7;">Please check the details whether exactly correct !!!</p></center>

					<div class="form-group">
                        <center><input type="submit" class="btn btn-primary" value="Submit"></center>
                    </div>

                    <div class="form-group">
                    	<center><a href="index" style="color: #848484; font-weight: bold;">Back to Home</a></center>
                	</div>
				</form>
					
			</div>
			<div style="float: right; width: 100%;">
				<center><h2>Blood Bank Hospital List in Srilanka</h2></center>
				<div class="container-table200">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column6">H-ID</th>
                            <th class="cell100 column7">Hospital Name</th>
                            <th class="cell100 column8">District</th>
                            </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="table200-body">
                        <table>
                            <?php
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
    
                                    $id = $row["HospitalID"];
                                    $hosname = $row["Name"];
                                    $district = $row["District"];

                                echo "<tr class='row100 body'><td class='cell100 column6'style=\" line-height : 3;\">".$id."</td>";
                                echo "<td class='cell100 column7'>".$hosname."</td>";
                                echo "<td class='cell100 column8'>".$district."</td></tr>";
                                }
                                
                            ?>
                        
                        </table>
                    </div>
                    
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>

<?php include '../footer.php'; ?>