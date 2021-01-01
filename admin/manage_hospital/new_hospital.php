<?php
   require '../session.php';
   require '../header.php';
    // Define variables and initialize with empty values
    $hosid=$name = $address= $telephone = $district = "";
    $name_err = $address_err = $telephone_err = $telephone2_err = $district_err = $capacity_err=""; 
 
    if (isset($_GET['name']) || isset($_GET['add']) || isset($_GET['dis']) || isset($_GET['tel']) || isset($_GET['cap'])) {
        $name_err= $_GET['name'];
        $address_err= $_GET['add'];
        $district_err= $_GET['dis'];
        $telephone_err= $_GET['tel'];
        $telephone2_err= $_GET['tel2'];
        $capacity_err= $_GET['cap'];
    }

    if (isset($_GET['fdis'])) {$district= $_GET['fdis'];}

?>

<body>
    <div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>
        <div class="main">
            <div class="topic" style="margin-top: 10px;">
            <div class="form-style-2-heading">Add New Hospitals</div><br>
        
		  
                <form action="application/new_hospital.php" method="post">
                <div class="form-row">
                    <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>" >
                        <label>Hospital Name</label>
                        <input type="text" name="name"  value="<?php echo isset($_GET["fname"])?$_GET["fname"]:""; ?>" required>
                        <span class="help-block "><?php echo $name_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($capacity_err)) ? 'has-error' : ''; ?>">
                        <label>Capacity per Day</label>
                        <input type="number" name="capacity" value="<?php echo isset($_GET["fcap"])?$_GET["fcap"]:""; ?>" required>
                        <span class="help-block "><?php echo $capacity_err; ?></span>
                    </div>
                </div>
                <div class="form-row">
                     <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                        <label>Address (RD)</label>
                        <input type="text" name="address" value="<?php echo isset($_GET["fadd"])?$_GET["fadd"]:""; ?>" required>
                        <span class="help-block "><?php echo $address_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>">
                        <label>District</label>
                        <?php
                                $sql="SELECT name FROM district";
                                $result=mysqli_query($link, $sql);
                                if(mysqli_num_rows($result)){
                                    $select= '<select name="district" class="form-control"> required';
                                    if (empty($_GET['fdis'])) {
                                        $select.='<option value="">'."".'</option>';
                                    }else{
                                        $select.="<option value=\"$district\">"."$district"."</option>";
                                    }
                                    
                                        while($rs=mysqli_fetch_array($result)){
                                        $select.='<option value="'.$rs['name'].'">'.$rs['name'].'</option>';
                                        }
                                    }
                                    $select.='</select>';
                                    echo "$select";
                            ?>
                        <span class="help-block "><?php echo $district_err; ?></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group <?php echo (!empty($telephone_err)) ? 'has-error' : ''; ?>">
                     <label>Telephone</label>
                     <input type="number" name="tel-1" value="<?php echo isset($_GET["ftel1"])?$_GET["ftel1"]:""; ?>" required>
                     <span class="help-block "><?php echo $telephone_err; ?></span>   
                    </div>
                    <div class="form-group <?php echo (!empty($telephone2_err)) ? 'has-error' : ''; ?>">
                     <label>Telephone (Optional)</label>   
                     <input type="number" name="tel-2" value="<?php echo isset($_GET["ftel2"])?$_GET["ftel2"]:""; ?>">
                     <span class="help-block "><?php echo $telephone2_err; ?></span>
                    </div>
                </div>

                <center>
                    <input type="submit" class="button btn-edit" value="Submit">
                    <a href="index"><div class="button">Cancel</div></a>
                </center> 
                </form>
	        
            </div>

        </div>
    </div>

<?php include '../../footer.php'; ?>
