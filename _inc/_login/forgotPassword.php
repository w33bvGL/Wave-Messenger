<?php
session_start();

require_once '../connect.php';

  $email = $_POST['email'];
  $query = "SELECT id FROM users WHERE email = :email LIMIT 1";
  $stmt = $connect->prepare($query);
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  
  if($stmt->rowCount() > 0) {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $userId = $result['id'];
    $location = "forgotPassword.php";
    $_SESSION['userId'] = $userId;
    $_SESSION['location'] = $location;
    $_SESSION['email'] = $email;
    header("Location: ../../enterCode.php");
  } else {
    session_start();
    $alertData = ["error" , "There is no such user in the system"];
    $_SESSION['error'] = $alertData;
    header('location: ../../forgotPassword.php');
  }

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $userId = $_GET['pwoajdpowjawdjiwdo'];
  if ($userId == $_SESSION['userId']) {
    header("location: ../createNewPassword.php?pwoajdpowjawdjiwdo=$userId");
  } else {
    session_destroy();
    session_start();
    $alertData = ["warning" , "You can't do that :)"];
    $_SESSION['error'] = $alertData;
    header('location: ../welcome.html');
  }
}
