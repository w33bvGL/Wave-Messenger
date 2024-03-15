<?php
session_start();
require_once '_inc/connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ATOM Wave - Profile setup</title>
  <!-- styles -->
  <link rel="shortcut icon" href="assets/wave/icon.webp" type="image/x-icon">
  <link rel="stylesheet" href="src/_root/palette_light.css" id="themeStylesheet">
  <link rel="stylesheet" href="src/_root/root.css" />
  <link rel="stylesheet" href="src/_root/settings.css">
</head>

<body>
  <div class="wrapper">
    <div class="back">
      <div class="back-vector anul-trigger slide-right"
        onclick="window.location.href = '_inc/registrationCleanAndRedirect.php'">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m15 19-7-7 7-7" />
        </svg>
        <p>Back</p>
      </div>
    </div>
    <div class="title">
      <h1 id="title-h1">Profile setup</h1>
      <span id="title-span">hi, how do I contact you?</span>
    </div>
    <form action="_inc/profileSetup.php" method="POST" enctype="multipart/form-data">
      <div class="avatar">
        <input type="file" id="avatarInput" accept="image/*" style="display:none;" name="avatar" required>
        <label for="avatarInput" class="upload-button">
          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 12h14m-7 7V5" />
          </svg>
          <img id="avatarPreview" alt="Avatar Preview" style="display:none;">
        </label>
      </div>
      <div class="input-box">
        <label for="username">Username</label>
        <input type="text" placeholder="Enter your Username" id="username" name="username" required autocomplete="off">
      </div>
      <div class="input-box">
        <label for="tell">Phone number</label>
        <input type="text" placeholder="Enter your phone number" id="tell" name="tell" required autocomplete="off">
      </div>
      <div class="input-box">
        <label for="fname">First name</label>
        <input type="text" placeholder="Enter your first name" id="fname" name="fname" required autocomplete="off">
      </div>
      <div class="input-box" style="margin-bottom: 0px;">
        <label for="lname">Last name</label>
        <input type="text" placeholder="Enter your last name" id="lname" name="lname" required autocomplete="off">
      </div>
      <input type="hidden" name="userId" value="<?php echo $_SESSION['userId'] ?>">
      <button type="submit" id="submitBtn">Continue</button>
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
    align-items: center;
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
    width: 100%;
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

  .avatar {
    position: relative;
    width: 100px;
    height: 100px;
    background-color: var(--cl-12);
    border-radius: 30px;
    overflow: hidden;
    margin-bottom: 20px;
  }

  .avatar label svg {
    width: 35px;
    height: 35px;
  }

  .avatar label svg path {
    stroke: var(--cl-13);
  }

  .avatar .upload-button {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: transparent;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: background-color 0.2s;
  }

  #avatarPreview {
    position: absolute;
    width: 110px;
    height: 110px;
    object-fit: cover;
    object-position: center;
  }

  .avatar .upload-button:hover {
    background-color: rgba(0, 0, 0, 0.1);
  }

  .avatar .upload-button:focus {
    outline: none;
  }
</style>
<script src="js/validator.js"></script>
<script src="js/animator.js"></script>
<script defer>
  document.addEventListener("DOMContentLoaded", function () {
    var valik = VALIK_START_INIT();
    ANULIK_START_INIT('page-fade-in_left');

    function VALIK_SKSI() {
      valik.validateUsername();
      valik.validateTellNumber();
      valik.validateFirstName();
      valik.validateLastname();
    }

    document.getElementById("username").addEventListener('input', () => {
      VALIK_SKSI();
    });
    document.getElementById("tell").addEventListener('input', () => {
      VALIK_SKSI();
    });
    document.getElementById("fname").addEventListener('input', () => {
      VALIK_SKSI();
    });
    document.getElementById("lname").addEventListener('input', () => {
      VALIK_SKSI();
    });
  });

  const avatarInput = document.getElementById('avatarInput');
  const avatarPreview = document.getElementById('avatarPreview');

  avatarInput.addEventListener('change', function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
      avatarPreview.src = e.target.result;
      avatarPreview.style.display = 'block';
    }

    if (file) {
      reader.readAsDataURL(file);
    };
  });

</script>