<!DOCTYPE html>
<html>
<body>
	<div class="dashboard-side">
		<div style="text-align: center; font-weight: bold; margin-top: -5px;">Dashboard</div><br>
		<form method="post">
			<div class="contain">
				
		<?php
			$uri= $_SERVER['REQUEST_URI'];
		?>
		<li><i class="fa fa-home" aria-hidden="true"></i><a href="/bloodbank/bank_admin/index" <?php if (strpos($uri, '/bank_admin/index')){ echo "class= \"active\" "; }?>  >Home</a></li>
		<li><i class="fa fa-table" aria-hidden="true"></i><a href="/bloodbank/bank_admin/appointments/index" <?php if (strpos($uri, '/bank_admin/appointments')){ echo "class= \"active\" "; }?>  >Manage Appointments</a></li>
		<!--
			<li><i class="fa fa-check" aria-hidden="true"></i><a href="/bloodbank/bank_admin/approve_appointment/index" <?php if (strpos($uri, '/bank_admin/approve_appointment')){ echo "class= \"active\" "; }?>  >New Appointment</a></li>
		-->
		<li><i class="fa fa-address-card" aria-hidden="true"></i><a href="/bloodbank/bank_admin/manage_donor/index" <?php if (strpos($uri, '/bank_admin/manage_donor')){ echo "class= \"active\" "; }?>  >Manage Donor</a></li>
		<li><i class="fa fa-hotel" aria-hidden="true"></i><a href="/bloodbank/bank_admin/manage_campaign/index" <?php if (strpos($uri, '/bank_admin/manage_campaign')){ echo "class= \"active\" "; }?>  >Manage Campaign</a></li>
		<li><i class="fa fa-cogs" aria-hidden="true"></i><a href="/bloodbank/bank_admin/manage_organization/index" <?php if (strpos($uri, '/bank_admin/manage_organization')){ echo "class= \"active\" "; }?>  >Organizations</a></li>
		<li><i class="fa fa-cubes" aria-hidden="true"></i><a href="/bloodbank/bank_admin/manage_stock/index" <?php if (strpos($uri, '/bank_admin/manage_stock')){ echo "class= \"active\" "; }?>  >Manage Stock</a></li>
		<li><i class="fa fa-briefcase"  aria-hidden="true"></i><a href="/bloodbank/bank_admin/donor_registration/index" <?php if (strpos($uri, '/bank_admin/donor_registration')){ echo "class= \"active\" "; }?>  >Manage Packets</a></li>
		<li><i class="fa fa-search"  aria-hidden="true"></i><a href="/bloodbank/bank_admin/search_blood/index" <?php if (strpos($uri, '/bank_admin/search_blood')){ echo "class= \"active\" "; }?>  >Search Blood</a></li>
		<li><i class="fa fa-tint"  aria-hidden="true"></i><a href="/bloodbank/bank_admin/donate_blood/index" <?php if (strpos($uri, '/bank_admin/donate_blood')){ echo "class= \"active\" "; }?>  >Donate Blood</a></li>
		<li><i class="fa fa-book"  aria-hidden="true"></i><a href="/bloodbank/bank_admin/reports/index" <?php if (strpos($uri, '/bank_admin/report')){ echo "class= \"active\" "; }?>  >Packet Reports</a></li>
		<li><i class="fa fa-user" aria-hidden="true"></i><a href="/bloodbank/bank_admin/profile/index" <?php if (strpos($uri, '/bank_admin/profile')){ echo "class= \"active\" "; }?>  >Profile</a></li>


		</div>
		</form>
		
	</div>
</body>
</html>