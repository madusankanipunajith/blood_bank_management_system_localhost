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
                <div class="form-style-2-heading">Blood Packet Management</div>
            </div>

            
            <center>
            <div class="tile-container">
                    <div class="form-row">
                        <div class="form-group">
                            <a href="select_place">
                                <div class="tile">
                                <p class="title"><i class="fa fa-plus"></i>Add Blood Packets</p>
                                </div>
                            </a>
                        </div>
                        <div class="form-group">
                            <a href="select_number">
                                <div class="tile">
                                <p class="title"><i class="fa fa-paperclip"></i>Requested Packets</p>
                                </div>
                            </a>
                        </div>

                    </div>
                    <a href="insert_number">
                    <div class="tile">
                        <p class="title"><i class="fa fa-certificate"></i>Validate Blood Packets</p>
                    </div>
                    </a><br>
                    <a href="select_patient">
                    <div class="tile">
                        <p class="title"><i class="fa fa-share"></i>Transfusion Blood Packets</p>
                    </div>
                    
            </div>
            </center>
        </div>
    </div>    
<?php include '../../footer.php'; ?>