<?php
require_once __DIR__ . "/../other/errorReporting.php"; 
require_once __DIR__ . '/../../vendor/autoload.php';
require_once '../mongo.php';

$lastMessage = json_decode(file_get_contents('php://input'), true);
$userId = $lastMessage['userId'];
$lastTimestamp = $lastMessage['timestamp'];

$filter = [
    '$or' => [
        ['recipient' => $userId],
        ['sender' => $userId]
    ],
    'timestamp' => ['$gt' => $lastTimestamp]
];

$newMessagesCursor = $collectionChat_messages->find($filter);

$newMessages = iterator_to_array($newMessagesCursor);

header('Content-Type: application/json');
echo json_encode($newMessages);
?>
