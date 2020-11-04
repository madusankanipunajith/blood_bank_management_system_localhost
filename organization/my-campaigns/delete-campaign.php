<?php
	require '../session.php';

	if (isset($_GET['index'])) {
		$index = $_GET['index'];

		$sql = "DELETE FROM campaign WHERE CampaignID='$index'";
		if (mysqli_query($link, $sql)) {
			// Redirect to details page
            header("location: details?del=ok");
		}else{
			echo "Something went wrong. Can't Delete";
		}
	}

// Close connection
mysqli_close($link);
?>