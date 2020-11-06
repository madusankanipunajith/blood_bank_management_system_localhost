<div class="dashboard-side">
    <div style="text-align: center; font-weight: bold; margin-top: 30px;">Dashboard</div><br>
    <form method="post">
    	<div class="contain">
    		<?php
        		$uri= $_SERVER['REQUEST_URI']; 
        	?>
    	<li><i class="fa fa-home" aria-hidden="true"></i><a href="https://himal.dev/bloodbank/requester/index" <?php if (strpos($uri, '/requester/index')){ echo "class= \"active\" "; }?> >Home</a></li>
    	<li><i class="fa fa-search" aria-hidden="true"></i><a href="https://himal.dev/bloodbank/requester/search_donor/index" <?php if (strpos($uri, '/requester/search_donor')){ echo "class= \"active\" "; }?> >Search Donor</a></li>
    	<li><i class="fa fa-credit-card" aria-hidden="true"></i><a href="https://himal.dev/bloodbank/requester/donations/index" <?php if (strpos($uri, '/requester/donations')){ echo "class= \"active\" "; }?>>Donations</a></li>
    	<li><i class="fa fa-user" aria-hidden="true"></i><a href="https://himal.dev/bloodbank/requester/profile/index" <?php if (strpos($uri, '/requester/profile')){ echo "class= \"active\" "; }?> >Profile</a></li>
    	</div>
    </form>
</div>