<?php
require_once "../session.php";
require_once "../header.php";
$NIC= $_SESSION["id-2"];


// queries
$sql = "SELECT * FROM requestor WHERE NIC = '$NIC'"; 
$result = mysqli_query($link, $sql);

$sql2 = "SELECT  TelephoneNo FROM requestor_telephone WHERE NIC = '$NIC' ORDER BY Flag DESC";
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
    
    $firstname = $row["FirstName"];
    $lastname = $row["LastName"];
    $dob = $row["DateOfBirth"];
    $gender = $row["Gender"];
    $addressline1 = $row["Lane1"];
    $addressline2 = $row["Lane2"];
    $district = $row["District"];
    $email= $row["Email"];

  }
} else {
  echo "0 results";
}

?>

<body>
	<div class="container-row donor">
        
        <?php require_once "../sidebar.php"; ?>

        <div class="main">
            <?php
            if (isset($_GET['update'])) {
                echo "<center><p style=\"color:green;\">Update successfull !!!</p></center>";
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
                                    <td class="cell100 column4">Full Name</td>
                                    <td class="cell100 column5"><?php echo $firstname." ".$lastname; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">NIC</td>
                                    <td class="cell100 column5"><?php echo $NIC; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Email</td>
                                    <td class="cell100 column5"><?php echo $email; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Birthday</td>
                                    <td class="cell100 column5"><?php echo $dob; ?></td>
                                </tr>
                                
                                <tr class="row100 body">
                                    <td class="cell100 column4">Address</td>
                                    <td class="cell100 column5"><?php echo $addressline1."<br>".$addressline2; ?></td>
                                </tr>

                                <tr class="row100 body">
                                    <td class="cell100 column4">District</td>
                                    <td class="cell100 column5"><?php echo $district; ?></td>
                                </tr>


                                
                                <tr class="row100 body">
                                    <td class="cell100 column4">Gender</td>
                                    <td class="cell100 column5"><?php echo $gender; ?></td>
                                </tr>

                                <tr class="row100 body">
                                    <td class="cell100 column4">Telephone</td>
                                    <td class="cell100 column5"><?php echo $tel1; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Telephone(optional)</td>
                                    <td class="cell100 column5"><?php echo $tel2; ?></td>
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
                    echo "<a  style=\"color: green;\" href=\"edit-requester.php\" onclick=\"return confirm('Are you sure to Edit?')\">
                    <div class=\"tile-3 clearfix\">Edit</div></a>";
                ?>
                </div>
                <div class="form-group">
                <?php
                   echo "<a  style=\"color: red;\" href=\"../application/delete.php\" onclick=\"return confirm('Warning! : This Cannot be undone... If you proceed, your all data will be lost. (cannot be recover)')\">
                   <div class=\"tile-3 clearfix\" >Delete</div></a>"; 
                ?>
                </div>
            </div> 

        </div>

    </div>


<?php include '../../footer.php'; ?>