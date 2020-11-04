<?php

// Initialize the session

session_start();

 

// Unset all of the session variables

$_SESSION = array();

 

// Destroy the session.

session_destroy();

 

// Redirect to login page

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['logout'])) {
	
	header("location: ../reg_login?key=ok");

}else{
	header("location: ../reg_login");
}
exit;

?>