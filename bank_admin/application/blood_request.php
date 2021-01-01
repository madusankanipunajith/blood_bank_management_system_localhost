<?php
    require "../session.php";
    //sessio id
    $nic = $_SESSION['id-3'];

    $sender=$receiver=$data=$type=$amount="";
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
      $default= 0;

      if(!empty($amount) && !empty($type) && !empty($hospital) && !empty($id))
      {
        //insert the Request
        $sql2 ="INSERT INTO blood_bank_request (ReceiverID, SenderID, Type, Amount ,Dates, Flag) VALUES (?, ?, ?, ?, ?, ?)";
        //prepare PDOStatement
        if($stmt = mysqli_prepare($link,$sql2))

        {

          mysqli_stmt_bind_param($stmt,"issssi",$param_id,$param_sender,$type,$amount,$date,$default);

          //set parameters
          $param_id = $hosid; //CAST('$id' AS int);
          $param_sender=$nic;

          //execute the HttpQueryString
          if(mysqli_stmt_execute($stmt))
          {
            header("location: ../search_blood/index.php?request=ok");
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
