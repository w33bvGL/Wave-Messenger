<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/../../vendor/autoload.php';
require_once '../connect.php';
require_once 'setUserInformaiton.php';
require_once 'prepareUserSession.php';

if (isset($_SESSION['userId'])) {
  $userId = $_SESSION['userId'];
  if (!empty($userId) && !empty($connect)) {
    setUserInformation($userId, $connect);
    $_SESSION["wave"] = prepareUserSession($userId, $connect);
    header("Location: ../../loading.php");
  } else {
    die("Error: Unable to set user information.");
  }
} else {
  session_destroy();
  session_start();
  $alertData = ["warning", "You can't do that :)"];
  $_SESSION['error'] = $alertData;
  header("Location: ../../welcome.php");
  exit();
}
?>
