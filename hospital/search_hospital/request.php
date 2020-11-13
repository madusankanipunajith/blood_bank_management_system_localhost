
<?php
    require '../session.php';
   $btype=$volume=$hospital="";
   if($_SERVER['REQUEST_METHOD']=="GET")
   {
     if(isset($_GET['blood'])){$btype=$_GET['blood'];}
     if (isset($_GET['vol'])) {$volume=$_GET['vol'];}
     if (isset($_GET['hos'])) {$hospital=$_GET['hos'];}
   }


    require '../header.php';

?>

<body>


	<div class="container-row donor">
        <?php
            require '../dashboard.php';
        ?>

        <div class="main">

        <div class="type-request">
            <form action="../application/blood_request.php" method="POST">
              <div class="form-group">
                  <label for="btype">Request Blood Type</label>
                  <input type="text" name="blood" class="form-control" value="<?php echo $btype; ?>">
              </div>

            <div class="form-group">
                 <label >Request Blood Volumn</label>
                 <input type="text" name="volume" class="form-control" value=",<?php echo $volume ?>">
            </div>

            <div class="form-group">
                 <label >Request Hospital</label>
                 <input type="text" name="hospital" class="form-control" value=",<?php echo $hospital?>">
            </div>
                <div class="request-button" style="margin-top:50px; margin-left: 100px; margin-right:100px;">
                   <input type="submit" value="Confirm">
                </div>

           </form>
        </div>

       </div>

 </div>

<?php include '../../footer.php'; ?>
