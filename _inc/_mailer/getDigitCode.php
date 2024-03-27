<?php
use Predis\Client;

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../redis.php';
require_once __DIR__ . '/../../vendor/autoload.php';

$email = $_SESSION['email'];
$code = $_GET['code'];
$location = $_SESSION['location'];

$redis = new Client();

if ($redis->exists($email . '_code')) {
  $storedCode = $redis->get($email . '_code');

  if ($storedCode == $code) {
    if ($location == "signUp.php") {
      header('location: ../../profileSetup.php');
    } elseif ($location == "signIn.php") {
      header('location: ../_login/addNewClient.php');
    } elseif ($location == "forgotPassword.php") {
      header('location: ../../updatePassword.php');
    } else {
      echo "location isset!";
    }
  } else {
    $alertData = ["error", "Invalid code, please try again!"];
    $_SESSION['error'] = $alertData;
    header('location: ../../enterCode.php');
  }
} else {
  $alertData = ["error", "The code has expired or is invalid, please try again!"];
  $_SESSION['error'] = $alertData;
  // stuc chi
  header('location: ../../enterCode.php');
}
