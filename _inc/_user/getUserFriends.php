<?php
require_once '../connect.php';

$jsonData = file_get_contents('php://input');
$requestData = json_decode($jsonData, true);

if (isset($requestData['userFriends']) && isset($requestData['currentUserId'])) {

    $userFriends = $requestData['userFriends'];
    $currentUserId = $requestData['currentUserId'];

    $friendsList = array();
    foreach ($userFriends as $friend) {
        $friendId = $friend['friendId'];

        $query = "SELECT id, username, email, firstName, lastName, phone FROM users WHERE id = :userId";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(':userId', $friendId);
        $stmt->execute();
        $friendData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $friendsList[] = $friendData;
    }

    header('Content-Type: application/json');
    echo json_encode($friendsList, JSON_PRETTY_PRINT);
} else {
    header('HTTP/1.1 400 Bad Request');
}
