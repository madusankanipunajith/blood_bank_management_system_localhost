<?php
    require_once "../session.php";
    $old_err=$new_err=$confirm_err="";
    if($_SERVER['REQUEST_METHOD']=="GET"){
        if (isset($_GET['old'])) {$old_err=$_GET['old'];}
        if (isset($_GET['new'])) {$new_err=$_GET['new'];}
        if (isset($_GET['conf'])) {$confirm_err=$_GET['conf'];}
    }
    
?>
<?php
    require_once "../header.php";
?>
<body>
	<div class="container-row admin">
	<?php
	require_once "../dashboard.php";
	?>

	<div class="main clearfix">
		<div class="topic">
		<center>
			<form action="../application/edit_password.php" method="post">
				<div class="form-group <?php echo (!empty($old_err)) ? 'has-error' : ''; ?>">
					<label>OLD PASSWORD</label>
                    <input type="password" name="old" class="form-control">
                    <span class="help-block" style="font-size: 15px;"><?php echo $old_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($new_err)) ? 'has-error' : ''; ?>">
					<label>NEW PASSWORD</label>
                    <input type="password" name="new" class="form-control">
                    <span class="help-block "style="font-size: 15px;"><?php echo $new_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($confirm_err)) ? 'has-error' : ''; ?>">
					<label>CONFIRM PASSWORD</label>
                    <input type="password" name="confirm" class="form-control">
                    <span class="help-block "style="font-size: 15px;"><?php echo $confirm_err; ?></span>
				</div>

				<input type="submit" name="Submit">
				<div style="margin-top: : -50px; ">
                <a href="edit_admin" style="color: #848484; font-size: 15px;">Cancel</a>
            </div>
			</form>
		</center>
		</div>
	</div>

	</div>

<?php include '../../footer.php'; ?>