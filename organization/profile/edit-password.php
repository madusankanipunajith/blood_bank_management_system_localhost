<?php
	require_once "../session.php";
    $old_err=$new_err=$confirm_err="";
    /*
    if($_SERVER['REQUEST_METHOD']=="GET"){
        if (isset($_GET['old'])) {$old_err=$_GET['old'];}
        if (isset($_GET['new'])) {$new_err=$_GET['new'];}
        if (isset($_GET['conf'])) {$confirm_err=$_GET['conf'];}
    }*/

    $old_err= get_old_password_err();
    $new_err= get_new_password_err();
    $confirm_err= get_confirm_password_err();
    
?>
<?php
	require_once "../header.php";
?>
<body>
	<div class="container-row organization">
	<?php
	require_once "../sidebar.php";
	?>

	<div class="main clearfix">
		<div class="topic">
		<center>
			<form action="../application/edit-password.php" method="post">
				<div class="form-group <?php echo (!empty($old_err)) ? 'has-error' : ''; ?>">
					<label>Old Password<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span></label>
                    <input type="password" id="pass_log_id" name="old" class="form-control" value="<?php echo isset($_SESSION["old_password"])?$_SESSION["old_password"]:""; ?>" required>
                    <span class="help-block" style="font-size: 15px;"><?php echo $old_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($new_err)) ? 'has-error' : ''; ?>">
					<label>New Password<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span></label>
                    <input type="password" id="pass_log_id" name="new" class="form-control" value="<?php echo isset($_SESSION["new_password"])?$_SESSION["new_password"]:""; ?>" required>
                    <span class="help-block "style="font-size: 15px;"><?php echo $new_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($confirm_err)) ? 'has-error' : ''; ?>">
					<label>Confirm Password<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span></label>
                    <input type="password" id="pass_log_id" name="confirm" class="form-control" value="<?php echo isset($_SESSION["confirm_password"])?$_SESSION["confirm_password"]:""; ?>" required>
                    <span class="help-block "style="font-size: 15px;"><?php echo $confirm_err; ?></span>
				</div>

				<input type="submit" name="Submit" class="button btn-edit">
				<div class="form-group">
                <a href="edit-organization"><div class="button">Cancel</div></a>
            	</div>
			</form>
		</center>
		</div>
	</div>

	</div>

<?php include '../../footer.php'; ?>