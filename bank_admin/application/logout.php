<?php

// Initialize the session

session_start();
 

// Unset all of the session variables

$_SESSION = array();

 

// Destroy the session.

session_destroy();

 
if (isset($_GET['logout'])) {
	// Redirect to login page
	header("location: ../../reg_login?key=ok");
}else{
	// Redirect to login page
	header("location: ../../reg_login?logout=ok");
}


exit;

?>