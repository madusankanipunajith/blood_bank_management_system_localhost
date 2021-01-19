<?php
require_once "../session.php";
require('../header.php');
include '../encrypt.php';

?>
<?php
$bankid= $_SESSION["id-3"];
$date=$nic=$count=$opp_id=$time=$estimate=$name=$location="";
//date_default_timezone_set("Asia/Colombo");
$opp_id= $_SESSION['opp_id'];

if (isset($_GET['date'])) {
    $date= $_GET['date'];
    
}
if (isset($_GET['name'])) {
    $name= $_GET['name'];
   
}
if (isset($_GET['loc'])) {
    $location= $_GET['loc'];
   
}
if (isset($_GET['org'])) {
    $orgname= $_GET['org'];
    
}
if (isset($_GET['time'])) {
    $time= $_GET['time'];
   
}
if (isset($_GET['estim'])) {
    $estimate= $_GET['estim'];
   
}

$sql= "SELECT a.Name AS Name, a.Location AS Location, a.Tme AS Tme, b.OrganizationName AS OrganizationName FROM campaign a INNER JOIN organization b ON a.OrganizationID=b.UserName WHERE a.Dates='$date' AND a.BHospitalID='$bankid' AND a.Flag='1' ORDER BY Tme ASC";
$result= mysqli_query($link, $sql);
$count= mysqli_num_rows($result);

 
?>
<body>
        
	
	<div class="container-row admin">
        <?php
        require_once "../dashboard.php";
        ?>

        <div class="main">
            <center>
                <div class="form-style-2-heading"><a href="more_info">Validated Campaign Appointments in <?php echo "   "."$date"."     =>     "."$count"; ?></a></div>
            </center>
            <div style="float: left; width: 40%;">
                <div class="form-group">
                   <h6>Selected campaign appointment details</h6> 
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Campaign Name</label>
                        <input type="text" name="name" value="<?php echo $name;?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Estimate</label>
                        <input type="text" name="name" value="<?php echo $estimate;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label>Organization Name</label>
                    <input type="text" name="name" value="<?php echo $orgname;?>" readonly>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="name" value="<?php echo $location;?>" readonly>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Appointed Date</label>
                        <input type="date" name="date" value="<?php echo $date;?>" readonly>
                    </div>
                        <div class="form-group">
                        <label>Appointed Time</label>
                        <input type="time" name="time" value="<?php echo $time;?>" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <a href="../application/accept?id=<?php echo $opp_id;?>" class="like clearfix" onclick="return confirm('Are you sure ?')">
                        <div class="tile-3 clearfix"><i class="fa fa-check"></i>Approve</div>
                        </a>
                    </div>
                    <div class="form-group">
                    <a href="../application/decline?id=<?php echo $opp_id;?>" class="dislike clearfix" onclick="return confirm('Are you sure ?')">
                        <div class="tile-3 clearfix"><i class="fa fa-times"></i>Decline</div>
                        </a>
                    </div>
                </div>
            </div>
            <div style="float: right; width: 60%;">
                <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head" >
                            <th class="cell100 column8">Campaign Name</th>
                            <th class="cell100 column4">Organization Name</th>  
                            <th class="cell100 column4">Time</th>  
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body">
                        <table>
                            <?php
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    
                                    $campname = $row["Name"];
                                    $location = $row["Location"];
                                    $time = $row["Tme"];
                                

                                echo "<tr class='row100 body'><td class='cell100 column8'>".$campname."</td>";
                                echo "<td class='cell100 column4'>".$location."</td>";
                                echo "<td class='cell100 column4'>".$time."</td>";

                            }
                            if($count==0){
                                echo "<center><p>There is no appointment yet for $date</p></center>";
                            }    
                            ?>
                            
                        
                        </table>
                    </div>
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