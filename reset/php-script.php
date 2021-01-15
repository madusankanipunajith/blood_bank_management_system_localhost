<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 2; 
$mail->Host = "ssl://smtp.gmail.com"; 
$mail->Port = "465"; // typically 587 
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = "yuthukamabms@gmail.com";
$mail->Password = "Yuthukama@123";
$mail->setFrom("yuthukamabms@gmail.com", "your_name");
$mail->addAddress("dphmalith@gmail.com", "send_to_Name");
$mail->Subject = 'Any_subject_of_your_choice';
$mail->msgHTML("test body"); // remove if you do not want to send HTML email
$mail->AltBody = 'HTML not supported';

$mail->send();
?>