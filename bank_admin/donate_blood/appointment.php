<?php
require '../session.php';
require '../header.php';

$bankid=$_SESSION["id-3"];
$sql5 = "SELECT s.BloodId, s.Volume, b.BloodId, b.Type FROM blood_stock s, blood b WHERE b.BloodId = s.BloodId AND s.StockID='$bankid'";
$result5 = mysqli_query($link, $sql5);

$name=$btype=$amount=$hosid="";


if (!empty($_SESSION['bloodid'])) {
    $btype_id= $_SESSION['bloodid'];
    $sql6= "SELECT Type FROM blood WHERE BloodID='$bloodid' ";
    $result6= mysqli_query($link, $sql6);while ($row = mysqli_fetch_assoc($result6)) {$btype=$row["Type"];}
        
}

if($_SERVER["REQUEST_METHOD"] == "GET"){

	if (isset($_GET['fhosid'])) {
		$hosid= $_GET['fhosid'];
        
        if ($_SESSION['hostype']=="bloodbank") {
            $sql7="SELECT Name, District FROM blood_bank_hospital WHERE HospitalID='$hosid'";
        }else{
            $sql7="SELECT Name, District FROM normal_hospital WHERE UserName='$hosid'";
        }
        $result7= mysqli_query($link, $sql7);while ($row = mysqli_fetch_assoc($result7)) {$hosname=$row["Name"];$district=$row["District"];}
	}
	
	if (isset($_GET['famount'])) {
		$amount= $_GET['famount'];
	}   

}


?>
<body>

	<div class="container-row admin">
        <?php
        require_once '../dashboard.php';
        ?>

        <div class="main">
           
        <div style="width: 40%; float: left;">
            
                <form action="../application/req_submit" method="post">
            	<div class="form-style-2-heading form-submit">Requested Hospital Details</div>
                <?php
                    if (isset($_GET['fail'])) {
                    echo "<p style=\"color: red;\">Ooops! no more than requested amount<p>";
                    }
                ?>
            	<div class="form-group">
            		<label>Hospital Name</label>
            	<?php
                    if ($_SESSION['hostype']=="bloodbank") {
                    $sql2="SELECT HospitalID, Name, District FROM blood_bank_hospital";
                    $result2=mysqli_query($link, $sql2);
                    if(mysqli_num_rows($result2)){
                        $select= '<select name="hosid" class="form-control" required>';
                        if (empty($_GET['fhosid'])) {
                            $select.='<option value="">Select Your Hospital ID</option>';
                        }else{
                           $select.="<option value=\"$hosid\">"."$hosid"." / "."$hosname"." / "."$district"."</option>"; 
                        }
                        
                            while($rs=mysqli_fetch_array($result2)){
                            $select.='<option value="'.$rs['HospitalID'].'">'.$rs['HospitalID'].' / '.$rs['Name'].' / '.$rs['District'].'</option>';
                            }
                        }
                        $select.='</select>';
                        echo "$select";
                    }else{
                    $sql2="SELECT UserName, Name, District FROM normal_hospital";
                    $result2=mysqli_query($link, $sql2);
                    if(mysqli_num_rows($result2)){
                        $select= '<select name="hosid" class="form-control" required>';
                        if (empty($_GET['fhosid'])) {
                            $select.='<option value="">Select Your Hospital ID</option>';
                        }else{
                           $select.="<option value=\"$hosid\">"."$hosname"." / "."$district"."</option>"; 
                        }
                        
                            while($rs=mysqli_fetch_array($result2)){
                            $select.='<option value="'.$rs['UserName'].'">'.$rs['Name'].' / '.$rs['District'].'</option>';
                            }
                        }
                        $select.='</select>';
                        echo "$select";
                    }
                ?>
            	</div>
            	
            	
            		<div class="form-group">
            			<label>Blood Type</label>
                    <?php
                         $sql3="SELECT BloodID,Type FROM blood";
                        $result3=mysqli_query($link, $sql3);
                        if(mysqli_num_rows($result3)){
                        $select= '<select name="type" class="form-control" required>';
                        if (empty($_SESSION['bloodid'])) {
                            $select.='<option value="">'."Select".'</option>';
                        }else{
                            $select.="<option value=\"$btype_id\">"."$btype"."</option>";
                        }
                            
                                while($rs=mysqli_fetch_array($result3)){
                                $select.='<option value="'.$rs['BloodID'].'">'.$rs['Type'].'</option>';
                                }
                        }
                            
                            $select.='</select>';
                            echo "$select";
                    ?>    
            		</div>
            	<div class="form-group">
            		<label>Amount(units)</label>
            		<input type="number" name="amount" value="<?php echo $amount;?>" required>
            	</div>
            	

            	<center>
                    <input type="submit" class="button btn-edit" name="submit"><br>
                    <a href="add_request" class="button">Cancel</a>
                </center>
             </form>   
            </div>

            <div style="float: right; width: 60%;">
		        <div class="container-table100" style="padding-bottom: 10px;">
			        <div class="wrap-table100">
        				<div class="table100 ver2 m-b-110">
        					<div class="table100-head">
        						<table>
        							<thead>
        								<tr class="row100 head">
        									<th class="cell100 column1">Blood Type</th>
        									<th class="cell100 column2">Number of Units</th>
        								</tr>
        							</thead>
        						</table>
        					</div>
            
        					<div class="table100-body " style="max-height: 440px;">
        						<table>
        							<tbody>
        							    <?php 
                                            if (mysqli_num_rows($result5) > 0) {
                                                  // output data of each row
                                                while($row = mysqli_fetch_assoc($result5)) {
                                                    $type = $row["Type"];
                                                    $volume = $row["Volume"];
                                                    
                                                    echo "<tr class='row100 body'><td class='cell100 column1'>".$type."</td>";
                                                    echo "<td class='cell100 column2'>".$volume."</td></tr>";
                                                    
                                                }
                                            } else {
                                                  echo "<p style='padding: 10px; text-align: center; padding-top: 20px;'>Unfortunately, no result found</p>";
                                            }
                                        ?>
        							</tbody>
        						</table>
        					</div>
        			    </div>
			        </div>
		        </div>
		        
		        
            </div>
            
           
            
<?php
mysqli_close($link);
?>            
        </div>
    </div>

<?php include '../../footer.php'; ?>