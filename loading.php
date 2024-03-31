<?php
session_start();

if (!isset($_SESSION["wave"])) {
  header("location: welcome.php");
}

$data = $_SESSION['wave'];
//session_destroy();
// TIME TO USE JWT!!!!
$userId = $data['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loading...</title>
  <link rel="shortcut icon" href="assets/wave/icon.webp" type="image/x-icon">
  <link rel="stylesheet" href="src/_root/palette_light.css" id="themeStylesheet">
  <link rel="stylesheet" href="src/_root/root.css" />
  <link rel="stylesheet" href="src/_root/settings.css">
</head>

<body style="display:flex; align-items:center; height: 100vh;">
  <span class="loader"></span>
</body>

</html>
<style>
  .loader {
    width: 48px;
    height: 48px;
    border: 6px solid var(--cl-1);
    border-bottom-color: transparent;
    border-radius: 50%;
    display: inline-block;
    box-sizing: border-box;
    animation: rotation 0.8s linear infinite;
    margin-bottom: 50px;
  }

  @keyframes rotation {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }
</style>
<script defer>
  let userId = <?php echo $userId; ?>;

  fetch('_inc/_loading/getClientTimezone.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'userId=' + userId
  })
    .then(response => response.text())
    .then(clientTimezone => {

      fetch('_inc/_loading/getClientUserInformation.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'userId=' + userId
      })
        .then(response => response.text())
        .then(userInfo => {

          let userData = {
            timezone: clientTimezone,
            userInfo: userInfo,
          };

          fetch('_inc/_loading/createJWT.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(userData)
          })
            .then(response => {
              if (response.ok) {
                setTimeout(function () {
                  window.location.href = 'index.php';
                }, 10000);
              }
            })
            .catch (error => {
            console.error('Error:', error);
          });
    })
    .catch(error => {
      console.error('Error:', error);
    });
    })
    .catch (error => {
    console.error('Error:', error);
  });
</script>