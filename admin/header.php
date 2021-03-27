<!DOCTYPE html>
<html>
<head>
	<title>System Admin</title>
	<link rel="shortcut icon" type="image/png" href="../images/favicon.png"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script type="text/javascript" src="/bloodbank/js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="/bloodbank/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<style>
	    .tile-info-row{
	        display: inline-grid;
	    }
	    
	    .tile-heading{
	        font-size: 24px;
	        font-weight: 600;
	        padding: 10px;
	    }
	    
	    .fa{
	        font-size: 22px;
            margin-right: 10px;
            color: #04A5AA;
	    }
	    
	    .tile-2{
	        height: 100px;
	        background-color: rgba(245, 252, 255, 0.8);
	    }
	    
	    i{
	        height: 20px;
	        width: 20px;
	    }
	    
	    .sidebar-menu{
	        font-family: 'Roboto', sans-serif;
	        font-weight: 400;
            font-size: 18px;
	    }
	    .contain a.active {
            color: #04A5AA;
            font-weight: 400;
        }
        
        .tile-2:hover{
            background-color: rgba(245, 252, 255, 1);
            transition: background-color 0.3s;
        }
	</style>

	<?php
	date_default_timezone_set("Asia/Colombo");
	?>

</head>
<body>
		<div class="top-bar clearfix">
		<a href="/bloodbank/index"><div class="logo">
        </div></a>
				<div class="top-bar-links">
					<ul>
						<li><a href="/bloodbank/index.php"><i class="fa fa-home"></i>Home</a></li>
						<li><a href="#"><i class="fa fa-mobile"></i>Contact Banks</a></li>
						<li><a href="#"><i class="fa fa-bed"></i>Campaigns</a></li>
						
						<li><a href="/bloodbank/admin/logout.php"><i class="fa fa-sign-out"></i>Log Out</a></li>
					</ul>
				</div>	<!--top-bar-links-->
				
		</div>	<!--top-bar-->

	

</body>
</html>