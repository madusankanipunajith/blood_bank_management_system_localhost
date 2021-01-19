<?php
require '../session.php';
require '../header.php';

$nic_err=$name_err="";
$ptype=$pdistrict=$pnic=$pname="";

if (isset($_SESSION['ptype'])) {
    $ptype=$_SESSION['ptype'];
}
if (isset($_SESSION['pnic'])) {
    $pnic=$_SESSION['pnic'];
}
if (isset($_SESSION['pname'])) {
    $pname=$_SESSION['pname'];
}
if (isset($_SESSION['pdistrict'])) {
    $pdistrict=$_SESSION['pdistrict'];
}

?>

<body>
	

	<div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading">Patient Details</div>
           
            
            <center>
            	<form action="application/select_patient" method="post" class="column50" style="margin-top: 30px;">
                
                    <div class="form-group">
                        <label>Patient's NIC</label>
                        <input type="text" name="pnic" value="<?php echo $pnic;?>" required>
                        <label class="help-block"><?php echo $nic_err;?></label>
                    </div>
                    <div class="form-group">
                        <label>Patient Full Name</label>
                        <input type="text" name="pname" value="<?php echo $pname;?>" required>
                        <label class="help-block"><?php echo $name_err;?></label>
                    </div>
                    <div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>">
                        <label>District</label>
                        
                        <?php
                                $sql="SELECT name FROM district";
                                $result=mysqli_query($link, $sql);
                                if(mysqli_num_rows($result)){
                                    $select= '<select name="pdistrict" class="form-control" required>';

                                    if (empty($_SESSION['pdistrict'])) {
                                        $select.='<option value="">'."Select".'</option>';
                                    }else{
                                        $select.="<option value=\"$pdistrict\">"."$pdistrict"."</option>";
                                    }

                                        while($rs=mysqli_fetch_array($result)){
                                        $select.='<option value="'.$rs['name'].'">'.$rs['name'].'</option>';
                                        }
                                    }
                                    $select.='</select>';
                                    echo "$select";
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Blood Type</label>
                        <?php
                            $sql3="SELECT BloodID,Type FROM blood";
                            $result3=mysqli_query($link, $sql3);

                            if(mysqli_num_rows($result3)){
                            $select= '<select name="ptype" class="form-control" required>';

                            if (empty($_SESSION['ptype'])) {
                                $select.='<option value="">'."Select".'</option>';
                            }else{
                                $select.="<option value=\"$ptype\">"."$ptype"."</option>";
                            }
                                while($rs=mysqli_fetch_array($result3)){
                                $select.='<option value="'.$rs['Type'].'">'.$rs['Type'].'</option>';
                                }
                            }
                            
                            $select.='</select>';
                            echo "$select";
                        ?>    
                    </div>
                </div>
                <center><input type="submit" name="submit" class="button btn-edit"></center>
            </form>
            </center>
            
            
             </div>
        </div>
    </div>

<?php include '../../footer.php'; ?>