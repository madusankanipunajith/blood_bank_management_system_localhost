<?php
    require "../session.php";
    require '../header.php';
?>
<?php

    $serial_num= $_SESSION['serial_num'];
    $bag_num= $_SESSION['bag_num'];$bid="";

    $sql="SELECT a.SerialNumber AS SerialNumber, a.PacketNumber AS PacketNumber, b.Name AS Name, b.District AS District, c.bloodgroup AS Type FROM donate_hospital a INNER JOIN blood_bank_hospital b ON a.HospitalID=b.HospitalID INNER JOIN donor c ON a.DonorID=c.nic WHERE SerialNumber='$serial_num' AND PacketNumber= '$bag_num' AND a.Valid='1' UNION SELECT a.SerialNumber AS SerialNumber, a.PacketNumber AS PacketNumber, b.Name AS Name, b.District AS District, c.bloodgroup AS Type FROM donate_campaign a INNER JOIN blood_bank_hospital b ON a.HospitalID=b.HospitalID INNER JOIN donor c ON a.DonorID=c.nic WHERE SerialNumber= '$serial_num' AND PacketNumber= '$bag_num' AND a.Valid='1'"; 
    $result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    $serial_num = $row["SerialNumber"];
    $bag_num = $row["PacketNumber"];
    $name= $row["Name"];
    $district= $row["District"];
    $reg_num = $serial_num." / ".$bag_num;
    $type= $row["Type"];

    $sql2="SELECT BloodID FROM blood WHERE Type='$type'";$result2=mysqli_query($link,$sql2);while($row= mysqli_fetch_assoc($result2)){$bid=$row["BloodID"];} 

  }

}else{
    header("Location: select_number?fail=ok");
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
            <div class="form-style-2-heading" align="center">Requested Blood Packet Details</div>
            
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
                                    <td class="cell100 column4">Register Number</td>
                                    <td class="cell100 column5"><?php echo $reg_num ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Blood Type</td>
                                    <td class="cell100 column5"><?php echo $type; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Hospital Name</td>
                                    <td class="cell100 column5"><?php echo $name; ?></td>
                                </tr>

                                <tr class="row100 body">
                                    <td class="cell100 column4">District</td>
                                    <td class="cell100 column5"><?php echo $district; ?></td>
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
                    echo "<a href=\"application/request_packet_add?serial=$serial_num&bag=$bag_num&bid=$bid\" onclick=\"return confirm('Are you sure to add this Packet to Your Stock?')\">
                    <button class=\"btn-edit\"><b>+</b>Add to Stock</button></a>";
                ?>
                </div>
                <div class="form-group">
                <?php
                   echo "<a href=\"select_number\"><button class=\"btn-delete\" >Cancel</button></a>"; 
                ?>
                </div>
            </div> 
                     

        
        </div>
    </div>

    

<?php include '../../footer.php'; ?>