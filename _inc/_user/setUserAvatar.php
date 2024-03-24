<?php
require_once '../connect.php';

$userId = $_GET['userId'];
if ($userId) {
  try {
    $query = "SELECT avatar FROM users WHERE id = :userId";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $avatarBlob = $result['avatar'];

    header('Content-Type: image/png');
    header('Content-Length: ' . strlen($avatarBlob));
    echo $avatarBlob;

  } catch (Exception $e) {
    echo $e->getMessage();
  }
} else {
  echo "Empty AccessToken!";
}
