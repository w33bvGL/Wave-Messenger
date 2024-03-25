<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
session_destroy();

require_once 'connect.php';
require_once '_login/prepareUserSession.php';
require_once '_login/setUserInformaiton.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $avatarData = file_get_contents($_FILES['avatar']['tmp_name']);
  $userId = $_POST["userId"];
  $tell = $_POST["tell"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $username = $_POST["username"];
  $query = "UPDATE users SET avatar = :avatar, username = :username, phone = :phone, firstName = :firstName, lastName = :lastName WHERE id = :userId";
  $stmt = $connect->prepare($query);
  $stmt->bindParam(':userId', $userId);
  $stmt->bindParam(':avatar', $avatarData, PDO::PARAM_LOB);
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':phone', $tell);
  $stmt->bindParam(':firstName', $fname);
  $stmt->bindParam(':lastName', $lname);
  $stmt->execute();

  setUserInformation($userId, $connect);
  session_start();
  $_SESSION["wave"] = prepareUserSession($userId, $connect);
  header("location: ../loading.php");
  exit();
} else {
  $alertData = ["warning", "You can't do that :)"];
  $_SESSION['error'] = $alertData;
  header("Location: ../welcome.php");
}
?>
