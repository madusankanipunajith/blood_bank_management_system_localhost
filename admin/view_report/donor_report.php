<?php 
require '../session.php';
require '../header.php';

$district="";
if (isset($_GET['dis'])) {
	$district= $_GET['dis'];
}

$blood= array('O+','O-','A+','A-','B+','B-','AB+','AB-');
$count= array();
$i=0;
while ($i<=7) {
	$bld= $blood[$i];
	$sql="SELECT bloodgroup, COUNT(nic) AS count FROM donor WHERE bloodgroup='$bld' AND district='$district' AND validation='1' ";
	$result= mysqli_query($link, $sql);
	while ($row=mysqli_fetch_assoc($result)) {$count[$i]=$row["count"];}
	$i++;
}


mysqli_close($link);
?>
<body onload="donor_district(<?=$count[0];?>,<?=$count[1];?>,<?=$count[2];?>,<?=$count[3];?>,<?=$count[4];?>,<?=$count[5];?>,<?=$count[6];?>,<?=$count[7];?>)">
	
	<div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
            <div class="form-style-2-heading">Donor Chart in (<?php echo "$district";?>)&nbsp;<a href="districts" style="color: gray;">(Back)</a></div>
            </div>
            <center><div id="chartContainer" style="height: 100%; width: 100%;"></center>
				
        </div>

    </div>
    





</body>