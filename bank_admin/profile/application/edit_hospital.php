<?php
require '../../session.php';

$name_err=$district_err=$telephone_err=$telephone2_err="";
$name=$district=$tel1=$tel2=$count="";

$bankid= $_SESSION["id-3"];
if (isset($_GET['count'])) { $count= $_GET['count'];}

if($_SERVER["REQUEST_METHOD"] == "POST"){unset_cache();

	//validate name
        if(empty(trim($_POST["name"])))
        {
            $name_err="Please enter the hospital name";
            set_hosname_err($name_err);
        }
        else{
            $name=trim($_POST["name"]);
            set_hosname($name);
        }
        //validate last name
        if(empty(trim($_POST["district"])))
        {
            $district_err="Please enter the district";
            set_district_err($district_err);
        }
        else{
            $district=trim($_POST["district"]);
            set_district($district);
        }

        //validate location
        if(empty(trim($_POST["tel1"])))
        {
            $telephone_err="Please enter the telephone number";
            set_telephone_err($telephone_err);
        }elseif (strlen(trim($_POST["tel1"]))!=10) {
        	$telephone_err="Telephone number must have 10 digits";
            set_telephone_err($telephone_err);
        }
        else{
            $tel1=trim($_POST["tel1"]);
            set_telephone($tel1);
        }

        $tel2= trim($_POST['tel2']);
        if(!empty(trim($_POST["tel2"]))){
        	if (strlen(trim($_POST["tel2"]))!=10) {
        		$telephone2_err="Telephone number must have 10 digits";
                set_telephone2_err($telephone2_err);
        	}else{
                set_telephone2($tel2);
            }
        }

        if (empty($name_err) && empty($district_err) && empty($telephone_err) && empty($telephone2_err) ){

        	$sql="UPDATE blood_bank_hospital SET Name='$name', District='$district' WHERE HospitalID='$bankid' ";
        	if ($result= mysqli_query($link, $sql)) {
        		$sql2= "UPDATE blood_bank_hospital_telephone SET TelephoneNo='$tel1' WHERE BBID='$bankid' AND Flag='1'";
        		mysqli_query($link, $sql2);

        		if ($count==2){
                    $sql3= "UPDATE blood_bank_hospital_telephone SET TelephoneNo='$tel2' WHERE BBID='$bankid' AND Flag='0'";
                        mysqli_query($link, $sql3);
                    }else{
                    $sql3= "INSERT INTO blood_bank_hospital_telephone (BBID, TelephoneNo, Flag) VALUES ('$bankid','$tel2', '0')";
                        mysqli_query($link, $sql3);
                    }

                    // Redirect to login page
                    unset_cache();
                    header("location: ../edit_hospital?update=ok");

        	}else{
        		echo "error";
        	}

        }else{
        	header("Location: ../edit_hospital");
        }


}else{
	header("Location: ../index.php");
}


mysqli_close($link);
?>