<?php
	require '../session.php';
$answer= array();	
$ans="No";
$count=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if (isset($_POST['q1']) || isset($_POST['q2']) || isset($_POST['q3']) || isset($_POST['q4']) || isset($_POST['q5'])) {
		$answer[0]= $_POST['q1'];
		$answer[1]= $_POST['q2'];
		$answer[2]= $_POST['q3'];
		$answer[3]= $_POST['q4'];
		$answer[4]= $_POST['q5'];
	}

	$i=0;
	while($i<=4){
		if ($answer[$i]!=$ans) {
			$count--;
		}
		$count++;
		$i++;
	}
$result= ($count/5)*100;
header("location:../questionnaire/index?result=$result");	

}

// Close connection
mysqli_close($link);
?>