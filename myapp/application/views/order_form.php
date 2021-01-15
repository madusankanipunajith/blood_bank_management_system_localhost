<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>ORDER FORM</title>
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

	<nav class="navbar navbar-expand-md">
		<a class="navbar-brand" href="#">Logo</a>
		<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="main-navigation">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="../login">Back to Home</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="../logout">Log Out</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="header">
		<div class="overlay">
			<div class="form_reg clearfix">
			<div class="form-style-3 clearfix">
				<?php
					foreach($data as $row){
				?>
			<form method="post">
			<fieldset><legend>Order Form</legend>
				<label for="field1"><span>Product ID <span class="required">*</span></span><input type="text" class="input-field" name="id" value="<?php echo $row->id; ?>" readonly/></label>
				<label for="field2"><span>Pdct Name <span class="required">*</span></span><input type="text" class="input-field" name="name" value="<?php echo $row->name; ?>" readonly/></label>
				<label for="field3"><span>Price (Rs)<span class="required">*</span></span><input type="text" class="input-field" name="price" value="<?php echo $row->price; ?>" readonly/></label>
				<label for="field3"><span>Your Name <span class="required">*</span></span><input type="text" class="input-field" name="cust_name" value="" required /></label>
				<label for="field3"><span>Quantity<span class="required">*</span></span><input type="text" class="input-field" name="qty" value="" required /></label>
				<label for="field3"><span>Delivary Address <span class="required">*</span></span><input type="text" class="input-field" name="address" value="" required /></label>
				<label for="field4"><span>Telephone <span class="required">*</span></span><input type="text" class="input-field" name="telephone" value="" required /></label>
				
			</fieldset>

			<label><span> </span><input type="submit" name="order" value="Order Now" onclick="msg()" /></label>

			</form>
		<?php } ?>
			</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function msg() {
  		alert("Confirm Your Order!");
		}
	</script>

</body>
</html>