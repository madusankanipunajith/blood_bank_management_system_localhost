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
					<label>Old Password<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span></label>
                    <input type="password" id="pass_log_id" name="old" class="form-control" value="<?php if(empty($old_err) && !empty($confirm_err)){echo $_SESSION['pwd'];}?>" required>
                    <span class="help-block" style="font-size: 15px;"><?php echo $old_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($new_err)) ? 'has-error' : ''; ?>">
					<label>New Password<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span></label>
                    <input type="password" id="pass_log_id" name="new" class="form-control" required>
                    <span class="help-block "style="font-size: 15px;"><?php echo $new_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($confirm_err)) ? 'has-error' : ''; ?>">
					<label>Confirm Password<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span></label>
                    <input type="password" id="pass_log_id" name="confirm" class="form-control" required>
                    <span class="help-block "style="font-size: 15px;"><?php echo $confirm_err; ?></span>
				</div>

				<input type="submit" name="Submit" class="button btn-edit">
				<div class="form-group">
                <a href="edit_admin"><div class="button">Cancel</div></a>
            	</div>
			</form>
		</center>
		</div>
	</div>

	</div>

<?php include '../../footer.php'; ?>