<?php
	require '../../../config.php';
	$nic_err=$nic="";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty(trim($_POST['nic']))){

            
            $sql= "SELECT nic FROM donor WHERE nic=?";

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
                  
                    if(mysqli_stmt_num_rows($stmt)==0)
                    {
                        $nic_err="no account found";
                    }
                    else{
                        $nic=trim($_POST["nic"]);
                        header("location: ../accept_donor?nic=$nic");
                    }
                }
                else{
                    echo "Something went wrong. Please try again later.";

                }
                //close the statement
                mysqli_stmt_close($stmt);

            }

        }else{
            $nic_err="enter nic";
        }

        if (!empty($nic_err)) {
        	header("Location: ../select_donor?err=$nic_err");
        }

    }else{
    	header("Location: ../../../reg_login.php");
    }

// Close connection
mysqli_close($link);


?>