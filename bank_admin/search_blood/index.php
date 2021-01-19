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
                <div class="form-style-2-heading">Search Hospital</div>
            </div>
              <?php
                  if (isset($_GET['request']))
                  {
                      echo "<p style=\"color:green; text-align:center;\">Request send Successfully !!!</p>";
                  }

              ?>
            <div class="type-request">
              <center>
                <form action="hospital_result.php" method="POST">
                  <div class="form-check <?php echo (!empty($blood_error)) ? 'has-error' : ''; ?>">
                      <label for="btype">Enter Blood Type</label>
                      <select name="btype" id="btype">
                           <option value="A+">A+</option>
                           <option value="A-">A-</option>
                           <option value="B+">B+</option>
                           <option value="B-">B-</option>
                           <option value="AB+">AB+ </option>
                           <option value="AB-">AB-</option>
                           <option value="O+">O+</option>
                           <option value="O-">O-</option>
                    </select>
                </div><br>


                <div class="form-check <?php echo (!empty($volume_error)) ? 'has-error' : ''; ?>">
                     <label >Enter Volumn</label>
                     <input type="number" name="volume" class="form-control" min="1">
                     <label><?php echo $volume_error;?></label>
                </div>
                    <br>
                    <center><input class="button btn-edit" type="submit" value="Submit"></center>
               </form>
              </center>
            </div>

        </div>

    </div>


    <?php include '../../footer.php'; ?>
</body>
