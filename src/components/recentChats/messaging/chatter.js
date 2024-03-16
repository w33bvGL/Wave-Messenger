function sendMessageFromUser(recipient) {
  let sender = userId;
  let senderForm = document.getElementById("input-message-form-box");
  let message = document.getElementById("chatter-input");
  let media = document.getElementById("chatter-file");
  console.log("message start to send. recipient userID: " + recipient);
  console.log("message start to send. sender userID: " + sender);

  senderForm.addEventListener('submit', function(event) {
    event.preventDefault(); // stop form submit 
    if (message.value === "") {
      if (media.value === "") {
        console.log("No message and no media to send.");
      } else {
        console.log("No message to send, sending only media.");
        clearMessageAndMedia(media, message);
      }
    } else {
      if (media.value === "") {
        console.log("No media to send, sending only message.");
        sendMessageWSS(recipient, sender, message.value);
        clearMessageAndMedia(media, message);
      } else {
        console.log("Have media and message, sending.");
        clearMessageAndMedia(media, message);
      }
    }
  });
}

function clearMessageAndMedia(media, message) {
  media.value = "";
  message.value = "";
}
