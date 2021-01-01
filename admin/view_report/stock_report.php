<?php 
require '../session.php';
require '../header.php';

if (isset($_GET['id'])) {
	$hosid= $_GET['id'];
}

$sql="SELECT a.Volume AS Volume, b.Type AS Type FROM blood_stock a INNER JOIN blood b ON b.BloodID=a.BloodID WHERE a.StockID='$hosid'";
$type= array();$i=0;
if ($result= mysqli_query($link, $sql)) {
	while ($row=mysqli_fetch_assoc($result)) {
	$type[$i]=$row["Volume"];
	$i++;
	}
}else{
	echo "Something went wrong";
}

$i=0;
while ($i<=7) {
	if ($type[$i]==null) {
		$err="not updated";
	}
	$i++;
}


mysqli_close($link);
?>
<body onload="test(<?=$type[0];?>,<?=$type[1];?>,<?=$type[2];?>,<?=$type[3];?>,<?=$type[4];?>,<?=$type[5];?>,<?=$type[6];?>,<?=$type[7];?>)">
	
	<div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
            <div class="form-style-2-heading">Blood Chart&nbsp;<a href="hospitals" style="color: gray;">(Back)</a></div>
            </div>
            <center><div id="chartContainer" style="height: 100%; width: 100%;"></center>
				<?php
					if (!empty($err)) {
						echo "<center>Sorry They have not updated their stock yet completely !!!</center>";
					}
				?>	
        </div>

    </div>
    





<?php include '../../footer.php'; ?>