async function sendMessageFromUser(recipient) {
  let sender = userId;
  let senderForm = document.getElementById("input-message-form-box");
  let message = document.getElementById("chatter-input");
  let media = document.getElementById("chatter-file");
  console.log("message start to send. recipient userID: " + recipient);
  console.log(typeof recipient + " : recipiiiiii");
  console.log("message start to send. sender userID: " + sender);

  senderForm.addEventListener("submit", async function (event) {
    event.preventDefault(); // stop form submit
    if (message.value === "") {
      if (media.value === "") {
      } else {
        console.log("No message to send, sending only media.");
        await addSenderMessage(message.value, createTimestampF());

        await scrollToBottom();
        clearMessageAndMedia(media, message);
      }
    } else {
      if (media.value === "") {
        console.log("No media to send, sending only message.");
        await sendMessageWSS(recipient, sender, message.value);
        await addSenderMessage(message.value, createTimestampF());
        // eta scroll linelni nerqev
        await scrollToBottom();
        clearMessageAndMedia(media, message);
      } else {
        console.log("Have media and message, sending.");
        await addSenderMessage(message.value, createTimestampF());

        await scrollToBottom();
        clearMessageAndMedia(media, message);
      }
    }
  });
}

