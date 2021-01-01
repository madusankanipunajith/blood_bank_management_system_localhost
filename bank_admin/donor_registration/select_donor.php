<?php

    require "../session.php";
    require ('../header.php');

    $date=Date("Y-m-d");

?>
<?php
    if (isset($_GET['hospital'])) {
        $_SESSION['place']="hospital";
    }
    if(isset($_GET['campaign'])){
        $_SESSION['place']="campaign";
    }
    $place= $_SESSION['place'];
?>

<?php
    $serial_err=$bag_err=$nic_err=$bgroup_err=$exp_err="";
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET['nic'])){
            $nic_err= $_GET['nic'];
        }
        if(isset($_GET['serial'])){
            $serial_err= $_GET['serial'];
        }
        if(isset($_GET['bag'])){
            $bag_err= $_GET['bag'];
        }
        if(isset($_GET['bgroup'])){
            $bgroup_err= $_GET['bgroup'];
        }
        if(isset($_GET['exp'])){
            $exp_err= $_GET['exp'];
        }
    }

?>

<body>
	

	<div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading">Packet Adding  (<?php echo "$place";?>)</div>
           
            <?php
                if (isset($_GET['add'])) {
                    echo "<center><p style=\"color:green;\">Added Succesfully.</p></center>";
                }
                if (isset($_GET['already'])) {
                    echo "<center><p style=\"color:red;\">Blood Packet Already has been added. Check the Label Again</p></center>";
                }
            ?>
            <center>
            <form action="view_details.php" method="post" class="column50">
                <div class="form-row">
                    <div class="form-group <?php echo (!empty($serial_err)) ? 'has-error' : ''; ?>" >
                    <label>Serial Number</label>
                    <input type="text" name="serial_num" value="<?php echo isset($_SESSION["serial_num"])?$_SESSION["serial_num"]:""; ?>" required>
                    <label class="help-block"><?php echo $serial_err;?></label>
                    </div>
                    <div class="form-group <?php echo (!empty($bag_err)) ? 'has-error' : ''; ?>">
                        <label>Bag number</label>
                        <input type="text" name="bag_num" value="<?php echo isset($_SESSION["bag_num"])?$_SESSION["bag_num"]:""; ?>" required>
                        <label class="help-block"><?php echo $bag_err;?></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                       <label>Donor NIC</label>
                       <input type="text" name="nic" required>
                       <label class="help-block"><?php echo $nic_err;?></label> 
                    </div>
                    <div class="form-group">
                        <label>Exp Date</label>
                        <input type="date" name="exp_date" value="<?php echo isset($_SESSION["exp_date"])?$_SESSION["exp_date"]:""; ?>" min="<?php echo $date;?>" required>
                        <label class="help-block"><?php echo $exp_err;?></label>
                    </div>
                    <div class="form-group">
                        <label>Blood Type</label>
                        <?php
                            $sql3="SELECT BloodID,Type FROM blood";
                            $result3=mysqli_query($link, $sql3);

                            if(mysqli_num_rows($result3)){
                            $select= '<select name="bgroup" class="form-control" required>';

                            if (empty($_SESSION['bgroup'])) {
                                $select.='<option value="">'."Select".'</option>';
                            }else{
                                if (isset($_SESSION['bgroup'])) {
                                    $bgroup=$_SESSION['bgroup'];
                                }
                                $select.="<option value=\"$bgroup\">"."$bgroup"."</option>";
                            }
                                while($rs=mysqli_fetch_array($result3)){
                                $select.='<option value="'.$rs['Type'].'">'.$rs['Type'].'</option>';
                                }
                            }
                            
                            $select.='</select>';
                            echo "$select";
                        ?>    
                        <label class="help-block"><?php echo $bgroup_err;?></label>
                    </div>
                    
                </div>
                <input type="submit" name="submit" class="button btn-edit">
            </form>
            <br>
            
                <a href="select_place">
                <div class="tile-3 clearfix">Hospital / Campaign</div>
                </a>
            
            </center>
             </div>
        </div>
    </div>

<?php include '../../footer.php'; ?>