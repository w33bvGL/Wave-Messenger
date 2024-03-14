<?php
require_once '../vendor/autoload.php';
require_once '../_back/connect.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\Http\HttpServer;

class MyWebSocket implements MessageComponentInterface
{
    protected $clients;
    protected $db;

    public function __construct()
    {
        $this->clients = [];
        // connect to database ! witch pdo exemplarovNI!!
        $this->db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $userId = $this->getUserIdFromConnectionParams($conn);

        if ($userId !== null) {
            $this->clients[$userId] = $conn;
            echo "wsClient connected: {$conn->resourceId} (User ID: {$userId})\n";
        } else {
            echo "not found user id\n";
        }
    }

    private function getUserIdFromConnectionParams(ConnectionInterface $conn)
    {
        $queryString = $conn->httpRequest->getUri()->getQuery();
        parse_str($queryString, $queryParams);
        $userId = $queryParams['regeduserid'] ?? null;
        return $userId;
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $data = json_decode($msg, true);
        $recipientId = $data['recipient'];
        $message = $data['message'];
        $chatId = $data['chatId'];
        $this->saveMessageToDatabase($from, $recipientId, $message, $chatId);
        $this->sendMessageToRecipient($from, $recipientId, $message);
    }

    private function saveMessageToDatabase(ConnectionInterface $from, $recipientId, $message, $chatId)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO messages (text, sender_id, receiver_id, chat_id, timestamp) VALUES (:text, :sender_id, :receiver_id, :chat_id, :timestamp)");
            $stmt->execute([
                ':text' => $message,
                ':sender_id' => $this->getUserIdFromConnectionParams($from),
                ':receiver_id' => $recipientId,
                ':chat_id' => $chatId,
                ':timestamp' => date('Y-m-d H:i:s')
            ]);
        } catch (PDOException $e) {
            echo "Error goto message to db: " . $e->getMessage() . "\n";
        }
    }

    private function sendMessageToRecipient(ConnectionInterface $from, $recipientId, $message)
    {
        if (isset($this->clients[$recipientId])) {
            $client = $this->clients[$recipientId];
            $client->send($message);
        } else {
            echo "Recipient with ID {$recipientId} not found\n";
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        foreach ($this->clients as $userId => $client) {
            if ($client === $conn) {
                unset($this->clients[$userId]);
                break;
            }
        }

        echo "Client disconnected: {$conn->resourceId}\n";
    }

    public function onError(ConnectionInterface $conn, Throwable $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new MyWebSocket()
        )
    ),
    9999
);

echo "WebSocket server started at ws://localhost:9999\n";

$server->run();
