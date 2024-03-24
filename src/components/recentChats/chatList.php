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
  <div class="canvas-chat-list-button-slide-users">
    <div class="slide-button"></div>
  </div>
  <div class="fa-user-chats-friends" id="fa-user-chats-friends">

  </div>
</section>