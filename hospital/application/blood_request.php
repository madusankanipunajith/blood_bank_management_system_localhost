<?php
    require "../session.php";
    //sessio id
    $nic = $_SESSION['id-5'];

    //$sender=$receiver=$data=$type=$amount="";
    //store today date
    $date= date("Y-m-d");

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
      $receiver = $nic;
      $amount = trim($_POST["volume"]);
      $type = trim($_POST["blood"]);
      $hospital= trim($_POST["hospital"]);

      //get hospital id of blood bank
      $sql = "SELECT HospitalID FROM blood_bank_hospital WHERE Name='$hospital'";
      //$sql ="SELECT `HospitalID` FROM blood_bank_hospital WHERE `Name`='Ganemulla Hospital'"
      $result = mysqli_query($link,$sql);
      $row= mysqli_fetch_assoc($result);
      echo $row["HospitalID"];

      if(!empty($amount) && !empty($type) && !empty($hospital))
      {
        //insert the Request
        $sql2 ="INSERT INTO blood_bank_request (SenderID, ReceiverID, Type, Amount ,Dates) VALUES (?, ?, ?, ?, ?)";
        //prepare PDOStatement
        if($stmt = mysqli_prepare($link,$sql2))

        {
          echo"**********";
          mysqli_stmt_bind_param($stmt,"issss",$param_sender,$param_receiver,$type,$amount,$data);

          //set parameters
          $param_sender=11 ;
          $param_receiver=$nic;
          echo"**********";
          //execute the HttpQueryString
          if(mysqli_stmt_execute($stmt))
          {
            header("location: ../search_hospital/hospital_result.php");
          }
          else {
            echo "something error";
          }

            mysqli_stmt_close($stmt);
        }


      }



        mysqli_close($link);
    }




?>
