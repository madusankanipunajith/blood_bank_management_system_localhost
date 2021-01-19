<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>CUSTOMER HOME</title>
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
					<a class="nav-link" href="../home">Home</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="../logout">Log Out</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="header">
		<div class="overlay">
			<?php
				$sess_arr = $this->session->userdata('session_data_1');
				$names= $sess_arr['username'];
			
			echo '<div class="bg-light"><h1>AYUBOWAN'.' '.strtoupper($names).'</h1></div>'
			?>
			<table width="100%" class="table table-striped table-dark bg-transparent ">
		<thead>
			<tr>
			
			<th><h1>ID</h1></th>
			<th><h1>NAME</h1></th>
			<th><h1>PRICE</h1></th>
			
		</tr>
		</thead>
		<?php
		//	$a=array();
			foreach ($data as $row) {
				echo "<tr class='text_clr'>";
				echo "<td>".$row->id."</td>";
				echo "<td>".$row->name."</td>";
				echo "<td>".$row->price."</td>";
				echo "<td><a href='order_product?id=".$row->id."' class='text_clr'>Order_Now</a></td>";
			//	echo "<td><a href='update_data?id=".$row->id."'>Update</a></td>";
				echo "</tr>";

			//	array_push($a,$row->id);
			}

		//	echo $a[0];
		?>
	</table>

		</div>
	</div>

</body>
</html>