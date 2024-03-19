<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
require_once '_inc/connect.php';
require_once '_inc/_loading/openJWT.php';
require_once '_inc/logout.php';
require_once '_inc/_loading/giveNewToken.php';

//isset($_COOKIE['access_token'])
if (isset($_SESSION['refresh_token'])) {
  $decodedTokens = openJWT($URL, $connect);
} else {
  // locout delete all cookies and session
  logout();
  header('location: welcome.php');
}

echo "<script defer>var userId = $decodedTokens->id;</script>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ATOM Wave - Messenger</title>
  <link rel="shortcut icon" href="assets/wave/icon.webp" type="image/x-icon">
  <link rel="stylesheet" href="src/_root/palette_light.css" id="themeStylesheet">
  <link rel="stylesheet" href="src/_root/root.css" />
  <link rel="stylesheet" href="src/_root/settings.css" />
  <!-- loading -->
  <link rel="stylesheet" href="src/components/loading/loading.css" />
  <!-- chat -->
  <link rel="stylesheet" href="src/components/recentChats/chatList.css" />
  <link rel="stylesheet" href="src/components/recentChats/createNewChat.css" />
  <link rel="stylesheet" href="src/components/recentChats/search.css">
  <link rel="stylesheet" href="src/components/recentChats/sortChat.css">
  <link rel="stylesheet" href="src/components/recentChats/story.css">
  <link rel="stylesheet" href="src/components/recentChats/messaging/messaging.css">
  <!-- profile -->
  <link rel="stylesheet" href="src/components/profile/myProfile.css">
  <link rel="stylesheet" href="src/components/profile/user.css">
  <link rel="stylesheet" href="src/components/profile/settings.css">
</head>

<body>
  <div class="index" id="index">
    <!-- loading Start -->
    <?php require_once "src/components/loading/loading.php"; ?>
    <!-- loading End -->
    <!-- canvas Start -->
    <?php require_once "src/canvas.php"; ?>
    <!-- canvas End -->
    <!-- menu Start -->
    <?php require_once "src/menu.php"; ?>
    <!-- menu End -->
  </div>
</body>
<script defer src="js/indexedDB.js"></script>
<script defer src="js/globalVariables.js"></script>
<script defer src="src/components/loading/loading.js"></script>
<script defer src="js/menuManager.js"></script>
<script defer src="js/canvasChatAnimator.js"></script>
<script defer src="js/canvasProfileAnimator.js"></script>
<script defer src="_inc/_wss/wsClient.js"></script>
<!-- chat -->
<script src="src/components/recentChats/search.js"></script>
<script src="src/components/recentChats/story.js"></script>
<script src="src/components/recentChats/sortChat.js"></script>
<script src="src/components/recentChats/createNewChat.js"></script>
<!-- profile -->
<script src="src/components/profile/user.js"></script>

<!-- dependecies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment-with-locales.min.js" integrity="sha512-4F1cxYdMiAW98oomSLaygEwmCnIP38pb4Kx70yQYqRwLVCs3DbRumfBq82T08g/4LJ/smbFGFpmeFlQgoDccgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- getUserFriendsList -->
<script src="js/getUserFriendsList/getNewMessageCount.js"></script>
<script src="js/getUserFriendsList/printUsersFromIndexedDb.js"></script>
<script src="js/getUserFriendsList/getUserInformation.js"></script>
<script src="js/getUserFriendsList/getUserFriendsList.js"></script>
<script src="js/getUserFriendsList/formatTimestamp.js"></script>
<!-- openChatBlockForSelectedUser -->
<script src="js/openChatBlockForSelectedUser/appendCurrentUserMessages.js"></script>
<script src="js/openChatBlockForSelectedUser/markCurrentUserMessagesAsRead.js"></script>
<script src="js/openChatBlockForSelectedUser/openChatBlockForSelectedUser.js"></script>
<script src="js/openChatBlockForSelectedUser/openCloseChatWindow.js"></script>
<script src="js/openChatBlockForSelectedUser/openCurrentUserMessages.js"></script>
<!-- sendMessageFromUser -->
<script src="js/sendMessageFromUser/addMessageFunction.js"></script>
<script src="js/sendMessageFromUser/saveMessageToIndexedDb.js"></script>
<script src="js/sendMessageFromUser/sendMessageFromUser.js"></script>
<!-- getMessagesFromMongo -->
<script src="js/getMessagesFromMongo/getMessagesFromMongo.js"></script>
<script src="js/getMessagesFromMongo/getLastMessageFromIndexedDb.js"></script>
<script src="js/getMessagesFromMongo/fetchMessageFromMongo.js"></script>
<script src="js/getMessagesFromMongo/processNewMessages.js"></script>
<!-- index -->
<script src="js/_index.js"></script>
</html>
<style>
  body {
    width: 100%;
    height: 100%;
    overflow: hidden;
    background-color: var(--cl-16);
  }

  .index {
    position: relative;
    width: 100%;
    height: 100%;
    overflow-y: scroll;
    overflow-x: hidden !important;
    scrollbar-width: none !important;
    scrollbar-color: transparent transparent !important;
  }
</style>
<script>
  /*
  active php ws server
  1) goto ws.php [ cd z:\OSpanel\domains\wave\_ws\ ]
  2) active ws.php [ php ws.php ]
  3) default loc and port ws://localhost:8080
  */
</script>