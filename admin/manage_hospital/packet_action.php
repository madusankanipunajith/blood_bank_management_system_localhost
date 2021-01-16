<?php
   require '../session.php';
   include '../header.php'; 
?>
<?php
$hos_err="";
    if (isset($_GET['hos'])) {
        $hos_err=$_GET['hos'];
    }
?>
<body>
	

	<div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>

        <div class="main clearfix">
            <div class="topic" style="margin-top: 0px;">
                <div class="form-style-2-heading">Action On Admins</div>
                
                <center>
                    <p>If you want to Delete the Hospital with Considering Blood Packets (Transfer Packets To Another Hospital), You can use this section</p>
                <form action="application/packet_action.php" method="post">
                
                        <div class="form-group ">
                            <label>Choose a Hospital to Transfer Packets</label>
                            <?php
                                $sql="SELECT HospitalID,Name,District FROM blood_bank_hospital";$result2=mysqli_query($link,$sql);
                                
                                    if(mysqli_num_rows($result2)){
                                        $select= '<select name="hosid" class="form-control"> required';
                                        $select.='<option value="">'."".'</option>';
                                        
                                        while($rs=mysqli_fetch_array($result2)){
                                        $select.='<option value="'.$rs['HospitalID'].'">'.$rs['HospitalID'].' / '.$rs['Name'].' / '.$rs['District'].'</option>';
                                        }
                                    }
                                        $select.='</select>';
                                        echo "$select";
                                
                            ?>
                            
                             <span class="tooltiptext tooltip_font"><?php echo $hos_err;?></span>
                        </div>
                        
                <input class="button btn-delete" type="submit" name="delete" value="Transfer and Delete" onclick="return confirm('Are You Sure?');">
                </form>
            </center>

            </div>
            <br>
            <div class="form-style-2-heading"></div>
            <center>
           
                <p><b>If you want to Delete the Hospital with Blood Packets (Any way Delete The Hospital), You can use this section</b></p>
                
                <div class="column11"><a href="application/packet_action?dirrect=ok" onclick="return confirm('Are You Sure?');"><div class="button btn-delete" name="delete_dirrect">Delete Dirrectly</div></a></div>
            
            </center>
            <br>

            <div class="form-style-2-heading"></div>

            <center><a href="select_hospital" class="button">Back</a></center>
            
        </div>
<?php mysqli_close($link);?>        
    </div>

<?php include '../../footer.php'; ?>