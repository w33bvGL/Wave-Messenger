<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ATOM Wave - Create new password</title>
  <!-- styles -->
  <link rel="shortcut icon" href="assets/wave/icon.webp" type="image/x-icon">
  <link rel="stylesheet" href="src/_root/palette_light.css" id="themeStylesheet">
  <link rel="stylesheet" href="src/_root/root.css" />
  <link rel="stylesheet" href="src/_root/settings.css" />
</head>

<body>
  <div class="wrapper">
    <div class="back">
      <div class="back-vector anul-trigger slide-left" onclick="window.location = 'signin.php'">
        <i class="fa-solid fa-arrow-left-long"></i>
        <p>Back</p>
      </div>
    </div>
    <div class="title">
      <h1 id="title-h1">New password</h1>
      <span id="title-span">Please create a new password</span>
    </div>
    <form action="_inc/_login/updatePassword.php" method="POST">
      <div class="input-box">
        <label for="password">New password</label>
        <input type="password" placeholder="Enter new password" id="password" name="password" required autocomplete="off">
      </div>
      <div class="input-box" style="margin-bottom: 0px;">
        <label for="password-repeat">Repeat New password</label>
        <input type="password" placeholder="Repeat new password" id="password-repeat" name="repeatPassword" required autocomplete="off">
      </div>
      <input type="hidden" value='<?php echo $_SESSION['userId'] ?>' name="userId">
      <button type="submit" id="submitBtn" class="anul-trigger">Change password</button>
    </form>
  </div>
</body>

</html>
<style>
  .back {
    width: 100%;
  }

  .back-vector {
    display: flex;
    align-items: center;
    color: var(--cl-2);
    margin-top: 30px;
    cursor: pointer;
  }

  .back-vector i {
    font-size: var(--f-1em);
    padding-right: 10px;
  }

  .back-vector p {
    font-size: var(--f-1em);
    font-family: "wave-bold";
    /* MATMATIKAA
    font size = 14.95; 
    span font size need = 16px;
    1) 14.95 * 0.94 = 14.053;
    */
  }

  .title {
    /* margin-top: 72px; */
    margin-top: calc(100dvh - 95vh);
    /* MATMATIKAA
    back margin sise 60px
    back heihgh size 18px
    1) 120 - 60 - 18 = 42px 
    */
  }

  #title-h1 {
    margin-bottom: 5px;
  }

  #title-span {
    font-size: var(--f-1-1em);
    color: var(--cl-2);
    /* MATMATIKAA
    font size = 14.95; 
    span font size need = 16px;
    1) 14.95 * 1.0709 = 16.01;
    */
  }

  form {
    margin-top: 25px;
    width: 100%;
    display: flex;
    flex-direction: column;
  }

  form button {
    margin-top: 15px;
  }
</style>
<script src="https://kit.fontawesome.com/36abf4b57f.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js" integrity="sha512-aNMyYYxdIxIaot0Y1/PLuEu3eipGCmsEUBrUq+7aVyPGMFH8z0eTP0tkqAvv34fzN6z+201d3T8HPb1svWSKHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/validator.js"></script>
<script defer>
  document.addEventListener("DOMContentLoaded", function() {
    var valik = VALIK_START_INIT();

    function VALIK_SKSI() {
      valik.validatePassword();
      valik.validatePasswordRepeat();
    }

    document.getElementById("password").addEventListener('input', () => {
      VALIK_SKSI();
    });
    document.getElementById("password-repeat").addEventListener('input', () => {
      VALIK_SKSI();
    });
  });
</script>