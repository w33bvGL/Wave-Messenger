<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once '../connect.php';
require_once __DIR__ . '/../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Predis\Client;

function generateCode()
{
    return sprintf("%04d", mt_rand(1000, 9999));
}

$code = generateCode();
$recipient = $_POST['recipient'];
$expiration = strtotime('+5 minutes');

$redis = new Client();
$redis->set($recipient . '_code', $code);
$redis->expireat($recipient . '_code', $expiration);

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'w33bv.gl@gmail.com';
    $mail->Password = 'vujo nbqr cczr etwk';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('w33bv.gl@gmail.com');
    $mail->addAddress($recipient);
    $mail->isHTML(true);

    $htmlFilePath = 'mailer.html';
    $htmlContent = file_get_contents($htmlFilePath);
    $htmlContentWithCode = str_replace('{{verification_code}}', $code, $htmlContent);

    $mail->Subject = 'Wave-Messenger Your verification code';
    $mail->Body = $htmlContentWithCode;
    $mail->send();
} catch (Exception $e) {
    echo '', $mail->ErrorInfo;
}
