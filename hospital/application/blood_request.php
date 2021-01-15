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
<<<<<<< HEAD


      if(!empty($amount) && !empty($type) && !empty($hospital))
      {
        //insert the Request
        $sql2 ="INSERT INTO blood_bank_request (SenderID, ReceiverID, Type, Amount ,Dates) VALUES (?, ?, ?, ?, ?)";
=======
      //echo "$id";

      if(!empty($amount) && !empty($type) && !empty($hospital) && !empty($id))
      {
        //insert the Request
        $sql2 ="INSERT INTO normal_blood_request (SenderID, ReceiverID, Type, Amount ,Date) VALUES (?, ?, ?, ?, ?)";
>>>>>>> main
        //prepare PDOStatement
        if($stmt = mysqli_prepare($link,$sql2))

        {
<<<<<<< HEAD
          //bind parameters
          mysqli_stmt_bind_param($stmt,"issss",$param_sender,$param_receiver,$type,$amount,$data);

          //set parameters
          $param_sender=$hosid ;
=======

          mysqli_stmt_bind_param($stmt,"issss",$param_id,$param_receiver,$type,$amount,$date);

          //set parameters
          $param_id = $hosid; //CAST('$id' AS int);
>>>>>>> main
          $param_receiver=$nic;

          //execute the HttpQueryString
          if(mysqli_stmt_execute($stmt))
          {
<<<<<<< HEAD
            header("location: ../search_hospital/hospital_result.php?request=ok");
=======
            header("location: ../search_hospital/index.php?request=ok");
>>>>>>> main
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
