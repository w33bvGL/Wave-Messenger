<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ATOM Wave - Sign in</title>
  <link rel="shortcut icon" href="assets/wave/icon.webp" type="image/x-icon">
  <link rel="stylesheet" href="src/_root/palette_light.css" id="themeStylesheet">
  <link rel="stylesheet" href="src/_root/root.css" />
  <link rel="stylesheet" href="src/_root/settings.css" />
</head>

<body>
  <!-- successWarningError.php START-->
  <?php include_once 'src/components/other/successWarningError.php' ?>
  <!-- successWarningError.php END -->
  <div class="wrapper">
    <div class="back">
      <div class="back-vector anul-trigger slide-right" onclick="window.location = 'signIn.php'">
        <i class="fa-solid fa-arrow-left-long"></i>
        <p>Back</p>
      </div>
    </div>
    <div id="_wrapper-container" style="opacity: 0;">
      <div class="title">
        <h1 id="title-h1">Forgot<br>password?</h1>
        <span id="title-span">Enter your email for the verification process,<br>we will send code to your email</span>
      </div>
      <form action="_inc/_login/forgotPassword.php" method="POST">
        <div class="input-box" style="margin-bottom: 0px;">
          <label for="email">Email</label>
          <input type="email" placeholder="Enter your email" id="email" name="email" required autocomplete=off>
        </div>
        <button type="submit" id="submitBtn" class="anul-trigger slide-left">Continue</button>
      </form>
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
    line-height: 40px;
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
  document.addEventListener("DOMContentLoaded", () => {
    let firstInput = document.getElementById('email');
    firstInput.focus();

    anime({
      targets: "#_wrapper-container",
      opacity: 1,
      duration: 500,
      easing: "easeInOutExpo",
    });

    // init valik
    let valik = VALIK_START_INIT();

    function VALIK_SKSI() {
      valik.validateEmail();
    }

    document.getElementById("email").addEventListener('input', () => {
      VALIK_SKSI();
    });
  });
</script>