<?php
    //session start
    require_once "../session.php";
    $count=$mobi1=$mobi2="";
    if($_SERVER['REQUEST_METHOD']=="GET")
    {
        if (isset($_GET['cou'])) {$count=$_GET['cou'];}
        if(isset($_GET['mobi1'])){$mobi1=$_GET['mobi1'];}
        if(isset($_GET['mobi2'])){$mobi2=$_GET['mobi2'];}
    }

    //variable declaration
    $hosname=$username=$drname=$dis=$add=$data2=$mobile=$mobile2=$mail="";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $data2=$_SESSION['id-5'];

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
                $error="This user name is already taken";
            }
            else
            {
                $username=trim($_POST["username"]);
            }
            mysqli_stmt_close($stmt);
        }
        }

        // validate hospital name
        if(!empty(trim($_POST["hosname"])))
        {
            $hosname=trim($_POST["hosname"]);
        }else{
            $hos_err= "Enter the Hospital Name";
        }
        // validate address
        if(!empty(trim($_POST["address"])))
        {
            $add=trim($_POST["address"]);
        }else{
            $add_err= "Enter the Address";
        }
        // validate District
        if(!empty(trim($_POST["district"])))
        {
            $dis=trim($_POST["district"]);
        }else{
            $dis_err= "Enter the District";
        }
        // validate DrName
        if(!empty(trim($_POST["drname"])))
        {
            $drname=trim($_POST["drname"]);
        }else{
            $drname_err= "Enter the Doctor Name";
        }
        // validate user name
        if(!empty(trim($_POST["username"])))
        {
            $username=trim($_POST["username"]);
        }else{
            $username_err= "Enter the User Name";
        }
        // validate emailaddress
        if(!empty(trim($_POST["email"])))
        {
            $mail=trim($_POST["email"]);
        }else{
            $mail_err= "Enter the Email address";
        }
        //validate mobile number
        if(empty(trim($_POST["mobile"])))
        {
            $mobile_err="Please enter the telephone number";
        }
        else{
            $mobile=trim($_POST["mobile"]);
        }
        $mobile2=trim($_POST["mobile2"]);

        if(empty($username_err)&& empty($hos_err)&& empty($add_err)&& empty($dis_err)&& empty($drname_err)&&empty($mail_err))
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

                //execute prepare statement
                if(mysqli_stmt_execute($stmt))
                {
                    $sql1= "UPDATE normal_hospital_telephone SET username='$username', TelephoneNo='$mobile' WHERE username='$data2' AND flag='1'";
                    if (mysqli_query($link, $sql1)){
                      if ($count==2) {
                          $sql2= "UPDATE normal_hospital_telephone SET username='$username', TelephoneNo='$mobile2' WHERE username='$data2' AND flag='0'";
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
                    $_SESSION["id-5"]="$username";
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

        }
         //close the db connection
        mysqli_close($link);
    }


?>
