<!DOCTYPE html>
<html>
<body>
	<div class="dashboard-side">

            <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>

            <form method="post">

            <div class="contain">

            	<?php
            		$uri = $_SERVER['REQUEST_URI'];
					//echo $uri;
            	?>

    <li><i class="fa fa-home" aria-hidden="true"></i><a href="http://localhost/bloodbank/hospital/index.php" <?php if (strpos($uri, '/hospital/index')){ echo "class= \"active\" "; }?>  >Home</a></li>
 	<li><i class="fa fa-hospital-o" aria-hidden="true"></i><a href="http://localhost/bloodbank/hospital/search_hospital/index.php" <?php if (strpos($uri, '/hospital/search_hospital')){ echo "class= \"active\" "; }?>  >Search hospital</a></li>

    <li><i class="fa fa-user" aria-hidden="true"></i><a href="http://localhost/bloodbank/hospital/profile/index.php" <?php if (strpos($uri, '/hospital/profile')){ echo "class= \"active\" "; }?>  >Profile</a></li>

    <li><i class="fa fa-bar-chart" aria-hidden="true"></i><a href="http://localhost/bloodbank/hospital/view_report/index.php" <?php if (strpos($uri, '/hospital/view_report')){ echo "class= \"active\" "; }?>  >View Report</a></li>

               

            </div>

            </form>



        </div>
</body>
</html>
