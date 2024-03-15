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

<!-- chat -->
<script src="src/components/recentChats/search.js"></script>
<script src="src/components/recentChats/story.js"></script>
<script src="src/components/recentChats/sortChat.js"></script>
<script src="src/components/recentChats/createNewChat.js"></script>
<script src="src/components/recentChats/messaging/messaging.js"></script>
<script src="src/components/recentChats/chatList.js"></script>
<!-- profile -->
<script src="src/components/profile/user.js"></script>
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