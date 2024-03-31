<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ATOM Wave - Sign in</title>
  <!-- styles -->
  <link rel="shortcut icon" href="assets/wave/icon.webp" type="image/x-icon">
  <link rel="stylesheet" href="src/_root/palette_light.css" id="themeStylesheet">
  <link rel="stylesheet" href="src/_root/root.css" />
  <link rel="stylesheet" href="src/_root/settings.css">
</head>

<body>
  <!-- successWarningError.php START-->
  <?php include_once 'src/components/other/successWarningError.php' ?>
  <!-- successWarningError.php END -->
  <div class="wrapper">
    <div class="back">
      <div class="back-vector" onclick="window.location = 'welcome.php'">
        <i class="fa-solid fa-arrow-left-long"></i>
        <p>Back</p>
      </div>
    </div>
    <div id="_wrapper-container" style="opacity: 0;">
      <div class="title">
        <h1 id="title-h1">Sign in</h1>
        <span id="title-span">Please log in into your account</span>
      </div>
      <form action="_inc/signIn.php" method="POST">
        <div class="input-box">
          <label for="email">Email</label>
          <input type="email" placeholder="Enter your email" id="email" name="email" required autocomplete="username">
        </div>
        <div class="input-box" style="margin-bottom: 15px;">
          <label for="password">Password</label>
          <input type="password" placeholder="Enter your password" id="password" name="password" required autocomplete="current-password">
        </div>
        <a href="forgotPassword.php" class="anul-trigger slide-left">Forgot password?</a>
        <button type="submit">Sign in</button>
      </form>
      <!-- <div class="sign-in">
      <button>
        <img src="assets/images/socialMedia/google.png" alt="google">
        Sign in with Google
      </button>
      <button>
        <img src="assets/images/socialMedia/facebook.png" alt="facebook">
        Sign in with Facebook
      </button>
    </div> -->
    </div>
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

  form a {
    align-self: flex-end;
    text-align: right;
    font-size: var(--f-0-9em);
    color: var(--cl-10);
    /* MATMATIKAA
    font size = 14.95; 
    span font size need = 16px;
    1) 14.95 * 0.94 = 14.053;
    */
  }

  form button {
    margin-top: 15px;
  }

  .sign-in {
    width: 100%;
    margin-top: 50px;
    display: flex;
    flex-direction: column;
  }

  .sign-in button {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: transparent;
    color: var(--cl-1);
    border: 1px solid var(--cl-1);
    margin-bottom: 20px;
    font-family: "wave";
  }

  .sign-in button img {
    width: 16px;
    height: 16px;
    margin-right: 10px;
  }
</style>
<script src="https://kit.fontawesome.com/36abf4b57f.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js" integrity="sha512-aNMyYYxdIxIaot0Y1/PLuEu3eipGCmsEUBrUq+7aVyPGMFH8z0eTP0tkqAvv34fzN6z+201d3T8HPb1svWSKHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script defer>
  document.addEventListener("DOMContentLoaded", () => {
    let firstInput = document.getElementById('email');
    firstInput.focus();
    anime({
      targets: "#_wrapper-container",
      opacity: 1,
      duration: 500,
      easing: "easeInOutExpo",
    });
  });
</script>