<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN UPDATE FORM</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form.css');?>">
	<script src="<?php echo base_url('assets/js/jquery-3.5.1.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
	<script src="<?php echo base_url('assets/js/main.js');?>"></script>
</head>
<body>

	<div class="header">
		<div class="overlay">
			<div class="form_reg clearfix">
			<div class="form-style-3 clearfix">
				<?php
					foreach($data as $row){
				?>
			<form method="post">
			<fieldset><legend>Update Admin</legend>
				<label for="field1"><span>Name <span class="required">*</span></span><input type="text" class="input-field" name="name" value="<?php echo $row->name; ?>" /></label>
				<label for="field2"><span>Email <span class="required">*</span></span><input type="email" class="input-field" name="email" value="<?php echo $row->email; ?>" /></label>
				<label for="field3"><span>Phone <span class="required">*</span></span><input type="text" class="input-field" name="telephone" value="<?php echo $row->telephone; ?>" /></label>
				<label for="field3"><span>Address <span class="required">*</span></span><input type="text" class="input-field" name="address" value="<?php echo $row->address; ?>" /></label>
				<label for="field4"><span>Password <span class="required">*</span></span><input type="password" class="input-field" name="password" value="<?php echo $row->password; ?>" /></label>
				
			</fieldset>

			<label><span> </span><input type="submit" name="update" value="update data" onclick="msg()"/></label>

			</form>
		<?php } ?>
			</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function msg() {
  		alert("Are You Sure !!!");
	}
	</script>

</body>
</html>