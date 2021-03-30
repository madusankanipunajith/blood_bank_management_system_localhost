<?php
    require '../../session.php';
    // Define variables and initialize with empty values
    $hosid=$name = $address= $telephone = $district = $capacity="";
    $name_err = $address_err = $telephone_err = $telephone2_err = $district_err = $capacity_err=""; 
 
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate username
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter the hospital name.";
        set_hospital_err($name_err);
    }else{
        // Prepare a select statement
        $sql = "SELECT HospitalID FROM blood_bank_hospital WHERE Name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["name"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $name_err = "This hospital name is already taken.";
                    set_hospital_err($name_err);
                } else{
                    $temp = trim($_POST["name"]);
                    $name =  ucwords($temp);
                    set_hospital($name);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate District
    if(empty(trim($_POST["district"]))){
        $district_err = "Please enter district"; 
        set_district_err($district_err);    
    } else{
        $district = trim($_POST["district"]);
        set_district($district);
    }

    // Validate address
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter district";  
        set_address_err($address_err);   
    } else{
        $address = trim($_POST["address"]);
        set_address($address);
    }

    // Validate capacity
    if(empty(trim($_POST["capacity"]))){
        $capacity_err = "Please enter capacity";  
        set_cap_err($capacity_err);   
    } else{
        $capacity = trim($_POST["capacity"]);
        set_cap($capacity);
    }

    // Validate Telephone
    if(empty(trim($_POST["tel-1"]))){
        $telephone_err = "Please enter Telephone";  
        set_telephone_err($telephone_err);   
    }elseif(strlen(trim($_POST["tel-1"])) != 10){
        $telephone_err = "telephone number must be 10 numbers";
        set_telephone_err($telephone_err);
    }else{
        $telephone = trim($_POST["tel-1"]);
        set_telephone($telephone);
    }

    $telephone2 = trim($_POST["tel-2"]);
    set_telephone2($telephone2);
    if (!empty(trim($_POST["tel-2"]))) {
        if (strlen(trim($_POST["tel-2"])) != 10) {
            $telephone2_err= "telephone number must be 10 numbers";
            set_telephone2_err($telephone2_err);
        }
    }
    //isempty($name_err) && isempty($district_err) && isempty($address_err) && isempty($telephone_err)

    if (empty($name_err) && empty($district_err) && empty($address_err) && empty($telephone_err) && empty($capacity_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO blood_bank_hospital (Name, District, Address, Capacity) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $district, $address, $capacity);
            
            // Set parameters
            $param_username = $name;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){ 

                $sql2= "SELECT HospitalID FROM blood_bank_hospital WHERE Name='$name'";
                $result2 = mysqli_query($link, $sql2); while ($row=mysqli_fetch_assoc($result2)) {$hosid= $row["HospitalID"];}
                $row = mysqli_fetch_row($result2);$id=$row[0];
                $i=1;
                while ( $i<= 8) {
                    $sql3= "INSERT INTO blood_stock (StockID, BloodID) VALUES ('$hosid','$i')";
                    $result3 = mysqli_query($link, $sql3);
                    $i++;
                }

                $sql1= "INSERT INTO blood_bank_hospital_telephone (BBID, TelephoneNo, Flag) VALUES ('$hosid', '$telephone', '1')";
                    if (mysqli_query($link, $sql1)){
                        if (!empty($telephone2)) {
                        $sql2= "INSERT INTO blood_bank_hospital_telephone (BBID, TelephoneNo, Flag) VALUES ('$hosid', '$telephone2', '0')";
                        mysqli_query($link, $sql2);
                        }
                    }

                // Redirect to login page
                unset_cache();    
                header("location: ../index.php?reg=ok");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }else{
        /*header("Location: ../new_hospital?name=$name_err&add=$address_err&dis=$district_err&tel=$telephone_err&tel2=$telephone2_err&cap=$capacity_err&fname=$name&fdis=$district&fadd=$address&fcap=$capacity&ftel1=$telephone&ftel2=$telephone2");*/
        header("Location:../new_hospital");
    }



         // Close connection
        mysqli_close($link);
    }
?>