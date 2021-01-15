
<?php
    require '../session.php';
<<<<<<< HEAD
   $btype=$volume=$hid="";
=======
   $btype=$volume=$hid=$hname="";
>>>>>>> main
   if($_SERVER['REQUEST_METHOD']=="GET")
   {
     if(isset($_GET['blood'])){$btype=$_GET['blood'];}
     if (isset($_GET['vol'])) {$volume=$_GET['vol'];}
     if (isset($_GET['id'])) {$hid=$_GET['id'];}
<<<<<<< HEAD
   }

   //select hospital name
  $sql = "SELECT Name FROM blood_bank_hospital WHERE HospitalID='$hid'";
  $result = mysqli_query($link,$sql);
  while ($row = mysqli_fetch_assoc($result)) {
    // code...
    $hospital=$row["Name"];
  }
=======
     if (isset($_GET['name'])) {$hname=$_GET['name'];}
   }

   //select hospital name
   $sql = "SELECT Name FROM blood_bank_hospital WHERE HospitalID='$hid'";
   $result = mysqli_query($link,$sql);
   while ($row = mysqli_fetch_assoc($result)) {
     // code...
     $hospital=$row["Name"];
   }

>>>>>>> main


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
<<<<<<< HEAD
                  <input type="text" name="blood" class="form-control" value="<?php echo $btype; ?>">
              </div>

            <div class="form-group">
                 <label >Request Blood Volumn</label>
                 <input type="text" name="volume" class="form-control" value=",<?php echo $volume ?>">
=======
                  <input type="text" name="blood" class="form-control" value="<?php echo $btype; ?>" readonly>
              </div>

            <div class="form-group">
                 <label >Request Blood Volumn(ml)</label>
                 <input type="text" name="volume" class="form-control" value="<?php echo $volume ?>" readonly>
>>>>>>> main
            </div>

            <div class="form-group">
                 <label >Hospital ID</label>
<<<<<<< HEAD
                 <input type="text" name="id" class="form-control" value="<?php echo $hid ?>">
=======
                 <input type="text" name="id" class="form-control" value="<?php echo $hid ?>" readonly>
>>>>>>> main
            </div>

            <div class="form-group">
                 <label >Request Hospital</label>
<<<<<<< HEAD
                 <input type="text" name="hospital" class="form-control" value=",<?php echo $hospital?>">
            </div>
                <div class="request-button" style="margin-top:50px; margin-left: 100px; margin-right:100px;">
                   <input type="submit" value="Confirm">
=======
                 <input type="text" name="hospital" class="form-control" value="<?php echo $hname?>" readonly>
            </div>
                <div class="form-group">
                  <center> <input type="submit" value="Confirm" class="button btn-edit"></center>
>>>>>>> main
                </div>

           </form>
        </div>

       </div>

 </div>

<?php include '../../footer.php'; ?>
