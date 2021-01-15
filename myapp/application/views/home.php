<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css');?>">
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
					<a class="nav-link" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="login">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="registration/savedata">Registration</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="admin_login">Admin</a>
				</li>
			</ul>
		</div>
	</nav>

	<header class="page-header header container-fluid">
		<div class="overlay">
			<div class="description">
				<h1>MADUSANKA JUICE HUT</h1>
				<h2>GAMPAHA</h2>
				<marquee><h4>The Best Juice Hut in the Country</h4></marquee>
				<button class="btn btn-outline-secondary btn-lg">Read More</button>
			</div>

		</div>
	</header>

	<div class="container features">
 		<div class="row">
 			<div class="col-lg-4 col-md-4 col-sm-12">
 				<h3 class="feature-title">MILK SHAKES</h3>
 				<center><img src="<?php echo base_url('assets/img/download.jfif');?>" class="img-fluid"></center>
 				<center><p>FROM Rs: 200.00 + dc</p></center>
 			</div>
 			<div class="col-lg-4 col-md-4 col-sm-12">
				 <h3 class="feature-title">JUICE</h3>
 				<center><img src="<?php echo base_url('assets/img/juice.jfif');?>" class="img-fluid"></center>
 				<center><p>FROM Rs: 100.00 + dc</p></center>
 			</div>
 			<div class="col-lg-4 col-md-4 col-sm-12">
 				<h3 class="feature-title">ICE CREAM</h3>
 				<center><img src="<?php echo base_url('assets/img/ice.jfif');?>" class="img-fluid"></center>
 				<center><p>FROM RS: 130.00 + dc</p></center>
 			</div>
 		</div>
	</div>

	<footer class="page-footer">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-8 col-md-8 col-sm-12">
 					<center><h3>COMMENTS</h3></center>
					<div class="form-group">
 						<input type="text" class="form-control" placeholder="Name" name="">
					</div>
					<div class="form-group">
 						<input type="email" class="form-control" placeholder="Email Address" name="email">
					</div>
					<div class="form-group">
 						<textarea class="form-control" rows="4"></textarea>
					</div>
					<input type="submit" class="btn btn-secondary btn-block" value="Send" name="">

 				</div>

 				<div class="col-lg-4 col-md-4 col-sm-12">
 					<center>
 					<h6 class="text-uppercase font-weight-bold">Contact</h6>
 					<p>Madusanka Juice Hut, colombo rd, Gampaha
 					<br/>mudusankajuicehut@gmail.com
 					<br/>+ 01 234 567 88
 					<br/>+ 01 234 567 89</p>
 					</center>
 				</div>
 			</div>
 			<div class="footer-copyright text-center">© 2020 Copyright:madusankajuicehut.com</div>
 		</div>
</footer>


</body>
</html>