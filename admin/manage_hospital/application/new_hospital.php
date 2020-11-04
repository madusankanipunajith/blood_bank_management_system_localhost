<?php
    require '../../session.php';
    // Define variables and initialize with empty values
    $hosid=$name = $address= $telephone = $district = "";
    $name_err = $address_err = $telephone_err = $district_err = ""; 
 
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate username
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter the hospital name.";
    
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
                } else{
                    $temp = trim($_POST["name"]);
                    $name =  ucfirst($temp);
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
    } else{
        $district = trim($_POST["district"]);
    }

    // Validate address
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter district";     
    } else{
        $address = trim($_POST["address"]);
    }

    // Validate Telephone
    if(empty(trim($_POST["tel-1"]))){
        $telephone_err = "Please enter Telephone";     
    }elseif(strlen(trim($_POST["tel-1"])) != 10){
        $telephone_err = "telephone number must be 10 numbers";
    }else{
        $telephone = trim($_POST["tel-1"]);
    }

    $telephone2 = trim($_POST["tel-2"]);
    //isempty($name_err) && isempty($district_err) && isempty($address_err) && isempty($telephone_err)

    if (empty($name_err) && empty($district_err) && empty($address_err) && empty($telephone_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO blood_bank_hospital (Name, District, Address) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $district, $address);
            
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
                header("location: ../index.php?reg=ok");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }else{
        header("Location: ../new_hospital?name=$name_err&add=$address_err&dis=$district_err&tel=$telephone_err");
    }



         // Close connection
        mysqli_close($link);
    }
?>