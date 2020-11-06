<?php
	require_once "../session.php";
	$email_err=$nic_err=$firstname_err=$lastname_err="";
	$email=$firstname=$lastname=$nic="";

	$nics = $_SESSION["id_card3"];
	$nic = strtoupper($nics);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	// validate username
        if(empty(trim($_POST["nic"])))
        {
            $nic_err="Please enter a user name";

        }elseif(trim($_POST["nic"])=="$nic"){
            $nic=trim($_POST["nic"]);
        }
        else
        {
            //prepare statement
            $sql="SELECT NIC FROM blood_bank_admin WHERE NIC=?";
            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"s",$param_username);
                //set parameter
                $param_username=trim($_POST["nic"]);

                //execute the prepare ststement
                if(mysqli_stmt_execute($stmt))
                {
                    //store the result
                    mysqli_stmt_store_result($stmt);
                    //count no of rows
                  
                    if(mysqli_stmt_num_rows($stmt)==1)
                    {
                        $nic_err="This NIC is already taken";
                    }
                    else{
                        $nic=trim($_POST["nic"]);
                    }
                }
                else{
                    echo "Something went wrong. Please try again later.";

                }
                //close the statement
                mysqli_stmt_close($stmt);


                
            }
        }

        //validate first name
        if(empty(trim($_POST["firstname"])))
        {
            $firstname_err="Please enter the First name";
        }
        else{
            $firstname=trim($_POST["firstname"]);
        }
        //validate last name
        if(empty(trim($_POST["lastname"])))
        {
            $lastname_err="Please enter the Last Name";
        }
        else{
            $lastname=trim($_POST["lastname"]);
        }
        //validate last name
        if(empty(trim($_POST["email"])))
        {
            $email_err="Please enter the Email";
        }
        else{
            $email=trim($_POST["email"]);
        }

        if (empty($firstname_err)&& empty($lastname_err) && empty($nic_err) && empty($email_err)){
        	$sql="UPDATE blood_bank_admin SET NIC='$nic',FirstName='$firstname', LastName='$lastname', Email='$email' WHERE NIC= '$nics'";
        	if (mysqli_query($link, $sql)) {
        		$_SESSION["id_card3"]="$nic";
        		// Redirect to home page
            	header("location: ../profile/index?update=ok");
        	}else{
        		echo "Something went wrong";
        	}
        	
        }else{
        	header("Location: ../profile/edit_admin?first=$firstname_err&last=$lastname_err&nic=$nic_err&email=$email_err");
        }

    }

    // Close connection
    mysqli_close($link);
?>