<?php
session_start();
require_once '../connect.php';
require_once 'setUserInformaiton.php';
require_once 'prepareUserSession.php';

if (isset($_SESSION['userId'])) {
  setUserInformation($_SESSION['userId'], $connect);
  $_SESSION["wave"] = prepareUserSession($userId, $connect);
  header("Location: ../../loading.php");
  exit();
} else {
  session_destroy();
  session_start();
  $alertData = ["warning", "You can't do that :)"];
  $_SESSION['error'] = $alertData;
  header("Location: ../../welcome.php");
  exit();
}


