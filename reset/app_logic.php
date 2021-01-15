<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

session_start();
$errors = [];
$user_id = "";
$type="";
require_once "../config.php";

if (isset($_SESSION['type'])) {
  $type = $_SESSION['type'];
}

/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['reset-password'])) {
  $email = mysqli_real_escape_string($link, $_POST['email']);
  // ensure that the user exists on our system
  if ($type=="donor") {
    $query = "SELECT email FROM donor WHERE email='$email'";
    $results = mysqli_query($link, $query);
  }elseif ($type=="requester") {
    $query = "SELECT Email FROM requestor WHERE Email='$email'";
    $results = mysqli_query($link, $query);
  }elseif ($type=="admin") {
    $query = "SELECT Email FROM blood_bank_admin WHERE Email='$email'";
    $results = mysqli_query($link, $query);
  }elseif ($type=="organization") {
    $query = "SELECT Email FROM organization WHERE Email='$email'";
    $results = mysqli_query($link, $query);
  }elseif ($type=="hospital") {
    $query = "SELECT Email FROM normal_hospital WHERE Email='$email'";
    $results = mysqli_query($link, $query);
  }else {
    $query = "SELECT Email FROM super_admin WHERE Email='$email'";
    $results = mysqli_query($link, $query);
  }
  

  if (empty($email)) {
    array_push($errors, "Your email is required");
  }else if(mysqli_num_rows($results) <= 0) {
    array_push($errors, "Sorry, no user exists on our system with that email");
  }
  // generate a unique random token of length 100
  $token = bin2hex(random_bytes(50));

  if (count($errors) == 0) {
    // store token in the password-reset database table against the user's email
    $sql= "SELECT * FROM password_resets WHERE email='$email'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) <= 0) {
      $sql = "INSERT INTO password_resets(email, token) VALUES ('$email', '$token')";
      $results = mysqli_query($link, $sql);
    }else{
      $sql = "UPDATE password_resets SET token='$token' WHERE email='$email'";
      $results = mysqli_query($link, $sql);
    }
    

    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = "Reset your password on Yuthukama - Blood Donation Management System";
    $msg = "Hi there, click on this <a href=\"localhost/bloodbank/reset/new_password.php?token=" . $token . "\">link</a> to reset your password on Yuthukama - Blood Donation Management System";
    $msg = wordwrap($msg,70);
    $headers = "From: Yuthukama - Blood Donation Management System";
    
    $mail = new PHPMailer;
    $mail->isSMTP(); 
//  $mail->SMTPDebug = 1; 
    $mail->Host = "ssl://smtp.gmail.com"; 
    $mail->Port = "465";
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "yuthukamabms@gmail.com";
    $mail->Password = "Yuthukama@123";
    $mail->setFrom("yuthukamabms@gmail.com", "Yuthukama - Blood Donation");
    $mail->addAddress($to, "send_to_Name");
    $mail->Subject = $subject;
    $mail->msgHTML($msg);
    $mail->AltBody = 'HTML not supported';
    
    $mail->send();
  }
}

// ENTER A NEW PASSWORD
if (isset($_POST['new_password'])) {
  $new_pass = mysqli_real_escape_string($link, $_POST['new_pass']);
  $new_pass_c = mysqli_real_escape_string($link, $_POST['new_pass_c']);

  // Grab to token that came from the email link
  $token = $_SESSION['token'];
  if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
  if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
  
  if (count($errors) == 0) {
    // select email address of user from the password_reset table 
    $sql = "SELECT email FROM password_resets WHERE token='$token' LIMIT 1";
    $results = mysqli_query($link, $sql);
    $email = mysqli_fetch_assoc($results)['email'];

    if ($email) {
      $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
      
      if ($type=="donor") {
        $sql = "UPDATE donor SET password='$new_pass' WHERE email='$email'";
        $results = mysqli_query($link, $sql);
      }elseif ($type=="requester") {
        $sql = "UPDATE requestor SET Password='$new_pass' WHERE Email='$email'";
        $results = mysqli_query($link, $sql);
      }elseif ($type=="admin") {
        $sql = "UPDATE bank_admin SET Password='$new_pass' WHERE Email='$email'";
        $results = mysqli_query($link, $sql);
      }elseif ($type=="organization") {
        $sql = "UPDATE organization SET Password='$new_pass' WHERE Email='$email'";
        $results = mysqli_query($link, $sql);
      }elseif ($type=="hospital") {
        $sql = "UPDATE normal_hospital SET Password='$new_pass' WHERE Email='$email'";
        $results = mysqli_query($link, $sql);
      }else {
        $sql = "UPDATE super_admin SET Password='$new_pass' WHERE Email='$email'";
        $results = mysqli_query($link, $sql);
      }
      
        header('location: ../reg_login.php?password=ok');
    }else{
      array_push($errors, "Sorry, token was expired. use the latest link");
      header("location: ../reg_login?token_expired=ok");
    }

  }
}
?>