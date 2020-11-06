
<?php
require_once "../session.php";
require_once "../header.php";
$volume_err="";
if($_SERVER['REQUEST_METHOD']=="GET"){
    if (isset($_GET['vol'])) {$volume_err=$_GET['vol'];}
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Manage Blood Stock</title>
		
</head>
<body>
	

	<div class="container-row admin">
        <?php
            require_once "../dashboard.php";
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading" style="margin-bottom: 0px">Update Blood Stocks</div>
            </div>
            <center>
                <form action="../application/update_stock.php" method="post" style="padding-top: 70px;">
        			<div class="form-group">
                        <label for="bgroup">Select Blood Group</label>
                        <select id="bgroup" name="bgroup">
                            <option value="3">A+</option>
                            <option value="4">A-</option>
                            <option value="5">B+</option>
                            <option value="6">B-</option>
                            <option value="7">AB+ </option>
                            <option value="8">AB-</option>
                            <option value="1">O+</option>
                            <option value="2">O-</option>
                        </select>
                    </div>
        			<div class="form-group  <?php echo (!empty($volume_err)) ? 'has-error' : ''; ?>">
                        <label>New Volume</label>
                        <input type="text" name="volume" class="form-control">
                        <span class="help-block" style="font-size: 20px;"><?php echo $volume_err; ?></span>
                    </div>
					<center><input type="submit" name="hospital" value="Update"></center>
				</form>
                
            </center>
        </div>
    </div>

<?php include '../../footer.php'; ?>