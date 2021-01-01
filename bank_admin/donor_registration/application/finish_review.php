<?php
require '../../session.php';

$_SESSION['pcount']="";
$_SESSION['pnic']="";
$_SESSION['pname']="";
$_SESSION['ptype']="";
$_SESSION['pdistrict']="";

unset($_SESSION['pcount']);
unset($_SESSION['pnic']);
unset($_SESSION['pname']);
unset($_SESSION['ptype']);
unset($_SESSION['pdistrict']);
unset($_SESSION['starts']);

header("Location: ../select_patient?finished");

?>