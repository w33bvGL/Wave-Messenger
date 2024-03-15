<?php
session_start();

require_once "./connect.php";
require_once '_login/prepareUserSession.php';
require_once '_login/setUserInformaiton.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = $_POST["email"];
  $password = $_POST["password"];

  $query = "SELECT id, email, password FROM users WHERE email = :email";
  $stmt = $connect->prepare($query);
  $stmt->bindParam(":email", $username);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user && password_verify($password, $user['password'])) {
    $userId = $user['id'];
    $token = "54e01fc2675dcc";
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://ipinfo.io/?token={$token}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    $ipAddress = $data['ip'];

    $queryCheckIp = "SELECT COUNT(1) as count FROM usersInfo WHERE ipAddress = :ipAddress AND userId = :userId";
    $stmt = $connect->prepare($queryCheckIp);
    $stmt->bindParam(":ipAddress", $ipAddress);
    $stmt->bindParam(":userId", $userId);
    $stmt->execute();
    $ipInfo = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($ipInfo['count'] >= 1) {
      $_SESSION["wave"] = prepareUserSession($userId, $connect);
      header("Location: ../loading.php");
      exit();

    } else if ($ipInfo['count'] == 0) {
      $_SESSION['userId'] = $userId;
      $_SESSION['location'] = $location = "signIn.php";
      $_SESSION['email'] = $user['email'];
      header("Location: ../enterCode.php");
      exit();
    }
  } else {
    $alertData = ["error", "incorrect login or password"];
    $_SESSION['error'] = $alertData;
    header("Location: ../signIn.php");
    exit();
  }
}