<?php
function prepareUserSession($userId, $connect) {
  $id = $userId;
  $query = "SELECT id FROM users WHERE id = :id";
  $stmt = $connect->prepare($query);
  $stmt-> bindParam(":id", $id);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}