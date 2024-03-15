<?php
session_start();

if (isset($_SESSION['userId'])) {
  require_once 'connect.php';

  deleteUser($_SESSION['userId'], $connect);

  if ($_SESSION['location'] == "signUp.php") {
    header("location: ../signUp.php");
  }
}

function deleteUser($userId, $connect)
{
  $id = $userId;

  $query = "DELETE FROM users WHERE id = :userId";
  $stmt = $connect->prepare($query);

  $stmt->bindParam(":userId", $id);
  $stmt->execute();
  session_destroy();
}

