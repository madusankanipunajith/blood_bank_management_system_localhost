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
                                            <th class="cell100 column5">Time Slot</th>
                                            <th class="cell100 column4">Capacity</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                           

                            <div class="table100-body">
                                <table>
                                <tbody>
                                
                                

                                </tbody>
                                </table>
                            </div>    
                            
                        </div>
                    </div>
                </div>
            </div> 

        
            <div class="form-row" style="margin-left: 25%;">
                <div class="form-group">
                <?php
                    echo "<a class=\"check\" style=\"color: green;\" href=\"edit_admin.php\" onclick=\"return confirm('Are you sure to Edit?')\">Edit</a>";
                ?>
                </div>
                <div class="form-group">
                <?php
                   echo "<a class=\"check\" style=\"color: red;\" href=\"../application/delete.php?nic=$nic\" onclick=\"return confirm('Warning! : This Cannot be undone... If you proceed, your all data will be lost. (cannot be recover)')\">Delete</a>"; 
                ?>
                </div>
            </div> 
                     

        
        </div>
    </div>

    <script type="text/javascript">
        function update_capacity(){
            var capacity= prompt("Please enter the capacity today","");
            if (capacity!=null) {
             window.location.href = "/bloodbank/bank_admin/application/edit_capacity.php?cap="+capacity;
            }
   
        }
    </script>

<?php include '../../footer.php'; ?>