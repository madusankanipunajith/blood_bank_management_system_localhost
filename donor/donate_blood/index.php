
<?php
   require '../session.php';
   require '../header.php';
   
    $hos=$time=$date="";
    $date_err=$time_err=$hos_err="";
//   $nic = htmlspecialchars($_SESSION["nic"]);
    $NIC = $_SESSION["id-1"];

    $today= date("Y-m-d");

        // queries
        $sql = "SELECT HospitalID, Name FROM blood_bank_hospital";
        $result = mysqli_query($link, $sql);    

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['date'])) {$date_err=$_GET['date'];}
        if (isset($_GET['time'])) {$time_err=$_GET['time'];}
        if (isset($_GET['hos'])) {$hos_err=$_GET['hos'];}
    }

mysqli_close($link);

?>

<body>
	<div class="container-row donor">

        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <?php
                if (isset($_GET['reg'])) {
                    echo "<center><p style=\"color:green; font-size:20px;\">Appointement Sent Successfully !!!</p></center>";
                }
            ?>

            <div class="topic clearfix">
                 <div class="form-style-2-heading">Donate Blood</div>
            </div>
            
            <form action="../application/donate_blood.php" method="post" style="padding-left: 20px;">
                <div class="limiter-2">
                <div class=" donor_calander <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                <label>Date :<input type="date" class="input-field" name="date" min="<?php echo($today);?>" value="" /></label>
                <span class="help-block"><?php echo $date_err; ?></span>
                </div>

                <div class="donor_time <?php echo (!empty($time_err)) ? 'has-error' : ''; ?>">
                <label>Time :<input type="time" class="input-field" name="time"></label>
                <span class="help-block"><?php echo $time_err; ?></span>
                </div>

                <div class="donor_time <?php echo (!empty($hos_err)) ? 'has-error' : ''; ?>">
                <label>Hospital ID :<input type="number" class="input-field" name="hosid" placeholder="H-ID"></label>
                <span class="help-block"><?php echo $hos_err; ?></span>
                </div>
                <br>

                <input type="submit" name="submit" value="Submit">


                </div>
            </form>
            
            <div style="float: right; width: 60%">
                <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column6">H-ID</th>
                            <th class="cell100 column7">Hospital Name</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body">
                        <table>
                            <?php
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
    
                                    $id = $row["HospitalID"];
                                    $hosname = $row["Name"];

                                echo "<tr class='row100 body'><td class='cell100 column6'>".$id."</td>";
                                echo "<td class='cell100 column7'>".$hosname."</td></tr>";

                                }
                                
                            ?>
                        
                        </table>
                    </div>
                        </div>
                    </div>
                </div>
                    
                    
            </div>


        </div>

    </div>



<?php include '../../footer.php'; ?>
