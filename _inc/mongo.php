<?php
require_once __DIR__ . "/other/errorReporting.php"; 
require_once __DIR__ . '/../vendor/autoload.php';

use MongoDB\Client;

try {
    $mongoClient = new Client("mongodb://localhost:27017");
    $collectionChat_messages = $mongoClient->Wave_messenger->chat_messages;
    
    // menak debug i vaxt :) 
    // echo "connected successfuly!!!";
} catch (Throwable $e) {
    echo "Error to Connect MongoDB => " . $e->getMessage();
}

