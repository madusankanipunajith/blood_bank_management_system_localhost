<?php

require_once "../session.php";
unset_cache();
//$nic = htmlspecialchars($_SESSION["nic"]);
  $nic = $_SESSION["id-4"];
 
// queries
$sql = "SELECT * FROM organization WHERE UserName = '$nic'"; 
$result = mysqli_query($link, $sql);

$sql2 = "SELECT  TelephoneNo FROM organization_telephone WHERE OrgId = '$nic' ORDER BY Flag DESC";
$result2 = mysqli_query($link, $sql2);


$telephone= array();
$telephone[1]= "";
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
    
    $username = $row["UserName"];
    $orgname = $row["OrganizationName"];
    $president= $row["President"];
    $location = $row["District"];
    $email= $row["Email"];
    $purpose= $row["Purpose"];

  }
} else {
  echo "0 results";
}


?>

<body class="">

	<?php

	include '../header.php';

	?>



	<div class="container-row organization">

        <?php
            require_once "../sidebar.php";
        ?>



        <div class="main">
            <?php
                if (isset($_GET['update'])) {
                    echo "<p style=\"color:green;\">Update Successfully !!!</p>";
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
                                    <td class="cell100 column4">User Name</td>
                                    <td class="cell100 column5"><?php echo $username; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Organization Name</td>
                                    <td class="cell100 column5"><?php echo $orgname; ?></td>
                                </tr>

                                <tr class="row100 body">
                                    <td class="cell100 column4">District</td>
                                    <td class="cell100 column5"><?php echo $location; ?></td>
                                </tr>
                                
                                <tr class="row100 body">
                                    <td class="cell100 column4">President Name</td>
                                    <td class="cell100 column5"><?php echo $president; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Email</td>
                                    <td class="cell100 column5"><?php echo $email; ?></td>
                                </tr>

                                <tr class="row100 body">
                                    <td class="cell100 column4">Purpose</td>
                                    <td class="cell100 column5"><?php echo $purpose; ?></td>
                                </tr>

                                <tr class="row100 body">
                                    <td class="cell100 column4">Telephone </td>
                                    <td class="cell100 column5"><?php echo $tel1; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Telephone (Optional)</td>
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
                    echo "<a href=\"edit-organization.php\" onclick=\"return confirm('Are you sure to Edit?')\">
                    <button class=\"btn-edit\">Edit</button></a>";
                ?>
                </div>
                <div class="form-group">
                <?php
                   echo "<a href=\"../application/delete.php?nic=$nic\" onclick=\"return confirm('Warning! : This Cannot be undone... If you proceed, your all data will be lost. (cannot be recover)')\">
                   <button class=\"btn-delete\" >Delete</button></a>"; 
                ?>
                </div>
            </div> 
                     

        </div>

    </div>



<?php include '../../footer.php'; ?>

