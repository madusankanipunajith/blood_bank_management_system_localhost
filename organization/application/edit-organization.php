<?php
    
require_once "../session.php";

    $nic = $_SESSION["id-4"];

    $sql2 = "SELECT  TelephoneNo FROM organization_telephone WHERE OrgId = '$nic' ORDER BY Flag DESC";
    $result2 = mysqli_query($link, $sql2);
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

    // form submission editing
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // validate username
        if(empty(trim($_POST["username"])))
        {
            $username_err="Please enter a user name";

        }elseif(trim($_POST["username"])=="$nic"){
            $user_name=trim($_POST["username"]);
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
        //validate mobile number
        if(empty(trim($_POST["mobile"])))
        {
            $mobile_err="Please enter your Telephone number";
        }
        else{
            $mobile=trim($_POST["mobile"]);
        }
        //validate mobile number
        if(empty(trim($_POST["email"])))
        {
            $email_err="Please enter your Email";
        }
        else{
            $email=trim($_POST["email"]);
        }

        $purpose= $_POST["purpose"];
        $mobile2= $_POST["mobile2"];

        if (empty($username_err)&& empty($org_err) && empty($district_err) && empty($mobile_err) && empty($president_err) && empty($email_err)) {
            $sql= "UPDATE organization SET OrganizationName=?, District=?, President=?, UserName=?, Purpose=?, Email=? WHERE UserName='$nic'";

            if($stmt=mysqli_prepare($link,$sql))
            {
                mysqli_stmt_bind_param($stmt,"ssssss",$org_name,$district,$president,$param_username,$purpose,$email);
                
                //set parameters
                $param_username=$user_name;

                //update session
                $_SESSION["id-4"]="$user_name";

                //execute the prepare statement
                if(mysqli_stmt_execute($stmt))
                {       $sql1= "UPDATE organization_telephone SET OrgID='$user_name', TelephoneNo='$mobile' WHERE OrgId='$nic' AND TelephoneNo='$tel1'";
                    if (mysqli_query($link, $sql1)){

                        if ($count==2) {
                            $sql2= "UPDATE organization_telephone SET OrgID='$user_name', TelephoneNo='$mobile2' WHERE OrgId='$nic' AND TelephoneNo='$tel2'";
                            mysqli_query($link, $sql2);
                        }else {
                            $sql3= "INSERT INTO organization_telephone (OrgId, TelephoneNo) VALUES ('$user_name','$mobile2')";
                            mysqli_query($link, $sql3);
                        }

                    }else{echo "Telephone1 errors";}
                    
                    // Redirect to login page
                    header("location: ../profile/index?update=ok");
                }
                else{
                    echo "Something went wrong, please try again later2";
                }
                //close statement
                mysqli_stmt_close($stmt);

            }
        }else{
            header("Location: ../profile/edit-organization?org=$org_err&user=$username_err&mob=$mobile_err&email=$email_err&pre=$president_err");
        }



        // Close connection
        mysqli_close($link);

    }




?>