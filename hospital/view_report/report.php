<<<<<<< HEAD
<?php
require '../session.php';
require '../header.php';

//all blood types
$blood= array('O+','O-','A+','A-','B+','B-','AB+','AB-');
$count= array();
$i=0;
while ($i<=7) {
	$bld= $blood[$i];
    $sql="SELECT SUM(normal_blood_request.Amount) AS total FROM normal_blood_request WHERE normal_blood_request.Type='$bld' AND normal_blood_request.Flag!=0";
	//$sql="SELECT bloodgroup, COUNT(nic) AS count FROM donor WHERE bloodgroup='$bld' AND district='$district' AND validation='1' ";
	$result= mysqli_query($link, $sql);
	while ($row=mysqli_fetch_assoc($result)) {$count[$i]=(int)$row["total"];}
	$i++;
}

//echo gettype($count[1]);
$new=[30,50,30,60,70,30,66,20];
mysqli_close($link);
?>
<body onload="normal_hospital(<?php echo json_encode($count) ?>)">


	<div class="container-row hospital">
        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
            <div class="form-style-2-heading">Donor Chart in <a href="districts" style="color: gray;">(Back)</a></div>
            </div>
            <center><div id="chartContainer" style="height: 100%; width: 100%;"></center>

        </div>

    </div>






<?php include '../../footer.php'; ?>
=======
<?php 
require '../session.php';
require '../header.php';

//all blood types
$blood= array('O+','O-','A+','A-','B+','B-','AB+','AB-');
$count= array();
$i=0;
while ($i<=7) {
	$bld= $blood[$i];
    $sql="SELECT SUM(normal_blood_request.Amount) AS total FROM normal_blood_request WHERE normal_blood_request.Type='$bld' AND normal_blood_request.Flag!=0";
	//$sql="SELECT bloodgroup, COUNT(nic) AS count FROM donor WHERE bloodgroup='$bld' AND district='$district' AND validation='1' ";
	$result= mysqli_query($link, $sql);
	while ($row=mysqli_fetch_assoc($result)) {$count[$i]=(int)$row["total"];}
	$i++;
}

echo gettype($count[1]);
$new=[30,50,30,60,70,30,66,20];
mysqli_close($link);
?>
<body onload="normal_hospital(<?php echo json_encode($count) ?>)">

	
	<div class="container-row hospital">
        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
            <div class="form-style-2-heading">Donor Chart in <a href="districts" style="color: gray;">(Back)</a></div>
            </div>
            <center><div id="chartContainer" style="height: 100%; width: 100%;"></center>
				
        </div>

    </div>
    





<?php include '../../footer.php'; ?>
>>>>>>> a8033ba05d45a474f2bf84ffbc8e502db6364df4
