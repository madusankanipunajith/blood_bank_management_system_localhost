<?php
    include '../config.php';
	include 'header.php';
?>

<body>
    
	<div class="container-row admin">
        <!--
            <div class="dashboard-side">
            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>
            <form method="post">
            <div class="contain">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#" class="active sidebar-menu">Home</a></li>
                <li><i class="fa fa-user-md" aria-hidden="true"></i><a href="manage_admin.php" class="sidebar-menu">Manage Admins</a></li>
                <li><i class="fa fa-hospital-o" aria-hidden="true"></i><a href="manage_hospitals.php" class="sidebar-menu">Manage Hospitals</a></li>
                <li><i class="fa fa-file-text" aria-hidden="true"></i><a href="view_report.php" class="sidebar-menu">View Reports</a></li>
                <li><i class="fa fa-user" aria-hidden="true"></i><a href="admin_profile.php" class="sidebar-menu">My Profile</a></li>
                
            </div>
            </form>

        </div>
        -->
        <?php
            require 'dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading">System Overview</div>
            </div>
            <!--digital clock start
            <div class="datetime">
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
            digital clock end-->

            <div class="container" style="display: flex;">
                <div class="column1">
                    <div class="tile-2">
                        <i class="fa fa-map-marker" aria-hidden="true"></i><span class="tile-heading">10</span>
                        <p>Blood Donation Campaign Registrations</p>
                    </div>
                </div>
                <div class="column1">
                    <div class="tile-2">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i><span class="tile-heading">40</span></i>
                        <p>New Blood Donor Registrations</p>
                    </div>
                </div>
                <div class="column1">
                    <div class="tile-2">
                        <i class="fa fa-tint" aria-hidden="true"></i><span class="tile-heading">30</span></i>
                        <p>New Blood Requester Registrations</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</body>
</html>