<?php
session_start();

if(isset($_SESSION['error']) && is_array($_SESSION['error']) && count($_SESSION['error']) >= 2) {
    $alertData = $_SESSION['error'];
    $status = $alertData[0];
    $message = $alertData[1];
} else {
    $status = ""; 
    $message = "";
}
?>

<div id="custom-alert" class="alert error-alert">
  <span id="error-message"></span>
</div>
<script defer>
  // error warning or success
  const alertStatus = "<?php echo $status ?>";
  const alertResponse = "<?php echo $message ?>";

  function showAlert(message, backgroundColor, color, borderColor) {
    const alert = document.getElementById("custom-alert");
    const alertMessage = document.getElementById("error-message");
    alertMessage.textContent = message;
    alert.style.backgroundColor = backgroundColor;
    alert.style.color = color;
    alert.style.borderColor = borderColor;
    alert.style.display = "block";
  }

  if (alertStatus && alertResponse) {
    if (alertStatus === "error") {
      showAlert(alertResponse, "var(--cl-17)", "var(--cl-18)", "var(--cl-19)");
    } else if (alertStatus === "warning") {
      showAlert(alertResponse, "var(--cl-21)", "var(--cl-20)", "var(--cl-22)");
    } else if (alertStatus === "success") {
      showAlert(alertResponse, "var(--cl-24)", "var(--cl-23)", "var(--cl-25)");
    }
  } else {
    console.log("No session messages to display!");
  }

  setTimeout(function() {
    fetch('_inc/_alert/deleteSession.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({})
    })
  }, 500);
</script>

<style>
  .alert {
    position: fixed;
    width: calc(100% - 40px);
    z-index: 998;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 1px solid;
    padding: 15px;
    border-radius: 5px;
    display: none;
    animation: slideInDown 0.3s forwards, fadeOut 0.4s 5s forwards;
    cursor: pointer;
    transition: opacity 0.4s;
  }

  @keyframes slideInDown {
    from {
      top: -100px;
      opacity: 0;
      display: none;
    }

    to {
      top: 50px;
      opacity: 1;
    }
  }

  @keyframes fadeOut {
    from {
      opacity: 1;
    }

    to {
      opacity: 0;
      display: none;
    }
  }

  #error-message {
    margin-right: 10px;
  }
</style>