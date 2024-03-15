<?php
session_start();
require_once "./connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST["email"];
  $password = $_POST["password"];
  $location = "signUp.php";
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $query = "SELECT COUNT(1) as count from users WHERE email = :email";
  $stmt = $connect->prepare($query);
  $stmt->bindParam(':email', $email);
  $stmt->execute($checkDublicate);
  $checkDublicate = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($checkDublicate['count'] > 0) {
    session_destroy();
    session_start();
    $alertData = ["error" , "A user with this email address already exists"];
    $_SESSION['error'] = $alertData;
    header("Location: ../signUp.php");
  }

  $query = "INSERT INTO users (email, password) VALUES (:email, :password)";
  $stmt = $connect->prepare($query);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $hashedPassword);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $userId = $connect->lastInsertId();
    $_SESSION['userId'] = $userId;
    $_SESSION['location'] = $location;
    $_SESSION['email'] = $email;
    header("Location: ../enterCode.php");
  }
}


