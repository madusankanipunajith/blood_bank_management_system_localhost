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
            <div class="form-style-2-heading">View Report</div><br>
                <form action="" method="post">
                    <div class="content">

                        <div class="tile">
                             <li><a href="#" >Hospital Reports</a></li>
                         </div>
                        <div class="tile">
                            <li><a href="#">Donor Reports</a></li>
                        </div>
                        <div class="tile">
                             <li><a href="#">Blood Stock Reports</a></li>
                        </div>

                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

</body>
</html>