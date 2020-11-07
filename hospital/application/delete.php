<?php
	require_once "../session.php";
    $data= $_SESSION["id-5"];
		
		//echo $nic; 
		$sql = "DELETE FROM normal_hospital WHERE UserName = ?";
        
		if($stmt = mysqli_prepare($link, $sql)){
			// Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt,"s",$data);
            
            // Set parameters
            //$param_username = $data;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
            	 header("location: ../logout.php?logout=1");
            }else{
                 $err=mysqli_stmt_errno($stmt);
            	 echo "Oops! Something went wrong. Please try again later.";
            }

		// Close statement
        mysqli_stmt_close($stmt);
		}


	// Close connection
    mysqli_close($link);

?>