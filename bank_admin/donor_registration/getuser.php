<?php

    require "../session.php";
    require ('../header.php');
?>
<?php
if (isset($_GET['campid'])) {
	$campid= $_GET['campid'];
	$_SESSION['id']=$campid;
	header("location: select_donor?campaign");
}else{
	echo "Some thing went wrong";
}

// Close connection
mysqli_close($link);
?>