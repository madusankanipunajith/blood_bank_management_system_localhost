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
                 <div class="form-style-2-heading">Packet Reports</div>
            </div>

            
            <center>
                <div class="tile-container">
                    <a href="packet_request">
                        <div class="tile">
                            <p class="title"><i class="fa fa-reply"></i>Transactions(Request)</p>
                        </div>
                    </a><br>
                    <a href="packet_sent">
                    <div class="tile">
                        <p class="title"><i class="fa fa-share"></i>Transaction(Send)</p>
                    </div>
                    </a><br>
                    <a href="find">
                    <div class="tile">
                        <p class="title"><i class="fa fa-search"></i>Find Packet</p>
                    </div>
                    </a>
                    
                </div>
            </center>

        </div>

    </div>



<?php include '../../footer.php'; ?>
