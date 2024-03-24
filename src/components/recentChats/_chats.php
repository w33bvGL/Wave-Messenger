<main class="chats">
  <!-- search Start -->
  <?php include_once 'search.php'; ?>
  <!-- search End -->
  <!-- story container Start -->
  <?php include_once 'story.php'; ?>
  <!-- story container End -->
  <!-- chat Categories Start -->
  <?php include_once 'sortChat.php'; ?>
  <!-- chat Categories End -->
  <!-- chat list conatiner Start -->
  <?php include_once 'chatList.php'; ?>
  <!-- chat list container End -->
  <!-- create new chat Start -->
  <?php include_once 'createNewChat.php'; ?>
  <!-- create new chat End -->
  <!-- chatbox conatiner Start -->
  <?php include_once 'messaging/messaging.php'; ?>
  <!-- chatbox container End -->
  <!-- add new Chat Start -->
  <?php include_once 'newContact/newContact.php'?>
  <!-- add new Chat End -->
</main>

<style>
  .chats {
    width: 100%;
    height: 100dvh !important;
    background-color: var(--cl-16);
  }
</style>