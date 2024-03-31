<?php

// $dbHost = '192.168.1.6';
// $dbHost = 'localhost';
$dbHost = 'localhost';
$dbName = 'Wave_messenger';
$dbUser = 'root';
$dbPass = 'root';

$URL = '192.168.1.4';

define('DB_DSN', "mysql:host=$dbHost;dbname=$dbName");
define('DB_USERNAME', $dbUser);
define('DB_PASSWORD', $dbPass);

try {
    $connect = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
