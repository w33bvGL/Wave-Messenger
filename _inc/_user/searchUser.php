<?php
require_once '../connect.php';

$userId = $_GET['userId'];
$username = $_GET['username'];

// nafsyaki
if ($userId && $username) {
    try {
        $query = "SELECT id, username, email, firstName, lastName, phone FROM users WHERE username = :username OR email = :username OR phone = :username";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {

            echo json_encode(array($user));
        } else {
            // echo json_encode(array('error' => "User $username not found."));
            echo json_encode(null);
        }
    } catch (PDOException $e) {
        echo json_encode(array(null));
    }
} else {
    echo json_encode(array(null));
}
