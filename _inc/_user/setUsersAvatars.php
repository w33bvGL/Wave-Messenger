<?php
require_once '../connect.php';

if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    try {
        $query = "SELECT avatar FROM users WHERE id = :userId";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $avatarBlob = $result['avatar'];

            echo $avatarBlob;
        } else {
            echo "User not found!";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "userId is empty!";
}
