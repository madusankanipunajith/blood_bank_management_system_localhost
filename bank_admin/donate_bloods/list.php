<?php

    require "../session.php";
    require ('../header.php');

    $hosid= $_SESSION['id-3'];
    if(isset($_GET['bloodbank'])){
        $_SESSION['hostype']="bloodbank";
    }
    if (isset($_GET['hospital'])) {
        $_SESSION['hostype']="hospital";
    }
    $btypen=$request="";

    if ($_SESSION['hostype']=="bloodbank") {
        $sql="SELECT a.ID AS ID, a.Type AS Type, a.Amount AS Amount, a.Dates AS Dates, a.ReceiverID AS ReceiverID, a.SenderID AS SenderID, b.Name AS Name, b.HospitalID AS HospitalID, b.District AS District FROM blood_bank_request a INNER JOIN blood_bank_hospital b ON SenderID=HospitalID WHERE ReceiverID='$hosid' AND a.Flag='0'";
        $request="Blood Bank Request";
    }
    if ($_SESSION['hostype']=="hospital") {
        $sql="SELECT a.ID AS ID, a.Type AS Type, a.Amount AS Amount, a.Dates AS Dates, a.ReceiverID AS ReceiverID, a.SenderID AS SenderID, b.Name AS Name, b.UserName AS HospitalID, b.District AS District FROM normal_blood_request a INNER JOIN normal_hospital b ON a.SenderID=b.UserName WHERE a.ReceiverID='$hosid' AND a.Flag='0' ";
        $request="Normal Hospital Request";
    }

    $result= mysqli_query($link, $sql);
?>

<body>
    <div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>
        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading"><?php echo "$request"; ?></div>
            </div>

            <div class="container-table100 clearfix">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110"> 
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head">
                            <th class="cell100 column4">Hospital Name</th>
                            <th class="cell100 column6">District</th>
                            <th class="cell100 column6">Telephone</th>
                            <th class="cell100 column6">Telephone2</th>
                            <th class="cell100 column9">Type</th>
                            <th class="cell100 column9">Amount</th>
                            <th class="cell100 column10">@</th>
                            </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="table100-body">
                        <table>
                            
                          <?php
                                
                                if (mysqli_num_rows($result)>0) {
                                    // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
    
                                    $id= $row["HospitalID"];
                                    $name = $row["Name"];
                                    $district = $row["District"];
                                    $date= $row["Dates"];
                                    $btype = $row["Type"];

                                    //remove the + symbol
                                    if (strpos($btype, '+') !== false) {
                                        $btypen = substr_replace($btype,"",-1);
      
                                    }
                                    else {
                                        $btypen=$btype;
                                        //echo "$btypen";
                                    }

                                    $req_id= $row["ID"];
                                    $amount= $row["Amount"];


                                    $telephone= array();$i=0;$telephone[1]="";
                                    if ($_SESSION['hostype']=="bloodbank"){
                                        $sql2= "SELECT DISTINCT TelephoneNo FROM blood_bank_hospital_telephone WHERE BBID='$id' ORDER BY Flag DESC";
                                    }
                                    if ($_SESSION['hostype']=="hospital") {
                                        $sql2= "SELECT DISTINCT TelephoneNo FROM normal_hospital_telephone WHERE username='$id' ORDER BY flag DESC";
                                    }
                                    
                                    $result2= mysqli_query($link, $sql2);
                                    while ($rows= mysqli_fetch_assoc($result2)) {
                                        $telephone[$i]=$rows["TelephoneNo"];
                                        $i++;
                                    }
                                    $tel1= $telephone[0];
                                    $tel2= $telephone[1];
                                    

                                        echo "<tr class='row100 body'><td class=\"cell100 column4\">".$name."</td>";
                                        echo "<td class=\"cell100 column6\" >".$district."</td>";
                                        echo "<td class=\"cell100 column6\">".$tel1."</td>";
                                        echo "<td class=\"cell100 column6\">".$tel2."</td>";
                                        echo "<td class=\"cell100 column9\">".$btype."</td>";
                                        echo "<td class=\"cell100 column9\">".$amount."</td>"; 

                                        //check + symbol
                                        if (strpos($btype, '+') !== false) {
                                        // code...
                                        echo "<td class=\"cell100 column10\"><a href=\"sess_approve?req_id=$req_id&type=$btypen%2B&name=$name&dis=$district&amount=$amount\"><i class=\"fa fa-cogs\"></i></a></td></tr>";
                                        }
                                        else {
                                        echo "<td class=\"cell100 column10\"><a href=\"sess_approve?req_id=$req_id&type=$btypen&name=$name&dis=$district&amount=$amount\"><i class=\"fa fa-cogs\"></i></a></td></tr>";
                                        }

                                        
                                }
                                }else{
                                    echo "<center><p>There is no blood request available</p></center>";
                                }
                                
                            ?>      
                            
                        
                        </table>
                    </div>
                    
                        </div>
                    </div>
                </div>
            
        </div>
        <?php mysqli_close($link); ?>
    </div>    
<?php include '../../footer.php'; ?>