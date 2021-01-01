<?php
require '../session.php';
require '../header.php';

$hosid=$hosname=$telephone="";
$camp_err=$estimate_err=$date_err=$time_err=$location_err="";
$date=$time=$estimate=$name=$location="";

$today=date("Y-m-d", strtotime( "+1 days" ));

if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['date'])) {$date_err=$_GET['date'];}
        if (isset($_GET['time'])) {$time_err=$_GET['time'];}
        if (isset($_GET['est'])) {$estimate_err=$_GET['est'];}
        if (isset($_GET['name'])) {$camp_err=$_GET['name'];}
        if (isset($_GET['loc'])) {$location_err=$_GET['loc'];}

        if (isset($_GET['fdate'])) {$date=$_GET['fdate'];}
        if (isset($_GET['ftime'])) {$time=$_GET['ftime'];}
        if (isset($_GET['festimate'])) {$estimate=$_GET['festimate'];}
        if (isset($_GET['fname'])) {$name=$_GET['fname'];}
        if (isset($_GET['floc'])) {$location=$_GET['floc'];}


        if (isset($_GET['hosid'])) { $hosid= $_GET['hosid'];}
        if (isset($_GET['hosname'])) { $_SESSION['hosname']= $_GET['hosname'];}if (isset($_SESSION['hosname'])) { $hosname= $_SESSION['hosname'];}

        $sql2="SELECT GROUP_CONCAT(TelephoneNo SEPARATOR ' / ') AS TelephoneNo FROM blood_bank_hospital_telephone WHERE BBID='$hosid' ";
        if ($result2=mysqli_query($link, $sql2)) {

            while ($row=mysqli_fetch_assoc($result2)) {
               $telephone= $row["TelephoneNo"]; 
            }
            
        }

    }

$sql="SELECT Name, Location, Dates  FROM campaign  WHERE BHospitalID='$hosid' AND Dates >'$today' AND Flag='1'";
$result= mysqli_query($link, $sql);


mysqli_close($link);
?>

<body>

	<div class="container-row organization">
        <?php
			require('../sidebar.php');
		?>

        <div class="main">
            
            
            <div class="topic">
            	<div class="form-style-2-heading">Date&Time Reservation for <?php echo $hosname;?></div>
            </div>
            
            <form action="../application/more_info.php?hosid=<?php echo $hosid;?>" method="post" style="padding-left: 20px; margin-top: 20px;">
                <div class="limiter-2">

                <div class="form-row">
                    <div class=" form-group <?php echo (!empty($camp_err)) ? 'has-error' : ''; ?>">
                        <label>Camp Name :<input type="text" class="input-field" name="campaign_name" value="<?php echo $name;?>" required></label>
                       
                    </div>

                    <div class="form-group <?php echo (!empty($estimate_err)) ? 'has-error' : ''; ?>">
                        <label>Estimate :<input type="number" class="input-field" name="estimate" value="<?php echo $estimate;?>" required></label>
                        
                    </div>
                </div> 

                <div class="form-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
                    <label>Location :<input type="text" class="input-field" name="location" value="<?php echo $location;?>" required></label>
                    <span class="help-block"><?php echo $location_err; ?></span>
                </div>   

                <div class="form-row">
                    <div class=" form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                        <label>Date :<input type="date" class="input-field" name="date" min="<?php echo($today);?>" value="<?php echo $date;?>" required></label>
                        <span class="help-block"><?php echo $date_err; ?></span>
                    </div>

                    <div class="form-group <?php echo (!empty($time_err)) ? 'has-error' : ''; ?>">
                        <label>Time(8:00AM-2:00PM) :<input type="time" class="input-field" name="time" max="14:00" min="8:00" value="<?php echo $time;?>" required></label>
                        <span class="help-block"><?php echo $time_err; ?></span>
                    </div>
                </div>

                
                

                <input type="submit" name="submit" value="Submit" class="button btn-edit">

                

                </div>
            </form>

            <div style="float: right; width: 60%">

                <center><i class="fa fa-phone"></i><p><b><?php echo $telephone; ?></b></p></center>

                <div class="container-table100" style="padding-top: 5px;">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column4">Campaign Name</th>
                            <th class="cell100 column7">Place</th>
                            <th class="cell100 column6">Date</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body" style="max-height: 190px;">
                        <table>
                            <?php
                                if ($count=mysqli_fetch_row($result)) {
                                    // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
    
                                    $name = $row["Name"];
                                    $place= $row["Location"];
                                    $date = $row["Dates"];
                                    

                                echo "<tr class='row100 body'><td class='cell100 column4'>".$name."</td>";
                                echo "<td class='cell100 column7'>".$place."</td>";
                                echo "<td class='cell100 column6'>".$date."</td></tr>";
                        

                                }
                                }else{
                                    echo "<p>This hospital has not taken any appointment yet</p>";
                                }
                                
                            ?>
                        
                        </table>
                    </div>
                        </div>
                    </div>
                </div>
                    
                <center>
                    <a href="index">
                        <button style="width: 200px;">
                        choose another hospital
                        </button>
                    </a>
                </center>
                
            </div>

            	
            
        </div>
    </div>
<?php include '../../footer.php'; ?>