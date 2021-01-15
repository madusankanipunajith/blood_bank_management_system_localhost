<?php
	require 'application/test.php';

	$res= testing();
	while ($row= mysqli_fetch_assoc($res)) {
		$x= $row["nic"];
		echo "$x"."<br>";
	}
?>