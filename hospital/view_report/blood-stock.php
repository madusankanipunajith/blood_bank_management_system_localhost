<?php
   require_once "../session.php";
   $blood_error=$volume_error="";
   if($_SERVER['REQUEST_METHOD']=="GET")
   {
       if(isset($_GET['berror'])){$blood_error=$_GET['berror'];}
       if (isset($_GET['berror'])) {$volume_error=$_GET['verror'];}

   }

?>

<?php

    require_once "../header.php";

?>

<body>

	<div class="container-row hospital">

        <?php
            require_once "../dashboard.php";
        ?>



        <div class="main">

            <div class="topic">
                <div class="form-style-2-heading">Blood stock</div>
            </div>

            </div>

        </div>

    </div>


    <?php include '../../footer.php'; ?>
</body>
