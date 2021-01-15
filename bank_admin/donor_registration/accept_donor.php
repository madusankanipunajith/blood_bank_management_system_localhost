<?php

    require "../session.php";
    require ('../header.php');
?>
<?php
$id=$volume_table=$nic=$bgroup=$name=$dob=$district=$purpose="";
$volume_err=$bgroup_err="";

$place= $_SESSION['place'];

if (isset($_GET['nic'])) {
    $nic = $_GET['nic'];
}
//query
$sql= "SELECT * FROM donor WHERE nic='$nic'";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    
        $firstname = $row["first_name"];
        $lastname = $row["last_name"];
        $dob= $row["dob"];
        $bgroup = $row["bloodgroup"];
        $district = $row["district"];
        $encryption = $row["status"];
        //decrypt mechanism
        $ciphering = "AES-128-CTR"; 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        $decryption_iv = '1234567891011121'; 
        $decryption_key = "Yuthukamabloodbanksystem";

        $purpose=openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $decryption_iv);
         
        $name= $firstname." ".$lastname;

        }
}else{
    echo "Something went wrong while loading...";
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET['vol'])){ $volume_err= $_GET['vol']; }
        if(isset($_GET['bg'])){ $bgroup_err= $_GET['bg']; }
    }
    
  mysqli_close($link);  
?>

<body>
	

	<div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading">Donor Registration  (<?php echo "$place";?>)</div>
            </div>
            
        <form action="application/accept_donor.php?nic=<?php echo $nic;?>" method="post" style="margin-left: 20px; margin-right: 20px; margin-top: 40px;">
                <div class="form-row">
                    <div class="form-group">
                    <label>NIC</label>
                    <input type="text" name="nic" value="<?php echo $nic; ?>" readonly> 
                    </div>
                    <div class="form-group <?php echo (!empty($bgroup_err)) ? 'has-error' : ''; ?>">
                        <label>Blood Group</label>
                            <select id="bgroup" name="bgroup" class="form-control">
                                <option value="<?php echo $bgroup;?>"><?php echo "$bgroup";?></option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>    
                    </div>
                    <div class="form-group <?php echo (!empty($volume_err)) ? 'has-error' : ''; ?>">
                        <label>Volume (ml)</label>
                        <select id="volume" name="volume" class="form-control">
                                <option value=""></option>
                                <option value="0">0 ml (blood problem)</option>
                                <option value="50">50 ml (min)</option>
                                <option value="100">100 ml</option>
                                <option value="200">200 ml</option>
                                <option value="250">250 ml</option>
                                <option value="300">300 ml</option>
                                <option value="400">400 ml</option>
                                <option value="500">500 ml (max)</option>
                            </select>  
                    </div>
                      
                </div>
                <div class="form-row">
                    <div class="form-group">
                    <label>Full Name</label>    
                    <input type="text" name="name" value="<?php echo $name;?>" readonly>   
                    </div>
                    <div class="form-group">
                    <label>DOB</label>
                    <input type="text" name="dob" value="<?php echo $dob;?>" readonly>     
                    </div>

                    <div class="form-group">
                    <label>District</label>
                    <input type="text" name="dob" value="<?php echo $district;?>" readonly>     
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                    <label>Cases (If Any)</label>
                    <textarea name="case" rows="6" cols="108" style="resize: none;" ><?php echo "$purpose"; ?></textarea>
                    </div><div class="form-group"></div>
                    
                    <div class="form-group">
                     <label>Validation</label>    
                            <select name="valid" class="form-control">
                                <option value="1">Valid</option>
                                <option value="0">InValid</option>
                            </select>  
                    </div>
                    
                </div>
                <center>
                    <input type="submit" name="submit">
                    <a href="select_donor" style="color: #808080; font-size: 15px;">Back</a>
                </center>
            </form>
            
        </div>
    </div>

<?php include '../../footer.php'; ?>
