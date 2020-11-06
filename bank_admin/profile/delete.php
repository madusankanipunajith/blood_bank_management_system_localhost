<?php
	require "../session.php";
?>
<?php
	if (isset($_GET['nic'])) {
		$nic= $_GET['nic'];

		$sql = "DELETE FROM blood_bank_admin WHERE NIC = ?";

		if($stmt = mysqli_prepare($link, $sql)){
			// Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $nic;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
            	 header("location: ../logout.php?logout=1");
            }else{
            	 echo "Oops! Something went wrong. Please try again later.";
            }

		// Close statement
        mysqli_stmt_close($stmt);
		}
	}

	// Close connection
    mysqli_close($link);
?>