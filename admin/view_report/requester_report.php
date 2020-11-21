<?php 
require '../session.php';
require '../header.php';

if (isset($_GET['id'])) {
	$hosid= $_GET['id'];
}
$province= array('north','easet','north central','north western','sabaragamuwa','uwa','southern','central','western');
$count= array();
$i=0;
while ($i<=8) {
	$prov= $province[$i];
	$sql="SELECT Province, COUNT(NIC) AS count FROM Requestor WHERE Province='$prov'";
	$result= mysqli_query($link, $sql);
	while ($row=mysqli_fetch_assoc($result)) {$count[$i]=$row["count"];}
	$i++;
}


mysqli_close($link);
?>
<body onload="requester_province(<?=$count[0];?>,<?=$count[1];?>,<?=$count[2];?>,<?=$count[3];?>,<?=$count[4];?>,<?=$count[5];?>,<?=$count[6];?>,<?=$count[7];?>,<?=$count[8];?>)">
	
	<div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
            <div class="form-style-2-heading">Requester Chart&nbsp;<a href="index" style="color: gray;">(Back)</a></div>
            </div>
            <center><div id="chartContainer" style="height: 100%; width: 100%;"></center>
				
        </div>

    </div>
    





</body>