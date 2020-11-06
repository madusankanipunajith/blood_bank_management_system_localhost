<?php
    require '../session.php';
    require '../header.php';

    // Define variables and initialize with empty values
    $nic_old=$nic =$first_name = $last_name  = $dob = $mobile2 = $addline1 = $addline2 = $mobile = $district = $email="";
    $nic_err = $first_name_err = $last_name_err = $dob_err  = $addline_err  = $mobile_err = $district_err = $email_err="";
    $NIC=$firstname=$lastname=$addressline1=$addressline2="";
    
    $nic_old= $_SESSION["id-1"];

     // queries
    $sql = "SELECT * FROM donor WHERE nic= '$nic_old'";
    $result=mysqli_query($link, $sql);

    $sql2 = "SELECT  TelephoneNo FROM donor_telephone WHERE NIC = '$nic_old' ORDER BY Flag DESC";
    $result2 = mysqli_query($link, $sql2);
    $count= mysqli_num_rows($result2);


   $telephone= array();
   $telephone[1]="";
    $i=0;
    while ($rows=mysqli_fetch_assoc($result2)) {
    $telephone[$i]= $rows["TelephoneNo"];
    $i++;
    }
    $tel1= $telephone[0];
    $tel2= $telephone[1];

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    
        $firstname = $row["first_name"];
        $lastname = $row["last_name"];
        $dob = $row["dob"];
        $district = $row["district"];
        $addressline1 = $row["addressline1"];
        $addressline2 = $row["addressline2"];
        $email= $row["email"];
        $NIC= $row["nic"];

        }
    } else {
        echo "Something went wrong while loading...";
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['nics'])) {$nic_err=$_GET['nics'];}
        if (isset($_GET['dis'])) {$district_err=$_GET['dis'];}
        if (isset($_GET['first'])) {$first_name_err=$_GET['first'];}
        if (isset($_GET['last'])) {$last_name_err=$_GET['last'];}
        if (isset($_GET['pass'])) {$password_err=$_GET['pass'];}
        if (isset($_GET['conf'])) {$confirm_password_err=$_GET['conf'];}
        if (isset($_GET['email'])) {$email_err=$_GET['email'];}
        if (isset($_GET['tel'])) {$mobile_err=$_GET['tel'];}
        if (isset($_GET['add'])) {$addline_err=$_GET['add'];}
        if (isset($_GET['dob'])) {$dob_err=$_GET['dob'];}
    }

 mysqli_close($link);   

?>
<body>
    
    <div class="container-row donor">
        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">

                    <?php
                if (isset($_GET['password'])) {
                    echo "<p style=\"color:green;\">password changed successfully !!!</p>";
                }
            ?>

            <form action="../application/edit_donor.php?tel1=<?php echo $tel1; ?>&tel2=<?php echo $tel2; ?>&count=<?php echo $count; ?>" method="post">
                <div class="form-row clearfix">
                    <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $firstname; ?>">
                    </div>
                    <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo $lastname; ?>">
                    </div>
                    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <label>Email</label> 
                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                    </div>
                    
                </div>
        
                <div class="form-row">
                    <div class="form-group <?php echo (!empty($nic_err)) ? 'has-error' : ''; ?>">
                        <label>NIC</label>
                        <input type="text" name="nic" value="<?php echo $NIC; ?>">  
                           
                    </div>
                    <div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                        <label>DOB</label>
                        <input type="date" name="dob" value="<?php echo $dob; ?>">
                    </div>
                    
                </div>

                <div class="form-row clearfix">
                    <div class="form-group <?php echo (!empty($addline_err)) ? 'has-error' : ''; ?>">
                        <label>Address Line 1</label>
                        <input type="text" name="addline1" class="form-control" value="<?php echo $addressline1; ?>">
                    </div>
                    <div class="form-group">
                        <label>Address Line 2(Optional)</label>
                        <input type="text" name="addline2" class="form-control" value="<?php echo $addressline2; ?>">
                    </div>
                    
                </div>
                <div class="form-row clearfix">
                    <div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>">
                        <label>District</label>
                        <select id="location" name="district" class="form-control">
                                <option value="<?php echo $district;?>"><?php echo "$district";?></option>
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticoloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Mullativu">Mullativu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavniya">Vavniya</option>
                            </select>
                    </div>
                    <div class="form-group <?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>">
                        <label>Telephone</label>
                        <input type="number" name="telephone-1" class="form-control" value="<?php echo $tel1; ?>">
                    </div>
                    <div class="form-group">
                        <label>Telephone(Optional)</label>
                        <input type="number" name="telephone-2" class="form-control" value="<?php echo $tel2; ?>">
                    </div>

                    
                </div>

                <center><input type="submit"  name="Submit"></center>
                <div>
                    <a href="edit_password" style="color: #848484; font-size: 15px;">Edit Password</a>
                </div>

            </form>
          

            </div>

               
        </div>
    </div>
<?php include '../../footer.php'; ?>