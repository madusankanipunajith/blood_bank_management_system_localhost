<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PROFILE</title>
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
			
			<center><h1>ADMIN PROFILE</h1></center><br>

				<?php
					foreach($data as $row){
				?>

				<h2>Admin Name : <?php echo $row->name; ?></h2>
				<h2>Admin Email : <?php echo $row->email; ?></h2>
				<h2>Admin Address : <?php echo $row->address; ?></h2>
				<h2>Admin Telephone : <?php echo $row->telephone; ?></h2>

				<div class="update_box">
					<?php 
					echo "<a class='nav-link' href='update_data?id=".$row->id."'>Update</a>";
					?>
				</div>
			
		<?php } ?>
					
		</div>
	</div>

</body>
</html>