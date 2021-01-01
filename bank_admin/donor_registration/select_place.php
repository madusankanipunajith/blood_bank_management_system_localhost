<?php

    require "../session.php";
    require ('../header.php');
?>

<body>
    <div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>
        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading">SELECT HOSPITAL / CAMPAIGN</div>
            </div>

            <h2 class="center">Choose donor's Donation Place Here</h2>
            <center>
                <div class="tile-container">
                    <a href="select_donor?hospital">
                        <div class="tile">
                            <p class="title">Blood Bank Hospital</p>
                        </div>
                    </a><br>
                    <a href="select_campaign">
                    <div class="tile">
                        <p class="title">Organization's Campaign</p>
                    </div>
                    </a>
                    
            </div>
            </center>
        </div>
    </div>    
<?php include '../../footer.php'; ?>