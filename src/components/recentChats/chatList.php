<?php
$userId = $decodedTokens->id;
$query = "SELECT friendId FROM usersFriends WHERE userId = :userId";
$stmt = $connect->prepare($query);
$stmt->bindParam(':userId', $userId);
$stmt->execute();
$chatList = $stmt->fetchAll(PDO::FETCH_ASSOC);

// JSON
$friendsJsonData = json_encode($chatList, JSON_PRETTY_PRINT);

echo "<script> var friendsList = $friendsJsonData;</script>";
?>


<section class="canvas-chats" id="canvas-chats">
  <div class="chats" id="chats">

  </div>
</section>