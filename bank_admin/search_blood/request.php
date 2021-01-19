
<?php
    require '../session.php';
   $btype=$volume=$hid="";
   if($_SERVER['REQUEST_METHOD']=="GET")
   {
     if(isset($_GET['blood'])){$btype=$_GET['blood'];}
     if (isset($_GET['vol'])) {$volume=$_GET['vol'];}
     if (isset($_GET['id'])) {$hid=$_GET['id'];}
   }

   //select hospital name
   $sql = "SELECT Name FROM blood_bank_hospital WHERE HospitalID='$hid'";
   $result = mysqli_query($link,$sql);
   while ($row = mysqli_fetch_assoc($result)) {
     // code...
     $hospital=$row["Name"];
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
                  <input type="text" name="blood" class="form-control" value="<?php echo $btype; ?>" readonly>
              </div>

            <div class="form-group">
                 <label >Request Blood Volumn</label>
                 <input type="text" name="volume" class="form-control" value="<?php echo $volume ?>" readonly>
            </div>

            <div class="form-group">
                 <label >Hospital ID</label>
                 <input type="text" name="id" class="form-control" value="<?php echo $hid ?>" readonly>
            </div>

            <div class="form-group">
                 <label >Request Hospital</label>
                 <input type="text" name="hospital" class="form-control" value="<?php echo $hospital?>" readonly>
            </div>
                <center>
                   <input type="submit"  class="button btn-edit" value="Confirm">
                </center>

           </form>
        </div>

       </div>

 </div>

<?php include '../../footer.php'; ?>
