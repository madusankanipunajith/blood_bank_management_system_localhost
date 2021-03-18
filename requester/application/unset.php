<?php
session_start();
require '../cache.php';
unset_cache();
header("Location: ../signup");

?>