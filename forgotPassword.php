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
      <div class="back-vector anul-trigger slide-right" onclick="window.location = 'signin.php'">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m15 19-7-7 7-7" />
        </svg>
        <p>Back</p>
      </div>
    </div>
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
    back heihgh size 38px
    1) 120 - 60 - 38 = 72px 
    */
  }

  #title-h1 {
    margin-bottom: 5px;
    line-height: 40px;
  }

  #title-span {
    font-size: 1.0709em;
    font-family: "wave-bold";
    color: var(--cl-2);
    /* MATMATIKAA
    font size = 14.95; 
    span font size need = 16px;
    1) 14.95 * 1.0709 = 16.01;
    */
  }

  form {
    margin-top: 50px;
    width: 100%;
    display: flex;
    flex-direction: column;
  }

  form button {
    margin-top: 15px;
  }
</style>
<script src="js/animator.js"></script>
<script src="js/validator.js"></script>
<script defer>
  document.addEventListener("DOMContentLoaded", () => {
    var valik = VALIK_START_INIT();
    ANULIK_START_INIT('page-fade-in_left');
    
    function VALIK_SKSI() {
      valik.validateEmail();
    }

    document.getElementById("email").addEventListener('input', () => {
      VALIK_SKSI();
    });
  });
</script>