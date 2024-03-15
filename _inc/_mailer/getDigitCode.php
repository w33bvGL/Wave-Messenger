<?php
session_start();
require_once '../connect.php';

$email = $_SESSION['email'];
$code = $_GET['code'];
$location = $_SESSION['location'];

$query = "SELECT code, code_expiration FROM users WHERE email = :email";
$stmt = $connect->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result['code'] == $code) {
  $expiration_time = strtotime($result['code_expiration']);
  $current_time = time();
  if ($current_time < $expiration_time) {
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
    $alertData = ["error", "The code has expired, please try again!"];
    $_SESSION['error'] = $alertData;
    header('location: ../../enterCode.php');
  }
} else {
  $alertData = ["error", "Invalid code, please try again!"];
  $_SESSION['error'] = $alertData;
  header('location: ../../enterCode.php');
}
