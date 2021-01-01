<?php
    require '../session.php';
    require '../header.php';

?>
<body class="">

	
	<div class="container-row donor">

        <?php
            require '../dashboard.php';
        ?>

        <div class="main">

            <div class="topic">
                 <div class="form-style-2-heading">Manage Appointments</div>
            </div>

            <h2 class="center">Categories</h2>
            <center>
                <div class="tile-container">
                    <a href="index1">
                        <div class="tile">
                            <p class="title"><i class="fa fa-calendar"></i>Appointments (Today and Upcomming)</p>
                        </div>
                    </a><br>
                    <a href="index2">
                    <div class="tile">
                        <p class="title"><i class="fa fa-tasks"></i>Validate Appointment</p>
                    </div>
                    </a>
                    
                </div>
            </center>

        </div>

    </div>



<?php include '../../footer.php'; ?>