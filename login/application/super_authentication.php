<?php
	require '../header.php';
$pin_err="";
	if ($_SERVER["REQUEST_METHOD"] == "GET"){
		if (isset($_GET['pin'])) {
			$pin_err= $_GET['pin'];
		}
	}
?>

<body>
	
<div style="margin-top: 100px;">
	<center>
	<h1>Super Admin PIN</h1>

	<form action="super_verify.php" method="post">
		<div class="form-group <?php echo (!empty($pin_err)) ? 'has-error' : ''; ?>">
			<label><h2>Enter Super Admin PIN <i class="fa fa-key" aria-hidden="true"></i></h2> </label>
			<input type="number" name="pin" style="border-color: green;">
			<span class="help-block"><?php echo $pin_err; ?></span>
		</div>

		<input type="submit" name="submit" value="Accept">
	</form>

	</center>
</div>


<?php include '../../footer.php'; ?>	
</body>

