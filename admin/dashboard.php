<div class="dashboard-side">
    <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>
    <form method="post">
        <div class="contain">
        	<?php
        		$uri= $_SERVER['REQUEST_URI']; 
        	?>
    <li><i class="fa fa-home" aria-hidden="true"></i><a href="/bloodbank/admin/index" <?php if (strpos($uri, '/admin/index')){ echo "class= \"active\" "; }?> >Home</a></li>
    <li><i class="fa fa-user-md" aria-hidden="true"></i><a href="/bloodbank/admin/manage_admin/index"<?php if (strpos($uri, '/admin/manage_admin')){ echo "class= \"active\" "; }?> >Manage Admin</a></li>
 	<li><i class="fa fa-hospital-o" aria-hidden="true"></i><a href="/bloodbank/admin/manage_hospital/index" <?php if (strpos($uri, '/admin/manage_hospital')){ echo "class= \"active\" "; }?> >Manage Hospitals</a></li>
    <li><i class="fa fa-file-text" aria-hidden="true"></i><a href="/bloodbank/admin/view_report/index" <?php if (strpos($uri, '/admin/view_report')){ echo "class= \"active\" "; }?> >View Report</a></li>
    <li><i class="fa fa-cogs" aria-hidden="true"></i><a href="/bloodbank/admin/profile/index" <?php if (strpos($uri, '/admin/profile')){ echo "class= \"active\" "; }?> >Settings</a></li>
        </div>
    </form>
</div>