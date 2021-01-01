<?php
require '../session.php';

$date=$name=$location=$orgname=$time=$estimate="";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if (isset($_GET['id'])) {
		$id= $_GET['id'];
		$_SESSION['opp_id']= $id;
	}
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
	
	header("Location: more_info?name=$name&loc=$location&org=$orgname&date=$date&time=$time&estim=$estimate");

}else{
	echo "error occured";
}

?>