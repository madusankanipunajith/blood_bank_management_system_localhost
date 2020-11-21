<?php
// Initialize the session
include_once "../session.php";

$nic = $_SESSION["id-5"];

//queries
$sql="SELECT * FROM normal_hospital WHERE UserName = '$nic'";
$result= mysqli_query($link,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
    $hospital_name = $row["Name"];
    $address = $row["Address"];
    $district = $row["District"];
    $chief_doctor = $row["Chief"];
    $user_name = $row["UserName"];
    $email = $row["Email"];
  }
} else {
  echo "0 results";
}

//select telehone numbers
$sql2 = "SELECT TelephoneNo FROM normal_hospital_telephone WHERE username='$nic' ORDER BY Flag DESC";
$result2= mysqli_query($link,$sql2);
$telephone_arr= array();
$telephone_arr[1]= "";
$i=0;
while ($rows=mysqli_fetch_assoc($result2)) {
    $telephone_arr[$i]= $rows["TelephoneNo"];
    $i++;
}
$tel1= $telephone_arr[0];
$tel2= $telephone_arr[1];

require_once "../header.php";
?>




<body class="">

    <div class="container-row hospital">

     <?php require_once "../dashboard.php";?>


        <div class="main">

            <?php
                if (isset($_GET['update']))
                {
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
                                    <td class="cell100 column4">Hospital Name</td>
                                    <td class="cell100 column5"><?php echo $hospital_name; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Address</td>
                                    <td class="cell100 column5"><?php echo $address; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">District</td>
                                    <td class="cell100 column5"><?php echo $district; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Chief Doctor Name</td>
                                    <td class="cell100 column5"><?php echo $chief_doctor; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">User Name</td>
                                    <td class="cell100 column5"><?php echo $user_name; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Email</td>
                                    <td class="cell100 column5"><?php echo $email; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Telephone 1</td>
                                    <td class="cell100 column5"><?php echo $tel1; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Telephone 2</td>
                                    <td class="cell100 column5"><?php echo $tel2; ?></td>
                                </tr>


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
                    echo "<a class=\"check\" style=\"color: green;\" href=\"edit.php\" onclick=\"return confirm('Are you sure to Edit?')\">Edit</a>";
                ?>
                </div>
                <div class="form-group">
                <?php
                   echo "<a class=\"check\" style=\"color: red;\" href=\"../application/delete.php\" onclick=\"return confirm('Warning! : This Cannot be undone... If you proceed, your all data will be lost. (cannot be recover)')\">Delete</a>";
                ?>
                </div>
            </div>


        </div>

    </div>

    <?php include '../../footer.php'; ?>

</body>

</html>
