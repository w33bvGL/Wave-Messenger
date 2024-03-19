function appendCurrentUserMessages(currUserMessages) {
    var messageBox = document.querySelector(".chatter-user-messages-box");
  
    currUserMessages.forEach((message) => {
      console.log(message.recipient);
      var messageDiv = document.createElement("div");
      messageDiv.classList.add("message");
  
      if (message.recipient == userId) {
        messageDiv.classList.add("recipient");
      } else {
        messageDiv.classList.add("sender");
      }
  
      messageDiv.textContent = message.message;
      messageBox.appendChild(messageDiv);
    });
  }