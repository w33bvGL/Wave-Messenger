<?php
require_once '../connect.php';

$userId = $_POST['userId'];
$username = $_POST['username'];

if ($userId && $username) {
    try {
        $query = "SELECT id FROM users WHERE username = :username";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $friendId = $user['id'];
            $query = "INSERT INTO usersFriends (userId, friendId) VALUES (:userId, :friendId)";
            $stmt = $connect->prepare($query);
            $stmt->bindParam(":userId", $userId);
            $stmt->bindParam(":friendId", $friendId);
            $stmt->execute();

            echo "Friend added successfully!";
            header("Location: ../../index.php"); 
            exit(); 
        } else {
            echo "User $username not found.";
            header("Location: ../../index.php");
            exit(); 
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: userId and username not provided.";
}
?>
