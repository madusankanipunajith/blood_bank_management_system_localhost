<?php

    // require_once "../session.php";
        require_once "../../config.php";
    //define variables 
    $org_name=$district=$president=$user_name=$mobile=$mobile2=$password=$confirm_password=$purpose=$email="";
    $org_err=$district_err=$president_err=$username_err=$mobile_err=$mobile2_err=$password_err=$confirm_password_err=$email_err="";
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        // validate username
        if(empty(trim($_POST["username"])))
        {
            $username_err="Please enter a user name";
        }
        else
        {
            //prepare statement
            $sql="SELECT UserName FROM organization WHERE UserName=?";
            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"s",$param_username);
                //set parameter
                $param_username=trim($_POST["username"]);

                //execute the prepare ststement
                if(mysqli_stmt_execute($stmt))
                {
                    //store the result
                    mysqli_stmt_store_result($stmt);
                    //count no of rows
                  
                    if(mysqli_stmt_num_rows($stmt)==1)
                    {
                        $username_err="This user name is already taken";
                    }
                    else{
                        $user_name=trim($_POST["username"]);
                    }
                }
                else{
                    echo "Something went wrong. Please try again later.";

                }
                //close the statement
                mysqli_stmt_close($stmt);


                
            }
        }
        //validation of password 
        $pattern = ' ^.*(?=.{7,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$ ';
        if(empty(trim($_POST["password"])))
        {
            $password_err="Please enter password";
        }
        elseif(strlen(trim($_POST["password"])) < 8)
        {
            $password_err="Password must have atleast 8 characters.";
        }elseif(!preg_match($pattern,trim($_POST["password"]))){
            $password_err = "Password must contain at least a number, uppercase letter, lowercase letter and special character"; //verify($enter_password)
        }
        else{
            $password=trim($_POST["password"]);
        }
        //validation of confirm password
        if(empty(trim($_POST["confirm_password"])))
        {
            $confirm_password_err= "Please enter confirm password";
        }
        else
        {
            $confirm_password=trim($_POST["confirm_password"]);
            if(empty($password_err)&&($password!=$confirm_password))
            {
                $confirm_password_err="Password did not match";
            }
        }
        //validate organization name
        if(empty(trim($_POST["orgname"])))
        {
            $org_err="Please enter Organization name";
        }
        else{
            $org_name=trim($_POST["orgname"]);
        }
        //validate location
        if(empty(trim($_POST["location"])))
        {
            $district_err="Please enter the Location";
        }
        else{
            $district=trim($_POST["location"]);
        }
        
        //validate president name
        if(empty(trim($_POST["name"])))
        {
            $president_err="Please enter the President name";
        }
        else{
            $president=trim($_POST["name"]);
        }

         // Validate Email
        if(empty(trim($_POST["email"]))){
            $email_err = "Please enter your email";     
        } else{
            $email = trim($_POST["email"]);
        }

        //validate mobile number
        if(empty(trim($_POST["mobile"])))
        {
            $mobile_err="Please enter your Telephone number";
        }elseif(strlen(trim($_POST["mobile"])) != 10){
            $mobile_err = "telephone number must be 10 numbers";
        }else{
            $mobile=trim($_POST["mobile"]);
        }

        $purpose= $_POST["purpose"];
        $mobile2= $_POST["mobile2"];

        if (!empty(trim($_POST["mobile2"]))) {
        if (strlen(trim($_POST["mobile2"])) != 10) {
            $mobile2_err= "telephone number must be 10 numbers";
        }
    }
         
        //check the errors before inserting database
        if(empty($org_err) && empty($username_err)&& empty($password_err) && empty($confirm_password_err) && empty($mobile_err) && empty($president_err) && empty($email_err) && empty($district_err) && empty($mobile2_err))
        {
            //prepare insert statemet
            $sql= "INSERT INTO organization (OrganizationName, District, President, UserName, Password, Purpose, Email) VALUES(?, ?, ?, ?, ?, ?, ?)";

            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"sssssss",$org_name,$district,$president,$param_username,$param_password, $purpose, $email);
                
                //set parameters
                $param_username=$user_name;
                $param_password=password_hash($password, PASSWORD_DEFAULT);


                //execute the prepare statement
                if(mysqli_stmt_execute($stmt))
                {       $sql1= "INSERT INTO organization_telephone (OrgId, TelephoneNo, Flag) VALUES ('$user_name', '$mobile', '1')";
                    if (mysqli_query($link, $sql1)){
                        if (!empty($mobile2)) {
                        $sql2= "INSERT INTO organization_telephone (OrgId, TelephoneNo, Flag) VALUES ('$user_name', '$mobile2', '0')";
                        mysqli_query($link, $sql2);
                        }
                    }else{echo "Telephone1 errors";}
                    
                    // Redirect to login page
                    header("location: ../../reg_login.php?reg=ok");
                }
                else{
                    echo "Something went wrong, please try again later";
                }
                //close statement
                mysqli_stmt_close($stmt);

            }

        }else{
            header("Location: ../signup?org=$org_err&user=$username_err&pass=$password_err&conf=$confirm_password_err&mob=$mobile_err&mob2=$mobile2_err&email=$email_err&pre=$president_err&dis=$district_err&forgname=$org_name&fuser=$user_name&flocation=$district&fpresident=$president&femail=$email&ftel1=$mobile&ftel2=$mobile2&fpurpose=$purpose");
        }
        //close db connection
        mysqli_close($link); 
       
    }

	

?>