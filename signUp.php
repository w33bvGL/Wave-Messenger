<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ATOM Wave - Sign up</title>
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
      <div class="back-vector anul-trigger slide-right" onclick="window.location = 'welcome.php'">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m15 19-7-7 7-7" />
        </svg>
        <p>Back</p>
      </div>
    </div>
    <div class="title">
      <h1 id="title-h1">Sign up</h1>
      <span id="title-span">Please create a new account</span>
    </div>
    <form action="_inc/signUp.php" method="POST">
      <div class="input-box">
        <label for="email">Email</label>
        <input type="email" placeholder="Enter your email" id="email" name="email" required autocomplete="off">
      </div>
      <div class="input-box">
        <label for="password">Password</label>
        <input type="password" placeholder="Enter your password" id="password" name="password" required
          autocomplete="off">
      </div>
      <div class="input-box" style="margin-bottom: 15px;">
        <label for="password-repeat">Repeat password</label>
        <input type="password" placeholder="Repeat password" id="password-repeat" name="password-repeat" required
          autocomplete="off">
      </div>
      <div class="input-box checkbox" style="margin-bottom: 0px;">
        <input type="checkbox" required id="accept">
        <label for="accept" id="accept-label">Agree the terms of use and privacy policy</label>
      </div>
      <button type="submit" id="submitBtn" class="anul-trigger">Sign up</button>
    </form>
    <div class="sign-in">
      <button>
        <img src="assets/images/socialMedia/google.png" alt="google">
        Sign up with Google
      </button>
      <button>
        <img src="assets/images/socialMedia/facebook.png" alt="facebook">
        Sign up with Facebook
      </button>
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
  }

  .back-vector svg {
    width: 18px;
    height: 18px;
    margin-right: 5px;
  }

  .back-vector p {
    font-size: var(--f-0-8em);
    font-family: "wave-bold";
    /* MATMATIKAA
    font size = 14.95; 
    span font size need = 16px;
    1) 14.95 * 0.94 = 14.053;
    */
  }

  .title {
    margin-top: 72px;
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

  #accept-label {
    margin: 0;
  }

  form {
    margin-top: 50px;
    width: 100%;
    display: flex;
    flex-direction: column;
  }

  form a {
    width: 100%;
    text-align: right;
    font-size: 0.94em;
    font-family: "wave-bold";
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
<script src="js/validator.js"></script>
<script src="js/animator.js"></script>
<script defer>
  document.addEventListener("DOMContentLoaded", function () {
    var valik = VALIK_START_INIT();
    ANULIK_START_INIT('page-fade-in_left');

    function VALIK_SKSI() {
      valik.validateEmail();
      valik.validatePassword();
      valik.validatePasswordRepeat();
    }

    document.getElementById("email").addEventListener('input', () => {
      VALIK_SKSI();
    });
    document.getElementById("password").addEventListener('input', () => {
      VALIK_SKSI();
    });
    document.getElementById("password-repeat").addEventListener('input', () => {
      VALIK_SKSI();
    });
  });
</script>