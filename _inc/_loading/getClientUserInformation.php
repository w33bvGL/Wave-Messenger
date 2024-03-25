<?php
require_once '../connect.php';

$userId = $_POST['userId'];
$query = "SELECT id, username, email, firstName, lastName, phone  FROM users WHERE id = :userId";
$stmt = $connect->prepare($query);
$stmt->bindParam(':userId', $userId);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);
