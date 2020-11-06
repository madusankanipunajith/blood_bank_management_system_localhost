<?php
   require '../session.php';
   require '../header.php';
    // Define variables and initialize with empty values
    $hosid=$name = $address= $telephone = $district = "";
    $name_err = $address_err = $telephone_err = $district_err = ""; 
 
    if (isset($_GET['name']) || isset($_GET['add']) || isset($_GET['dis']) || isset($_GET['tel'])) {
        $name_err= $_GET['name'];
        $address_err= $_GET['add'];
        $district_err= $_GET['dis'];
        $telephone_err= $_GET['tel'];
    }

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
                    <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>" style="width: 100%;">
                        <label>Hospital Name</label>
                        <input type="text" name="name">
                        <span class="help-block "><?php echo $name_err; ?></span>
                    </div>
                </div>
                <div class="form-row">
                     <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                        <label>Address (RD)</label>
                        <input type="text" name="address">
                        <span class="help-block "><?php echo $address_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>">
                        <label>District</label>
                        <input type="text" name="district">
                        <span class="help-block "><?php echo $district_err; ?></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group <?php echo (!empty($telephone_err)) ? 'has-error' : ''; ?>">
                     <label>Telephone</label>
                     <input type="number" name="tel-1">
                     <span class="help-block "><?php echo $telephone_err; ?></span>   
                    </div>
                    <div class="form-group ">
                     <label>Telephone (Optional)</label>   
                     <input type="number" name="tel-2">
                    </div>
                </div>

                <center><input type="submit" class="btn btn-primary" value="Submit"></center> 
                </form>
	        
            </div>

        </div>
    </div>

</body>