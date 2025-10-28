<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$title = "New message";
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$subject = "New Message";
$body = "Name: $name\nEmail: $email\nMessage:\n$message";

$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
  $mail->isSMTP();
  $mail->CharSet = "UTF-8";
  $mail->SMTPAuth   = true;

  $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
  $mail->Username   = 'abdullah@macromatrix.io';                     //SMTP username
  $mail->Password   = 'gavmI5bypmasnuvzur@';                               //SMTP password
  $mail->SMTPSecure = 'tls';
  $mail->Port       =  587 ;

  $mail->setFrom('no-reply@macromatrix.com', $title);
  $mail->addAddress('abdullah@macromatrix.io');
  $mail->isHTML(true);
  $mail->Subject = $title;
  $mail->Body = $body;

  $mail->send();
  http_response_code(200);
  echo "Message sent successfully!";
} catch (Exception $e) {
  http_response_code(500);
  echo "Failed to send the message. Try again";
}
