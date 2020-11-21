<?php

    require_once "../../config.php";
    //define variables
    $hos_name=$address=$district=$chief_doctor=$user_name=$mobile=$password=$confirm_password=$mobile2=$data=$email="";
    $hos_err=$address_err=$district_err=$dr_err=$username_err=$mobile_err=$password_err=$confirm_password_err=$email_err="";
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
            $sql="SELECT UserName FROM normal_hospital WHERE UserName=?";
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
        if(empty(trim($_POST["password"])))
        {
            $password_err="Please enter password";
        }
        elseif(strlen(trim($_POST["password"])) < 6)
        {
            $password_err="Please enter valid password";
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
        //validate hospital name
        if(empty(trim($_POST["hosname"])))
        {
            $hos_err="Please enter the hospital name";
        }
        else{
            $hos_name=trim($_POST["hosname"]);
        }
        //validate hospital address
        if(empty(trim($_POST["address"])))
        {
            $address_err="Please enter your address";
        }
        else{
            $address=trim($_POST["address"]);
        }
        //validate district
        if(empty(trim($_POST["district"])))
        {
            $district_err="Please enter your district";
        }
        else{
            $district=trim($_POST["district"]);
        }
        //validate chief doctor name
        if(empty(trim($_POST["drname"])))
        {
            $dr_err="Please enter chief doctor name";
        }
        else{
            $chief_doctor=trim($_POST["drname"]);
        }
        //validate mobile number
        if(empty(trim($_POST["mobile"])))
        {
            $mobile_err="Please enter your Telephone number";
        }
        else{
            $mobile=trim($_POST["mobile"]);
        }
         $mobile2=trim($_POST['mobile2']);

         //validate email address
        if(empty(trim($_POST["email"])))
        {
            $email_err="Please enter your email address";
        }
        else
        {
            $email=trim($_POST["email"]);
        }
        //check the errors before inserting database
        if(empty($username_err)&& empty($password_err) && empty($confirm_password_err) && empty($district_err) && empty($mobile_err) && empty($dr_err) && empty($address_err) && empty($hos_err) && empty($email_err))
        {
            //prepare insert statemet
            $sql= "INSERT INTO normal_hospital ( UserName,Name, Address, District, Chief,Password,Email) VALUES(?, ?, ?, ?, ?, ?,?)";

            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"sssssss",$param_username,$hos_name,$address,$district,$chief_doctor,$param_password,$email);
                
                //set parameters
                $param_username=$user_name;
                $param_password=password_hash($password, PASSWORD_DEFAULT);

                
                //execute the prepare statement
                if(mysqli_stmt_execute($stmt))
                {
                    $sql1= "INSERT INTO normal_hospital_telephone (username, TelephoneNo, flag) VALUES ('$user_name', '$mobile', '1')";
                    if (mysqli_query($link, $sql1)){
                        if (!empty($mobile2)) {
                        $sql2= "INSERT INTO normal_hospital_telephone (username, TelephoneNo, flag) VALUES ('$user_name', '$mobile2', '0')";
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
            //insert mobile numbers

            
        }
        else
        {
            header("Location: ../signup?hos=$hos_err&add=$address_err&dis=$district_err&dr=$dr_err&user=$username_err&mobi=$mobile_err&pass=$password_err&compass=$confirm_password_err&mail=$email_err");
        }
        //close db connection
        mysqli_close($link); 
       
    }
	
?>