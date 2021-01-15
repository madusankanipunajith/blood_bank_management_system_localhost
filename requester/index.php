
<?php
    session_start();
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["id-2"]) || !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../reg_login.php");
    exit;
}

?>


<?php
    include('header.php');
?>
<body onload="initClock()">

	<div class="container-row donor">
        <?php include('sidebar.php'); ?>

        <div class="main">
            	
                <div class="page-header">
                <p class="greeting">Hi, <b><?php echo htmlspecialchars($_SESSION["nic"]); ?></b>. Welcome to your dashboard!</p> 
                </div>

                <center>
                    <!--digital clock start-->
                <div >
                    <div class="date">
                        <span id="dayname">Day</span>,
                        <span id="month">Month</span>
                        <span id="daynum">00</span>,
                        <span id="year">Year</span>
                    </div>
                    <div class="time">
                        <span id="hour">00</span>:
                        <span id="minutes">00</span>:
                        <span id="seconds">00</span>
                        <span id="period">AM</span>
                    </div>
                </div>
                    <!--digital clock end-->
                </center>

                <div class="tile-container">
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
