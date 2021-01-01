<?php
    require "../session.php";
    require '../header.php';
?>
<?php
    $bank_id= $_SESSION['id-3'];
    $back=$result=$res=$type=$exp=$serial=$packet=$nic=$date=$serial_num=$packet_num=$d_name=$d_district=$telephone=$t_date="";
    $rec_nic=$p_district=$p_name="Not Available";

    if($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET"){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $serial= $_POST['serial_num'];
            $packet= $_POST['bag_num'];
            $back=1;
        }else{
             if (isset($_GET['ser'])) {
                $serial= $_GET['ser'];
             }
            if (isset($_GET['pack'])) {
                $packet= $_GET['pack'];
            }
            $back=2;
        }

        $sql="SELECT a.DonateID AS DonateID,a.SerialNumber AS SerialNumber, a.PacketNumber AS PacketNumber, a.DonorID AS DonorID, a.Dates AS Dates, a.ExpDate AS ExpDate, c.first_name AS firstname, c.last_name AS lastname, c.district AS district,c.bloodgroup AS Type , GROUP_CONCAT(d.TelephoneNo SEPARATOR ' / ') AS telephone FROM donate_campaign a INNER JOIN donor c ON a.DonorID=c.nic INNER JOIN donor_telephone d ON c.nic=d.NIC WHERE SerialNumber='$serial' AND PacketNumber='$packet' AND a.Valid='1' GROUP BY SerialNumber";
        $result=mysqli_query($link, $sql);

        if (mysqli_num_rows($result) <= 0) {
            $sql="SELECT a.DonateID AS DonateID, a.SerialNumber AS SerialNumber, a.PacketNumber AS PacketNumber, a.DonorID AS DonorID, a.Dates AS Dates, a.ExpDate AS ExpDate, c.first_name AS firstname, c.last_name AS lastname, c.district AS district , GROUP_CONCAT(d.TelephoneNo SEPARATOR ' / ') AS telephone FROM donate_hospital a INNER JOIN donor c ON a.DonorID=c.nic INNER JOIN donor_telephone d ON c.nic=d.NIC WHERE SerialNumber='$serial' AND PacketNumber='$packet' AND a.Valid='1' GROUP BY SerialNumber";
                $result=mysqli_query($link, $sql);
        }

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $count= mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result)) {

                $serial_num=$row["SerialNumber"];
                $packet_num=$row["PacketNumber"];
                $sql2="SELECT a.NIC AS PNIC,a.Name AS PName,a.District AS PDistrict FROM patient a INNER JOIN transfusion b ON a.NIC=b.PNIC WHERE b.SerialNumber='$serial' AND b.PacketNumber='$packet'";
                $result2=mysqli_query($link,$sql2);

                $type=$row["Type"];
                $t_date=$row["Dates"];
                $exp=$row["ExpDate"];
                $nic=$row["DonorID"];
                $firstname = $row["firstname"];
                $lastname = $row["lastname"];
                $d_name= $firstname." ".$lastname;
                $d_district=$row["district"];
                $telephone=$row["telephone"];
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $rec_nic= $row2["PNIC"];
                    $p_name=$row2["PName"];
                    $p_district=$row2["PDistrict"];
                }
                

            }
            $res=1;
        }else{
            $res=2;
        }

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
                if ($res==1) {
                    echo "<p style=\"color:green;\">Packet was Found !!!</p>";
                }
                if ($res==2) {
                    echo "<p style=\"color:red;\">There is no such a blood packet</p>";
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
                                <tr class="row100 body"><td class="cell100 column100"><b>Packet Details</b></td></tr>    
                                <tr class="row100 body">
                                    <td class="cell100 column4">PR Number</td>
                                    <td class="cell100 column5"><?php echo $serial_num." / ".$packet_num; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Blood Type</td>
                                    <td class="cell100 column5"><?php echo $type; ?></td>
                                </tr>
                                
                                <tr class="row100 body">
                                    <td class="cell100 column4">Donation Date</td>
                                    <td class="cell100 column5"><?php echo $t_date; ?></td>
                                </tr>

                                <tr class="row100 body">
                                    <td class="cell100 column4">Expire Date</td>
                                    <td class="cell100 column5"><?php echo $exp; ?></td>
                                </tr>

                                <tr class="row100 body"><td class="cell100 column100"><b>Donor Details</b></td></tr> 
                                <tr class="row100 body">
                                    <td class="cell100 column4">Donor NIC</td>
                                    <td class="cell100 column5"><?php echo $nic; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Donor Full Name</td>
                                    <td class="cell100 column5"><?php echo $d_name; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Donor District</td>
                                    <td class="cell100 column5"><?php echo $d_district; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Donor Telephone(s)</td>
                                    <td class="cell100 column5"><?php echo $telephone; ?></td>
                                </tr>

                                <tr class="row100 body"><td class="cell100 column100"><b>Patient Details</b></td></tr> 

                                <tr class="row100 body">
                                    <td class="cell100 column4">Reciever NIC</td>
                                    <td class="cell100 column5"><?php echo $rec_nic; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Reciever Name</td>
                                    <td class="cell100 column5"><?php echo $p_name; ?></td>
                                </tr>
                                <tr class="row100 body">
                                    <td class="cell100 column4">Reciever District</td>
                                    <td class="cell100 column5"><?php echo $p_district; ?></td>
                                </tr>
                                

                                </tbody>
                                </table>
                            </div>    
                            
                        </div>
                    </div>
                </div>
            </div> 

        
            <center><a <?php if($back==1){echo "href=\"find\"";}if($back==2){echo "href=\"patient_detail\"";}?> class="button">Back</a></center>
                     

        
        </div>
    </div>

    

<?php include '../../footer.php'; ?>