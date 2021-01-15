<?php
	require_once "session.php";
	function testing()
	{
		$sql="SELECT * FROM donor";
		$result= mysqli_query($link, $sql);
		return $result;
	}
	mysqli_close($link);
?>