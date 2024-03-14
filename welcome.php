<?php
session_start();
require_once '_inc/logout.php';
logOut();
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ATOM Wave - Welcome!</title>
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
  <div class="back-x-and-r letter-x">
    <div class="back-x-and-r-relative">
      <p class="x">X</p>
      <p class="r">R</p>
    </div>
  </div>
  <div class="wrapper">
    <div class="title">
      <h1 id="title-h1">Welcome</h1>
      <p id="title-span">Lets get started</p>
    </div>
    <div class="welcome-buttton-and-new-account">
      <p id="existing-customer">Existing customer / Get started</p>
      <button onclick="window.location.href = 'signIn.php';" class="anul-trigger slide-left" id="button-start">Sign
        in</button>
      <p id="new-customer">New customer? <a href="signUp.php" class="anul-trigger slide-left">Create new
          account</a></p>
    </div>
  </div>
</body>

</html>
<style>
  .wrapper {
    display: block;
    opacity: 1;
  }

  .back-x-and-r {
    position: absolute;
    right: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    pointer-events: none;
  }

  .back-x-and-r-relative {
    position: relative;
    overflow: hidden;
    width: 100%;
    height: 100%;
  }

  .x,
  .r {
    opacity: 0;
    animation: animationniii 2.5s ease forwards;
  }

  .x {
    position: absolute;
    font-size: 33.45em;
    font-family: "x-and-r";
    font-weight: bold;
    color: var(--cl-3);
    right: 0;
    top: 0;
    transform: translateY(-110px) translateX(105px);
    -webkit-text-stroke: 2px var(--cl-4);
    /* MATMATIKAA
    font size = 14.95;
    span font size need = 500px;
    1) 14.95 *  33.45em = 500.0077;
    */
  }

  .r {
    position: absolute;
    font-size: 33.45em;
    font-family: "x-and-r";
    font-weight: bold;
    color: var(--cl-3);
    bottom: 0;
    left: 0;
    transform: translateY(100px) translateX(-80px);
    -webkit-text-stroke: 2px var(--cl-4);
    /* MATMATIKAA
    font size = 14.95;
    span font size need = 500px;
    1) 14.95 *  33.45em = 500.0077;
    */
  }

  @keyframes animationniii {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }

  .title {
    margin-top: 120px;
    position: relative;
  }

  #title-h1 {
    margin-bottom: 5px;
    transform: translateY(25px);
    opacity: 0;
    transition: opacity 0.7s ease-out, transform 0.7s ease-out;
  }

  #title-span {
    font-size: var(--f-1-1em);
    color: var(--cl-2);
    transform: translateY(0);
    opacity: 0;
    transform: translateY(25px);
    transition: opacity 0.7s ease-out, transform 0.7s ease-out;
    /* MATMATIKAA
    font size = 14.95; 
    span font size need = 16px;
    1) 14.95 *  1.0709 = 16.01;
    */
  }

  .welcome-buttton-and-new-account {
    margin-top: 240px;
    display: flex;
    width: 100%;
    flex-direction: column;
  }

  #existing-customer {
    font-size: var(--f-1-1em);
    color: var(--cl-2);
    font-family: "wave-bold";
    margin-bottom: 12px;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    /* MATMATIKAA
    font size = 14.95; 
    span font size need = 16px;
    1) 14.95 *  1.0709 = 16.01;
    */
  }

  .welcome-buttton-and-new-account button {
    margin-bottom: 15px;
    opacity: 0;
    transform: translateY(25px);
    transition: opacity 0.5s ease-out, transform 0.5s ease-out;
  }

  #new-customer {
    font-size: var(--f-1em);
    color: var(--cl-2);
    opacity: 0;
    transform: translateY(15px);
    transition: opacity 0.7s ease-out, transform 0.7s ease-out;
  }
</style>
<script src="js/animator.js"></script>
<script defer>
  document.addEventListener("DOMContentLoaded", () => {
    // ANULIK_START_INIT('page-fade-in_right');
    let welcome = document.getElementById("title-h1");
    let letsGetStarted = document.getElementById("title-span");
    let buttonStart = document.getElementById("button-start");
    let exitingCustomer = document.getElementById("existing-customer");
    let newCustomer = document.getElementById("new-customer");

    if (welcome && letsGetStarted) {
      setTimeout(() => {
        welcome.style.opacity = '1';
        welcome.style.transform = 'translateY(0)';
      }, 100);
      setTimeout(() => {
        letsGetStarted.style.opacity = '1';
        letsGetStarted.style.transform = 'translateY(0)';
      }, 200);
      setTimeout(() => {
        exitingCustomer.style.opacity = '1';
        exitingCustomer.style.transform = 'translateY(0)';
      }, 400);
      setTimeout(() => {
        buttonStart.style.opacity = '1';
        buttonStart.style.transform = 'translateY(0)';
      }, 600);
      setTimeout(() => {
        newCustomer.style.opacity = '1';
        newCustomer.style.transform = 'translateY(0)';
      }, 900);
    }
  });
</script>