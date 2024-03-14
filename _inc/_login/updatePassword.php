<?php
session_start();
require_once '../connect.php';

$userId = $_POST['userId'];
$password = $_POST['password'];
$hashedNewPassword = password_hash($password, PASSWORD_DEFAULT);

$query = "UPDATE users SET password = :password WHERE id = :userId";
$stmt = $connect->prepare($query);
$stmt->bindParam(":password", $hashedNewPassword);
$stmt->bindParam(":userId", $userId);
$stmt->execute();

session_destroy();
session_start();
$alertData = ["success", "Password changed successfully :)"];
$_SESSION['error'] = $alertData;
header('location: ../../signIn.php');
exit();