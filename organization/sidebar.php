<div class="dashboard-side">
    <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>
    <form method="post">
        <div class="contain">
        	<?php
        		$uri= $_SERVER['REQUEST_URI']; 
        	?>
           
    <li><i class="fa fa-home" aria-hidden="true"></i><a href="localhost/bloodbank/organization/index"  <?php if (strpos($uri, '/organization/index')){ echo "class= \"active\" "; }?> >Home</a></li>
    <li><i class="fa fa-cogs" aria-hidden="true"></i><a href="localhost/bloodbank/organization/add-campaign" >Create Campaign</a></li>
 	<li><i class="fa fa-child" aria-hidden="true"></i><a href="localhost/bloodbank/organization/my-campaigns"  <?php if (strpos($uri, '/organization/my-campaigns')){ echo "class= \"active\" "; }?> >My Campaigns</a></li>
    <li><i class="fa fa-user" aria-hidden="true"></i><a href="localhost/bloodbank/organization/profile/index" <?php if (strpos($uri, '/organization/profile')){ echo "class= \"active\" "; }?> >Profile</a></li>
        </div>
    </form>
</div>