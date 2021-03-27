
<?php

    require '../session.php';

    $start=$end="";
    if($_SERVER['REQUEST_METHOD']=="GET")
    {
        if(isset($_GET['start'])){$start=$_GET['start'];}
        if (isset($_GET['end'])) {$end=$_GET['end'];}

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
            <form action="report.php" method="POST">
              <div class="form-group">
                   <label >Enter time period</label>
              </div>
              <div class="form-group <?php echo (!empty($start)) ? 'has-error' : ''; ?>">
                  <label>From</label>
                  <input type="date" name="sdate" class="form-control" value="" required>

              </div>

            <div class="form-group <?php echo (!empty($end)) ? 'has-error' : ''; ?>">
                 <label >To</label>
                 <input type="date" name="edate" class="form-control" value="" required>
                 <span class="help-block"><?php echo $end; ?></span>
            </div>

                <div>
                   <center><input type="submit" value="Confirm" class="button btn-edit"></center>
                </div>

           </form>
        </div>

       </div>

 </div>

<?php include '../../footer.php'; ?>
