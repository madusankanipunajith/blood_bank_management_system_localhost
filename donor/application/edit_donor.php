<?php
	require '../session.php';

	 // Define variables and initialize with empty values
    $nic_old=$nic =$first_name = $last_name  = $dob = $mobile2 = $addline1 = $addline2 = $mobile = $district = $email= $tel1= $tel2= $count="";
    $nic_err = $first_name_err = $last_name_err = $dob_err  = $addline_err  = $mobile_err = $district_err = $email_err="";
    $NIC=$firstname=$lastname=$addressline1=$addressline2="";

    $nic_old= $_SESSION["id-1"];
    if (isset($_GET['tel1'])) { $tel1= $_GET['tel1'];}
    if (isset($_GET['tel2'])) { $tel2= $_GET['tel2'];}
    if (isset($_GET['count'])) { $count= $_GET['count'];}


	// form submission editing
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // validate username
        if(empty(trim($_POST["nic"])))
        {
            $nic_err="Please enter the NIC";

        }elseif(trim($_POST["nic"])=="$nic_old"){
            $nic=trim($_POST["nic"]);
        }
        else
        {
            //prepare statement
            $sql="SELECT first_name FROM donor WHERE nic=?";
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
        if(empty(trim($_POST["first_name"])))
        {
            $first_name_err="Please enter a first name";
        }
        else{
            $first_name=trim($_POST["first_name"]);
        }
        //validate last name
        if(empty(trim($_POST["last_name"])))
        {
            $last_name_err="Please enter a last name";
        }
        else{
            $last_name=trim($_POST["last_name"]);
        }

        //validate location
        if(empty(trim($_POST["district"])))
        {
            $district_err="Please enter the District";
        }
        else{
            $district=trim($_POST["district"]);
        }

        //validate email
        if(empty(trim($_POST["email"])))
        {
            $email_err="Please enter the Email";
        }
        else{
            $email=trim($_POST["email"]);
        }
        
        //validate dob
        if(empty(trim($_POST["dob"])))
        {
            $dob_err="Please enter the DOB";
        }
        else{
            $dob=trim($_POST["dob"]);
        }
        //validate telephone number
        if(empty(trim($_POST["telephone-1"])))
        {
            $mobile_err="Please enter your Telephone number";
        }
        else{
            $mobile=trim($_POST["telephone-1"]);
        }
        //validate address
        if(empty(trim($_POST["addline1"])))
        {
            $addline_err="Please enter the Address";
        }
        else{
            $addline1=trim($_POST["addline1"]);
        }

        $addline2= $_POST["addline2"];
        $mobile2= $_POST["telephone-2"];

        if (empty($nic_err) && empty($dob_err) && empty($mobile_err) && empty($district_err) && empty($first_name_err) && empty($last_name_err) && empty($addline_err) && empty($email_err)) {
            $sql3="UPDATE donor SET nic='$nic', first_name='$first_name', last_name='$last_name', dob='$dob', district='$district', addressline1='$addline1', addressline2='$addline2', email='$email' WHERE nic='$nic_old' ";
            if ($result3=mysqli_query($link, $sql3)) {

                    $sql4= "UPDATE donor_telephone SET NIC='$nic',TelephoneNo='$mobile' WHERE NIC='$nic_old' AND TelephoneNo='$tel1' AND Flag='1'";
                    mysqli_query($link, $sql4);
                    if ($count==2){
                        $sql5= "UPDATE donor_telephone SET NIC='$nic',TelephoneNo='$mobile2' WHERE NIC='$nic_old' AND TelephoneNo='$tel2' AND Flag='0'";
                            mysqli_query($link, $sql5);
                        }
                        else{
                        $sql5= "INSERT INTO donor_telephone (NIC, TelephoneNo, Flag) VALUES ('$nic','$mobile2', '0')";
                            mysqli_query($link, $sql5);
                        }

                    $_SESSION["id-1"]= $nic;    

                        // Redirect to login page
                    header("location: ../profile/index?update=ok");

            }else{
                echo "error occured";
            }
        }else{
        	header("Location: ../profile/edit_donor?nics=$nic_err&first=$first_name_err&last=$last_name_err&dob=$dob_err&dis=$district_err&add=$addline_err&tel=$mobile_err&email=$email_err");
        }

// Close connection
mysqli_close($link);
}
?>