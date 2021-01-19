<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>ORDER LIST</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form.css');?>">
	<script src="<?php echo base_url('assets/js/jquery-3.5.1.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
	<script src="<?php echo base_url('assets/js/main.js');?>"></script>
	<style type="text/css">
		table, td, th{
			border: 1px solid black;
		}
		td, th{
			padding: 5px;
			text-align: center;
		}
	</style>
</head>
<body>
	<center><h1>ORDER LIST</h1></center><br>

	<table width="100%">
		<tr>
			
			<th>ORDER ID</th>
			<th>PRODUCT NAME</th>
			<th>QUANTITY</th>
			<th>CUSTOMER</th>
			<th>ADDRESS</th>
			<th>TP</th>
			<th>FINISH</th>
		</tr>
		<?php
			foreach ($data as $row) {
				echo "<tr>";
				echo "<td>".$row->id."</td>";
				echo "<td>".$row->name."</td>";
				echo "<td>".$row->amount."</td>";
				echo "<td>".$row->cust_name."</td>";
				echo "<td>".$row->address."</td>";
				echo "<td>".$row->telephone."</td>";
				echo "<td> <input type='checkbox' value='true'> </td>";
				echo "</tr>";
			}

		?>
	</table>

</body>
</html>