<?php
    require "../session.php";
    require '../header.php';
?>
<?php
    $firstname=$lastname=$id=$email=$name=$capacity="";
    $nic= $_SESSION["id_card3"];$id="";
    $sql= "SELECT FirstName, LastName, BloodBankID, Email FROM blood_bank_admin WHERE NIC='$nic'";
    $result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    $firstname = $row["FirstName"];
    $lastname = $row["LastName"];
    $id= $row["BloodBankID"];
    $email= $row["Email"];
    $name = $firstname." ".$lastname; 

  }
  $sql2= "SELECT Name, Capacity FROM blood_bank_hospital WHERE HospitalID='$id'";
  $result2= mysqli_query($link, $sql2);
  while ($rows = mysqli_fetch_assoc($result2)) {$hospital= $rows["Name"];$capacity=$rows["Capacity"];}

} 
// Close connection
mysqli_close($link);
    
?>
<body>
	
	<div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>

        <div class="main">
            
            
            <?php
                if (isset($_GET['update'])) {
                    echo "<p style=\"color:green;\">Update Successfully !!!</p>";
                }
                if (isset($_GET['numer'])) {
                    echo "<p style=\"color:red;\">please enter a numeric value !!!</p>";
                }
            ?>
            
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100 ver2 m-b-110">

                            <div class="table100-head">
                                <table>
                                    <thead>
                                        <tr class="row100 head">
                                            <th class="cell100 column4">Topic</th>
                                            <th class="cell100 column5">Content</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                           

                            <div class="table100-body">
                                <table>
                                <tbody>
                                <tr class="row100 body">
                                    <td class="cell100 column4">NIC</td>
                                    <td class="cell100 column5"><?php echo $nic ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Full Name</td>
                                    <td class="cell100 column5"><?php echo $name; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Email</td>
                                    <td class="cell100 column5"><?php echo $email; ?></td>
                                </tr>

                                <tr class="row100 body">
                                    <td class="cell100 column4">Hospital Name</td>
                                    <td class="cell100 column5"><?php echo $hospital; ?></td>
                                </tr>

                                <tr class="row100 body">
                                    <td class="cell100 column4">Capacity per Day</td>
                                    <td class="cell100 column5"><button onclick="update_capacity();"><?php echo $capacity." "; ?><i class="fa fa-edit"></i></button></td>
                                </tr>
                                

                                </tbody>
                                </table>
                            </div>    
                            
                        </div>
                    </div>
                </div>
            </div> 

        
            <div class="form-row" style="margin-left: 20%;">
                <div class="form-group">
                <?php
                    echo "<a style=\"color: green;\" href=\"edit_admin.php\" onclick=\"return confirm('Are you sure to Edit?')\">
                    <div class=\"tile-3 clearfix\">Edit</div></a>";
                ?>
                </div>
                <div class="form-group">
                <?php
                   echo "<a style=\"color: red;\" href=\"../application/delete.php?nic=$nic\" onclick=\"return confirm('Warning! : This Cannot be undone... If you proceed, your all data will be lost. (cannot be recover)')\"><div class=\"tile-3 clearfix\" >Delete</div></a>"; 
                ?>
                </div>
            </div> 
                     

        
        </div>
    </div>

    

<?php include '../../footer.php'; ?>