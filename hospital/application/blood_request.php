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
      $id = trim($_POST["id"]);
      $hosid = (int)$id;


      if(!empty($amount) && !empty($type) && !empty($hospital))
      {
        //insert the Request
        $sql2 ="INSERT INTO blood_bank_request (SenderID, ReceiverID, Type, Amount ,Dates) VALUES (?, ?, ?, ?, ?)";
        //prepare PDOStatement
        if($stmt = mysqli_prepare($link,$sql2))

        {
          //bind parameters
          mysqli_stmt_bind_param($stmt,"issss",$param_sender,$param_receiver,$type,$amount,$data);

          //set parameters
          $param_sender=$hosid ;
          $param_receiver=$nic;

          //execute the HttpQueryString
          if(mysqli_stmt_execute($stmt))
          {
            header("location: ../search_hospital/hospital_result.php?request=ok");
          }
          else {
            echo "something error";
          }

            mysqli_stmt_close($stmt);
        }


      }
      else {
        echo "something wrong";

      }



        mysqli_close($link);
    }




?>
