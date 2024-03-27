<?php
session_start();
require_once '_inc/connect.php';
require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ATOM Wave - enter Code</title>
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
    <div class="form">
      <p id="title">Enter 4 digit code</p>
      <p id="description">A four-digit code should have come to your<br>email address that you indicated.</p>
      <div class="input-box">
        <input type="number" id="digit1" name="digit1" min="0" max="9" required oninput="moveToNextInput(this, 'digit2', null, 1, event)" onkeydown="handleBackspace(this, event)">
        <input type="number" id="digit2" name="digit2" min="0" max="9" required oninput="moveToNextInput(this, 'digit3', 'digit1', 1, event)" onkeydown="handleBackspace(this, event)">
        <input type="number" id="digit3" name="digit3" min="0" max="9" required oninput="moveToNextInput(this, 'digit4', 'digit2', 1, event)" onkeydown="handleBackspace(this, event)">
        <input type="number" id="digit4" name="digit4" min="0" max="9" required oninput="moveToNextInput(this, 'digit4', 'digit3', 1, event)" onkeydown="handleBackspace(this, event)">
      </div>
      <div class="buttons">
        <button type="submit" id="submitBtn" class="anul-trigger slide-left">Confirm</button>
        <button id="cancel" class="anul-trigger slide-left" type="button" onclick="if('<?php echo $_SESSION['location'] ?>' == 'signUp.php'){
          window.location.href ='_inc/registrationCleanAndRedirect.php';
        } else if('<?php echo $_SESSION['location'] ?>' == 'forgotPassword.php'){
          window.location.href ='forgotPassword.php';
        } else if('<?php echo $_SESSION['location'] ?>' == 'signIn.php'){
          window.location.href ='signIn.php';
        }">Cancel</button>
      </div>
      </div>
  </div>
</body>
</html>
<style>
  #title {
    font-size: var(--f-1-2em);
    font-family: "wave-bold";
    color: var(--cl-2);
    margin-bottom: 10px;
    /* MATMATIKAA
    font size = 14.95; 
    span font size need = 18px;
    1) 14.95 * 1.205 = 18.0147;
    */
  }

  #description {
    font-size: var(--f-0-9em);
    color: var(--cl-2);
    margin-bottom: 25px;
    /* MATMATIKAA
    font size = 14.95; 
    p font size need = 14px;
    1) 14.95 * 0.94em = 14.053;
    */
  }

  .form {
    margin-top: 200px;
    width: 100%;
    display: flex;
    flex-direction: column;
    background-color: var(--cl-3);
    border: 1px solid var(--cl-11);
    padding: 20px;
    margin-bottom: 50px;
    border-radius: 8px;
    -webkit-box-shadow: 0px 9px 15px 5px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0px 9px 15px 5px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 9px 15px 5px rgba(0, 0, 0, 0.1);
  }

  .form .input-box {
    flex-direction: row;
    justify-content: space-between;
  }

  .form .input-box input {
    width: 46px;
    height: 55px;
    font-size: var(--f-1-9em);
    font-weight: bolder;
  }

  .buttons {
    display: flex;
    gap: 15px;
    justify-content: space-between;
    margin-bottom: 25px;
  }

  .form button {
    width: 50%;
  }

  #cancel {
    background-color: var(--cl-3);
    border: 2px solid var(--cl-1);
    color: var(--cl-1);
  }
</style>
<script src="js/animator.js"></script>
<script defer>
  const recipient = "<?php echo $_SESSION['email'] ?>";

  const data = new URLSearchParams();
  data.append('recipient', recipient);

  const options = {
    method: 'POST',
    body: data
  };

  fetch('_inc/_mailer/mailer.php', options)
    .catch(error => console.error('error:', error));

  document.addEventListener("DOMContentLoaded", () => {
    ANULIK_START_INIT('page-fade-in_left');

    let firstInput = document.getElementById('digit1');
    firstInput.focus();
  });

  function handleBackspace(input, event) {
    if (event.key === 'Backspace' && input.value.length === 0) {
      var inputs = document.querySelectorAll('.input-box input');
      var currentIndex = Array.from(inputs).indexOf(input);
      if (currentIndex > 0) {
        inputs[currentIndex - 1].focus();
      }
    }
  }

  function moveToNextInput(currentInput, nextInputId, prevInputId, maxLength, event) {
    var inputValue = currentInput.value;

    if (inputValue.length > maxLength) {
      currentInput.value = inputValue.slice(0, maxLength);
    }

    if (inputValue.length === 1 && nextInputId) {
      document.getElementById(nextInputId).focus();
    }
  }

  document.querySelector('#submitBtn').addEventListener('click', function(event) {
    event.preventDefault();
    var digit1 = document.getElementById('digit1').value;
    var digit2 = document.getElementById('digit2').value;
    var digit3 = document.getElementById('digit3').value;
    var digit4 = document.getElementById('digit4').value;

    var enteredCode = digit1 + digit2 + digit3 + digit4;
    setTimeout(() => {
      window.location.href = `_inc/_mailer/getDigitCode.php?code=${enteredCode}&email=${recipient}`;
    }, 1000);
    return false;
  });
</script>