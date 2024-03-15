<?php
require_once '../connect.php';
require_once __DIR__ . '/../../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$accessToken = $_COOKIE['access_token'] ?? null;
$accessSecret = 'xQ@7Hv$3rLp*Ew#2NcG%m9F5sD8aZ^1R!4TbY6UjW&5tC^0g';
if ($accessToken) {
  try {
    $decodedAccessToken = JWT::decode($accessToken, new Key($accessSecret, 'HS256'));
    $userId = $decodedAccessToken->id;
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
  echo "Access token";
}
