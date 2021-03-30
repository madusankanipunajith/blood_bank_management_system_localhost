<?php
    session_start();
    require '../cache.php';
    require_once "../../config.php";
    //define variables
    $hos_name=$address=$district=$chief_doctor=$user_name=$mobile=$password=$confirm_password=$mobile2=$data=$email="";
    $hos_err=$address_err=$district_err=$dr_err=$username_err=$mobile_err=$password_err=$confirm_password_err=$email_err="";
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        //remove all the saved cache
         unset_cache();
        // validate username
        if(empty(trim($_POST["username"])))
        {
            $username_err="Please enter a user name";
            set_username_err($username_err);
        }
        else
        {
            //prepare statement
            $sql="SELECT UserName FROM normal_hospital WHERE UserName=? AND Del=0";
            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"s",$param_username);
                //set parameter
                $param_username=trim(mysqli_real_escape_string($link,$_POST["username"]));

                //execute the prepare ststement
                if(mysqli_stmt_execute($stmt))
                {
                    //store the result
                    mysqli_stmt_store_result($stmt);
                    //count no of rows

                    if(mysqli_stmt_num_rows($stmt)==1)
                    {
                        $username_err="This user name is already taken";
                        //call the session function
                        set_username_err($username_err);
                    }
                    else{
                        $user_name=trim(mysqli_real_escape_string($link,$_POST["username"]));
                        set_username($user_name);
                    }
                }
                else{
                    echo "Something went wrong. Please try again later.";

                }
                //close the statement
                mysqli_stmt_close($stmt);



            }
        }

        if (isset($_SESSION['password_pattern'])) {
            $pattern= $_SESSION['password_pattern'];
        }

         //validation of password
        if(empty(trim($_POST["password"])))
        {
            $password_err="Please enter password";
            set_new_password_err($password_err);
        }
        elseif(strlen(trim($_POST["password"])) < 8)
        {
            $password_err="Password must have at least 8 characters";
            set_new_password_err($password_err);
        }
        elseif(!preg_match_all($pattern,trim($_POST["password"])))
        {
           $password_err = "Password must contain at least a number, uppercase letter, lowercase letter and special character"; //verify($enter_password)
           set_new_password_err($password_err);
        }
        else{
            $password=trim(mysqli_real_escape_string($link, $_POST["password"]));
            set_new_password($password);
        }
        //function

        //validation of confirm password
        if(empty(trim($_POST["confirm_password"])))
        {
            $confirm_password_err= "Please enter confirm password";
            set_confirm_password_err($confirm_password_err);
        }
        else
        {
            $confirm_password=trim(mysqli_real_escape_string($link,$_POST["confirm_password"]));
            if(empty($password_err)&&($password!=$confirm_password))
            {
                $confirm_password_err="Password did not match";
                set_confirm_password_err($confirm_password_err);
            }else{
                //$confirm_password=trim(mysqli_real_escape_string($link,$_POST["confirm_password"]));
                set_confirm_password($confirm_password);
            }
        }
        //validate hospital name
        if(empty(trim($_POST["hosname"])))
        {
            $hos_err="Please enter the hospital name";
            set_hosname_err($hos_err);
        }
        else{
            $hos_name=trim(mysqli_real_escape_string($link,$_POST["hosname"]));
            set_hosname($hos_name);
        }
        //validate hospital address
        if(empty(trim($_POST["address"])))
        {
            $address_err="Please enter your address";
            set_address_err($address_err);
        }
        else{
            $address=trim(mysqli_real_escape_string($link,$_POST["address"]));
            set_address($address);
        }
        //validate district
        if(empty(trim($_POST["district"])))
        {
            $district_err="Please enter your district";
            set_district_err($district_err);
        }
        else{
            $district=trim(mysqli_real_escape_string($link,$_POST["district"]));
            set_district($district);
        }
        //validate chief doctor name
        if(empty(trim($_POST["drname"])))
        {
            $dr_err="Please enter chief doctor name";
            set_doctor_err($dr_err);
        }
        else{
            $chief_doctor=trim(mysqli_real_escape_string($link,$_POST["drname"]));
            set_doctor($chief_doctor);
        }
        //validate mobile number
        if(empty(trim($_POST["mobile"])))
        {
            $mobile_err="Please enter your Telephone number";
            set_telephone_err($mobile_err);
        }elseif (strlen(trim($_POST["mobile"])) != 10) {
             $mobile_err = "telephone number must contain 10 digits";
             set_telephone_err($mobile_err);
        }
        else{
            $mobile=trim(mysqli_real_escape_string($link,$_POST["mobile"]));
            set_telephone($mobile);
        }

        //$mobile2=trim($_POST['mobile2']);
        //validate mobile2 number
        if (!empty(trim($_POST["mobile2"]))) {
            if (strlen(trim($_POST["mobile2"])) != 10)
            {
            $mobile2_err= "telephone number must be 10 numbers";
            set_telephone2_err($mobile2_err);
            }
            else{
                $mobile2=trim(mysqli_real_escape_string($link,$_POST["mobile2"]));
                set_telephone2($mobile2);
            }
        }


         //validate email address
        if(empty(trim($_POST["email"])))
        {
            $email_err="Please enter your email address";
            set_email_err($email_err);
        }
        else
        {
            $sql3="SELECT Email FROM normal_hospital WHERE Email=?";
            if($stmt=mysqli_prepare($link,$sql3))
            {
                mysqli_stmt_bind_param($stmt,"s",$param_email);
                //set parameter
                $param_email=trim(mysqli_real_escape_string($link,$_POST["email"]));

                //execute the prepare ststement
                if(mysqli_stmt_execute($stmt))
                {
                    //store the result
                    mysqli_stmt_store_result($stmt);
                    //count no of rows

                    if(mysqli_stmt_num_rows($stmt)==1)
                    {
                        $username_err="This email is already taken";
                        //call the session function
                        set_email_err($username_err);
                    }
                    else{
                        $email=trim(mysqli_real_escape_string($link,$_POST["email"]));
                        set_email($email);
                    }
                }
                else{
                    echo "Something went wrong. Please try again later.";

                }

                //close the statement
                mysqli_stmt_close($stmt);

            }

        }
        $del=0;
        //check the errors before inserting database
        if(empty($username_err)&& empty($password_err) && empty($confirm_password_err) && empty($district_err) && empty($mobile_err) && empty($mobile2_err) && empty($dr_err) && empty($address_err) && empty($hos_err) && empty($email_err))
        {
            //prepare insert statemet
            $sql= "INSERT INTO normal_hospital ( UserName,Name, Address, District, Chief,Password,Email) VALUES(?, ?, ?, ?, ?, ?, ?)";

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

                    //remove the all saved cached
                    unset_cache();
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
            header("Location: ../signup");
            //header("Location: ../signup?hos=$hos_err&add=$address_err&dis=$district_err&dr=$dr_err&user=$username_err&mobi=$mobile_err&mobi2=$mobile2_err&pass=$password_err&compass=$confirm_password_err&mail=$email_err&fhos=$hos_name&fdistrict=$district&fadd=$address&fuser=$user_name&femail=$email&fdoc=$chief_doctor&ftel1=$mobile&ftel2=$mobile2");
        }
        //close db connection
        mysqli_close($link);

    }

?>
