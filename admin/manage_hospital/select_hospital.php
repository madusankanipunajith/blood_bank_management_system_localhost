<?php
    require '../session.php';
    require '../header.php';
?>
<?php
    $sql="SELECT * FROM blood_bank_hospital ORDER BY Name ASC";
    $result=mysqli_query($link, $sql);
?>
<body>
	
	<div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            
            <div class="topic">
                <div class="form-style-2-heading">Select Hospitals</div>
            </div>
                <div class="container-table100">
                    <div style="width: 100%">
                        <div class="table100 ver2 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                            <tr class="row100 head" >
                             <th class="cell100 column8">Hospital Name</th>
                             <th class="cell100 column4">Address</th> 
                              <th class="cell100 column6">District</th> 
                             <th class="cell100 column6">Choose</th>     
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table100-body">
                        <table>
                            <?php
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    
                                    $id = $row["HospitalID"];
                                    $name = $row["Name"];
                                    $address = $row["Address"];
                                    $district= $row["District"];

                                echo "<tr class='row100 body'><td class='cell100 column8'>".$name."</td>";
                                echo "<td class='cell100 column4'>".$address."</td>";
                                echo "<td class='cell100 column6'>".$district."</td>";
                                echo "<td class='cell100 column6'><a href=\"delete_hospital?id=$id&name=$name&add=$address&dis=$district\" style=\"color:blue;\">Choose</a></td></tr>";
                            }
                                
                            ?>
                        
                        </table>
                    </div>
                        </div>
                    </div>
                    
                </div>
           
        </div>
    </div>

</body>
</html>