<?php
   require '../session.php';
   require '../header.php';
?>
<body>
	
	<div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
            <div class="form-style-2-heading">View Report</div>
                <form action="" method="post">
                    <div class="content">
                        <div class="tile-container">

                        <a href="hospital_report" >
                            <div class="tile">
                                <li>Hospital Reports</li>
                            </div>
                        </a>
                        <a href="districts"> 
                            <div class="tile">
                                <li>Donor Reports</li>
                            </div>
                        </a>
                        <a href="requester_report">
                            <div class="tile">
                                <li>Requester Reports</li>
                            </div>
                        </a>
                        <a href="hospitals">
                            <div class="tile">
                                <li>Blood Stock Reports</li>
                            </div>
                        </a>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

<?php include '../../footer.php'; ?>