<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>


<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master\src\Exception.php';
require 'PHPMailer-master\src\PHPMailer.php';
require 'PHPMailer-master\src\SMTP.php';

echo "IMPORTS OK";

$message = $_POST['message'];
$address = $_POST['address'];
$title = $_POST['title'];

session_start();

echo $message . "message // address:".$address;


//echo    phpinfo();

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;  // was 4 for debug
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "mocktlevels@shipley.ac.uk";
$mail->Password   = "ship_Ley862";

$mail->IsHTML(true);
$mail->AddAddress("$address", " ");
$mail->SetFrom("mocktlevels@shipley.ac.uk", "Mock T Levels");
$mail->AddReplyTo("mocktlevels@shipley.ac.uk", "Haris");
// $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
$mail->Subject = "$title";
$content = " $message ";

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  $status="error occured when sending Email";
  var_dump($mail);
} else {
  echo "Email sent successfully";
  $status="Email sent";
}

//echo "All done";

$_SESSION["email_status?"]=$status;
header("Location: email.php");

?>

