<?php
    //session start
    require_once "../session.php";

    //variable declaration
    $hosname=$username=$drname=$dis=$add=$mobile=$mobile2=$email="";
    $username_err=$hos_err=$add_err=$dis_err=$drname_err=$mail_err=$mobile_err=$mobile2_err="";

    $data2=$_SESSION['id-5'];
    $temp_email=$_SESSION['temp_email'];
    //if (isset($_GET['cou'])) {$count=$_GET['cou'];}
    $sql5 = "SELECT  TelephoneNo FROM normal_hospital_telephone WHERE username = '$data2' ORDER BY Flag DESC";
    $result2 = mysqli_query($link, $sql5);
    $count= mysqli_num_rows($result2);

    $telephone= array();
    $telephone[1]="";
    $i=0;
    while ($rows=mysqli_fetch_assoc($result2)) {
    $telephone[$i]= $rows["TelephoneNo"];
    $i++;
    }

    $tel1= $telephone[0];
    $tel2= $telephone[1];



    if($_SERVER["REQUEST_METHOD"]=="POST")
    {   unset_cache();

        //validate username
        if (empty(trim($_POST["username"])))
        {
            $username_err="please enter the username";
            set_username_err($username_err);
        }
        elseif (trim($_POST["username"])=="$data2") {
            $username=trim(mysqli_real_escape_string($link,$_POST["username"]));
        }
        else{

            //prepare statment
            $sql1="SELECT UserName FROM normal_hospital WHERE UserName = ?";

            if($stmt=mysqli_prepare($link,$sql1))
            {

                mysqli_stmt_bind_param($stmt,"s",$para_username);
                //set parameters
                $para_username=trim($_POST["username"]);
                //execute the prepare statement
                if(mysqli_stmt_execute($stmt))
                {

                    //store the result
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt)==1)
                    {
                        $username_err="This user name is already taken";
                        set_username_err($username_err);

                    }
                    else
                    {
                        $username=trim(mysqli_real_escape_string($link,$_POST["username"]));
                        set_username($username);
                    }
                     mysqli_stmt_close($stmt);
                }
            }
            else{
                echo "Something went wrong. Please try again later.";

            }
        }

        // validate hospital name
        if(!empty(trim($_POST["hosname"])))
        {
            $hosname=trim(mysqli_real_escape_string($link,$_POST["hosname"]));
            set_hosname($hosname);
        }else{
            $hos_err= "Enter the Hospital Name";
            set_hosname_err($hos_err);
        }
        // validate address
        if(!empty(trim($_POST["address"])))
        {
            $add=trim(mysqli_real_escape_string($link,$_POST["address"]));
            set_address($add);
        }else{
            $add_err= "Enter the Address";
            set_address_err($add_err);
        }
        // validate District
        if(!empty(trim($_POST["district"])))
        {
            $dis=trim(mysqli_real_escape_string($link, $_POST["district"]));
            set_district($dis);
        }else{
            $dis_err= "Enter the District";
            set_district_err($dis_err);
        }
        // validate DrName
        if(!empty(trim($_POST["drname"])))
        {
            $drname=trim(mysqli_real_escape_string($link,$_POST["drname"]));
            set_doctor($drname);
        }else{
            $drname_err= "Enter the Doctor Name";
            set_doctor_err($drname_err);
        }

        // validate emailaddress
        if(empty(trim($_POST["email"])))
        {
            $mail_err="This email is already taken";
                        //call the session function
            set_email_err($mail_err);
        }
        elseif (trim($_POST["email"])=="$temp_email") {
            $mail=trim(mysqli_real_escape_string($link,$_POST["email"]));
        }
        else{
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
                        $mail_err="This email is already taken";
                        //call the session function
                        set_email_err($mail_err);
                    }
                    else{
                        $mail=trim(mysqli_real_escape_string($link,$_POST["email"]));
                        set_email($mail);
                    }
                }
                else{
                    echo "Something went wrong. Please try again later.";

                }

                //close the statement
                mysqli_stmt_close($stmt);
            }
        }
        //validate mobile number
        if(empty(trim($_POST["mobile"])))
        {
            $mobile_err="Please enter the telephone number";
            set_telephone_err($mobile_err);
        }elseif (strlen(trim($_POST['mobile']))!=10) {
            $mobile_err= "Telephone number must have 10 digits";
            set_telephone_err($mobile_err);
        }
        else{
            $mobile=trim(mysqli_real_escape_string($link, $_POST["mobile"]));
            set_telephone($mobile);
        }

        //$mobile2=trim($_POST["mobile2"]);
        if (!empty(trim($_POST['mobile2']))) {
            if (strlen(trim($_POST['mobile2'])) != 10) {
            $mobile2_err = "Telephone number must have 10 numbers";
            set_telephone2_err($mobile2_err);
            }else{
                $mobile2=trim(mysqli_real_escape_string($link, $_POST["mobile2"]));
                set_telephone2($mobile2);
            }
        }

        if(empty($username_err)&& empty($hos_err)&& empty($add_err)&& empty($dis_err)&& empty($drname_err)&&empty($mail_err)&&empty($mobile_err) && empty($mobile2_err))
        {

            //prepare update statement
            $sql="UPDATE normal_hospital SET UserName=?, Name=?, Address=?, District=?, Chief=?, Email=? WHERE UserName='$data2'";

            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"ssssss",$param_user,$param_name,$param_add,$param_dis,$param_dr,$param_email);
                //set parameters
                $param_user=$username;
                $param_name=$hosname;
                $param_add=$add;
                $param_dis=$dis;
                $param_dr=$drname;
                $param_email= $mail;

                //update session
                $_SESSION["id-5"]="$username";

                //execute prepare statement
                if(mysqli_stmt_execute($stmt))
                {
                    $sql1= "UPDATE normal_hospital_telephone SET username='$username', TelephoneNo='$mobile' WHERE username='$data2' AND TelephoneNo='$tel1'";
                    if (mysqli_query($link, $sql1)){
                      if ($count==2) {
                          $sql2= "UPDATE normal_hospital_telephone SET username='$username', TelephoneNo='$mobile2' WHERE username='$data2' AND TelephoneNo='$tel2'";
                          mysqli_query($link, $sql2 );
                      }
                      else{
                          $sql3= "INSERT INTO normal_hospital_telephone (username, TelephoneNo) VALUES ('$username','$mobile2')";
                          mysqli_query($link,$sql3);
                      }
                    }
                    else{
                        echo"something get wrong";
                    }



                    // Redirect to login page
                    unset_cache();

                    header("location: ../profile/index.php?update=ok");  //index?edit=ok
                }
                else{
                    echo"something get wrong";
                }
                //close prepare statement
                mysqli_stmt_close($stmt);
            }
            else
            {
                echo"somthing wrong";
            }
        }
        else
        {
            header("Location: ../profile/edit");
            /*header("Location: ../profile/edit?user=$username_err&hos=$hos_err&email=$mail_err&dname=$drname_err&dis=$dis_err&add=$add_err&mob=$mobile_err");*/
        }
         //close the db connection
        mysqli_close($link);
    }


?>
