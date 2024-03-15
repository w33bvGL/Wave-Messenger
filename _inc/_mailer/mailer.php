<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once '../connect.php';
require_once __DIR__ . '/../../vendor/autoload.php';

function generateCode()
{
  return sprintf("%04d", mt_rand(0, 9999));
}

$code = generateCode();
$recipient = $_POST['recipient'];
$expiration = date('Y-m-d H:i:s', strtotime('+2 minutes'));
$query = "UPDATE users SET code = :code, code_expiration = :expiration WHERE email = :email LIMIT 1";
$stmt = $connect->prepare($query);
$stmt->bindParam(":email", $recipient);
$stmt->bindParam(":code", $code);
$stmt->bindParam(":expiration", $expiration);
$stmt->execute();
$mail = new PHPMailer(true);

try {
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'w33bv.gl@gmail.com';
  $mail->Password = 'vujo nbqr cczr etwk';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  // tls 587, ssl 465

  $mail->setFrom('w33bv.gl@gmail.com');
  $mail->addAddress($recipient);

  $mail->isHTML(true);
  $mail->Subject = 'Your Verification Code';
  $mail->Body = 'Your verification code ' . $code;
  $mail->send();
} catch (Exception $e) {
  echo '', $mail->ErrorInfo;
}
