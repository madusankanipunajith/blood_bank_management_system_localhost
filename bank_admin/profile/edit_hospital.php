<?php
	require "../session.php";
    require ('../header.php');
?>
<?php
$telephone= array();$telephone[1]="";
$name_err=$district_err=$telephone_err=$telephone2_err="";
$name=$district=$tel1=$tel2=$count="";

    $bankid = $_SESSION["id-3"];
	// queries
    $sql = "SELECT a.Name AS Name, a.District AS District, b.TelephoneNo AS TelephoneNO FROM blood_bank_hospital a INNER JOIN blood_bank_hospital_telephone b ON a.HospitalID=b.BBID WHERE a.HospitalID= '$bankid' ORDER BY b.Flag DESC";
    $result = mysqli_query($link, $sql);

     $count= mysqli_num_rows($result);

    if (mysqli_num_rows($result) > 0) {$i=0;
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    
        $name = $row["Name"];
        $district = $row["District"];
        $telephone[$i]= $row["TelephoneNO"];

        $i++;
        }
        $tel1=$telephone[0];$tel2=$telephone[1];
    }

  
?>
<?php
    if($_SERVER['REQUEST_METHOD']=="GET"){
        if (isset($_GET['name'])) {$name_err=$_GET['name'];}
        if (isset($_GET['dis'])) {$district_err=$_GET['dis'];}
        if (isset($_GET['tel1'])) {$telephone_err=$_GET['tel1'];}
        if (isset($_GET['tel2'])) {$telephone2_err=$_GET['tel2'];}
        
    }
?>
<body>
	<div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>

        <div class="main clearfix">
            <div class="topic">
            	
            </div>
            
            <center>
            	<form action="../application/edit_hospital.php?count=<?php echo $count;?>" method="post">
            	
                
                    <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                        <label>Hospital Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
                        <span class="help-block"><?php echo $name_err; ?></span>
                    </div>
                
               
                    <div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>">
                        <label>District</label>
                        
                        <?php
                                $sql="SELECT name FROM district";
                                $result=mysqli_query($link, $sql);
                                if(mysqli_num_rows($result)){
                                    $select= '<select name="district" class="form-control">';
                                    $select.="<option value=\"$district\">$district</option>";
                                        while($rs=mysqli_fetch_array($result)){
                                        $select.='<option value="'.$rs['name'].'">'.$rs['name'].'</option>';
                                        }
                                    }
                                    $select.='</select>';
                                    echo "$select";
                            ?>
                        <span class="help-block" ><?php echo $district_err; ?></span>
                    </div>
                
        
                
                    <div class="form-group <?php echo (!empty($telephone_err)) ? 'has-error' : ''; ?>">
                        <label>Telephone</label>
                        <input type="number" name="tel1" value="<?php echo $tel1; ?>" required>  
                        <span class="help-block" ><?php echo $telephone_err; ?></span>   
                    </div>
                    <div class="form-group <?php echo (!empty($telephone2_err)) ? 'has-error' : ''; ?>">
                        <label>Telephone (Optional)</label>
                        <input type="number" name="tel2" value="<?php echo $tel2; ?>">  
                        <span class="help-block" ><?php echo $telephone2_err; ?></span>   
                    </div>
                  
                
                
            <input type="submit"  name="Submit" class="button btn-edit">
           
                <div style="width: 100px;">
                    <a href="edit_admin">
                    <p><i class="fa fa-backward"></i>Back</p>
                    </a>
                </div>
               
          

            </form>
            </center>
          
           </div> 
    <?php  
    // Close connection
    mysqli_close($link); 
    ?>
           </div>
            
               
        
    
<?php include '../../footer.php'; ?>