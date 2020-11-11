<?php
    require "../session.php";
    require '../header.php';


$nic = htmlspecialchars($_SESSION["id-1"]);

// queries
$sql = "SELECT * FROM donor WHERE nic = '$nic'"; 
$result = mysqli_query($link, $sql);

$sql2 = "SELECT  TelephoneNo FROM donor_telephone WHERE NIC = '$nic' ORDER BY Flag DESC";
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
    
    $firstname = $row["first_name"];
    $lastname = $row["last_name"];
    $dob = $row["dob"];
    $district= $row["district"];
    $bloodgroup = $row["bloodgroup"];
    $gender = $row["gender"];
    $addressline1 = $row["addressline1"];
    $addressline2 = $row["addressline2"];
    $email= $row["email"];
    $NIC= $row["nic"];
    $encryption= $row["status"];

    //decrypt mechanism
    $ciphering = "AES-128-CTR"; 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0; 
    $decryption_iv = '1234567891011121'; 
    $decryption_key = "Yuthukamabloodbanksystem";

    $status=openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $decryption_iv);

  }
} else {
  echo "0 results";
}

// Close connection
mysqli_close($link);

?>

<body class="">


	<div class="container-row donor">
        <?php
            require '../dashboard.php';
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
                                    <td class="cell100 column4">Blood Group</td>
                                    <td class="cell100 column5"><?php echo $bloodgroup; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Address</td>
                                    <td class="cell100 column5"><?php echo $addressline1."<br>".$addressline2; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">District</td>
                                    <td class="cell100 column5"><?php echo $district;?></td>
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
                                <tr class="row100 body">
                                    <td class="cell100 column4">Your Latest Status</td>
                                    <td class="cell100 column5"><?php echo $status; ?></td>
                                </tr>
                                </tbody>
                                </table>
                            </div>    
                            
                        </div>
                    </div>
                </div>
            </div> 

        
            <div class="form-row" style="margin-left: 20%">
                <div class="form-group">
                <?php
                    echo "<a style=\"color: green;\" href=\"edit_donor.php?nic=$NIC\" onclick=\"return confirm('Are you sure to Edit?')\">
                    <div class=\"tile-3 clearfix\">Edit</div></a>";
                ?>
                </div>
                <div class="form-group">
                <?php
                   echo "<a style=\"color: red;\" href=\"../application/delete.php?nic=$NIC\" onclick=\"return confirm('Warning! : This Cannot be undone... If you proceed, your all data will be lost. (cannot be recover)')\"><div class=\"tile-3 clearfix\" >Delete</div></a>"; 
                ?>
                </div>
            </div> 
                     

        </div>

    </div>



<?php include '../../footer.php'; ?>