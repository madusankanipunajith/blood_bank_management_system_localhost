
<?php
    require_once "../session.php";
    require_once '../header.php';

?>

<body class="">

	<div class="container-row donor">
        <?php
        require_once "../dashboard.php";
        ?>

        <div class="main">

            <div class="topic">
                 <div class="form-style-2-heading">Donations</div>
            </div>

            <h2 class="center">Hospital / Campaign Donations</h2>
            <center>
                <div class="tile-container">
                    <a href="hospital_donations">
                        <div class="tile">
                            <p class="title">Blood Bank Hospital</p>
                        </div>
                    </a><br>
                    <a href="campaign_donations">
                    <div class="tile">
                        <p class="title">Organization's Campaign</p>
                    </div>
                    </a>
                    
            </div>
            </center>

        </div>

    </div>



<?php include '../../footer.php'; ?>