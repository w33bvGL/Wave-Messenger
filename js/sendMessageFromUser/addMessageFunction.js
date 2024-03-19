function clearMessageAndMedia(media, message) {
  media.value = "";
  message.value = "";
}

function addRecipientMessage(message) {
  var messageBox = document.querySelector(".chatter-user-messages-box");
  var messageDiv = document.createElement("div");
  messageDiv.classList.add("message", "recipient");
  messageDiv.textContent = message;
  messageBox.appendChild(messageDiv);
}

function addSenderMessage(message) {
  var messageBox = document.querySelector(".chatter-user-messages-box");
  var messageDiv = document.createElement("div");
  messageDiv.classList.add("message", "sender");
  messageDiv.textContent = message;
  messageBox.appendChild(messageDiv);
}
