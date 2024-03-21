function clearMessageAndMedia(media, message) {
  media.value = "";
  message.value = "";
}

function addRecipientMessage(message, timestamp) {
  var messageBox = document.querySelector(".chatter-user-messages-box");
  var messageHtml = `
  <div class="message recipient">
      <div class="message-inner-container-p-20-recipient">
          <p class="message">${message}</p>
          <p class="timestamp">${timestamp}</p>
      </div>
  </div>
`;
  messageBox.insertAdjacentHTML("beforeend", messageHtml);
}

function addSenderMessage(message, timestamp) {
  var messageBox = document.querySelector(".chatter-user-messages-box");
  var messageHtml = `
    <div class="message sender">
        <div class="message-inner-container-p-20-sender">
           <p class="message">${message}</p>
           <p class="timestamp">${timestamp}</p>
        </div>
    </div>
  `;
  messageBox.insertAdjacentHTML("beforeend", messageHtml);
}
