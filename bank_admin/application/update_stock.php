<?php
require_once "../session.php";

$bankid= $_SESSION["id-3"];
 
// Define variables and initialize with empty values

$volume = $volume_err = ""; 


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $bgroup = trim($_POST["bgroup"]);
    if (!empty($_POST["volume"])) {
        $volume = trim($_POST["volume"]);
    }else{
        $volume_err="Enter Volume";
    }
    
    
    if (empty($volume_err)) {
        $sql = "UPDATE blood_stock SET Volume = '$volume' WHERE StockID = '$bankid' AND BloodId = '$bgroup'";
        $result = mysqli_query($link, $sql);
        header("location: ../manage_stock/index?update=ok");
    }else{
        header("Location: ../manage_stock/update_stock?vol=$volume_err");
    }
}

// Close connection
mysqli_close($link);

?>