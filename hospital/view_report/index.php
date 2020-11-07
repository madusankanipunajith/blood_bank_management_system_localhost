<?php
    session_start();
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["id-5"]) || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../reg_login.php");
    exit;
}
?>

<?php

    require_once "../header.php";

?>

<body>

	<div class="container-row hospital">

        <?php
            require_once "../dashboard.php";
        ?>



        <div class="main">

            <div class="topic">REPORT</div>

        </div>

    </div>



</body>

