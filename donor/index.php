<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["id-1"]) || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../reg_login.php");
    exit;
}

require_once "../config.php";
require 'header.php';

$NIC= $_SESSION["id_card"];

?>

<body>
	<div class="container-row donor">
        <?php
            require 'dashboard.php';
        ?>
        <div class="main">
            <div class="page-header">
                <p class="greeting">Hi, <b><?php echo htmlspecialchars($_SESSION["nic"]); ?></b>. Welcome to your dashboard!</p>
            </div>
            <div class="tile-container">
                <div class="tile-row">
                    <?php echo "<a href=\"donate_blood/index?nic=$NIC\">"?>
                        <div class="tile-2">
                            <h2><b>Donate Blood</b></h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                        </div>
                    </a>
                    <a href="view_report/index">
                    <div class="tile-2">
                        <h2><b>View Report</b></h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                    </div>
                    </a>
                </div>
                <div class="tile-row">
                    <a href="search_donor/index">
                    <div class="tile-2">
                        <h2><b>Search Donor</b></h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                    </div>
                    </a>
                    <a href="donations/index">
                    <div class="tile-2">
                        <h2><b>Donations</b></h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                    </div>
                    </a>
                </div>
            </div>
            
                  
        </div>
    </div>
<?php include '../footer.php'; ?>