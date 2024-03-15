function sendMessageFromUser(recipient) {
  let sender = userId;
  console.log("message start to send. recipient userID: " + recipient);
  console.log("message start to send. sender userID: " + sender);

  let mediaInputfield = document.getElementById("chatter-file");

  if (mediaInputfield.value === "") {
    console.log("no media, sending only message");
    sendMessageWSS(recipient, sender, message);
  } else {
    console.log("have media, sending media...");
    sendMediaLP(recipient, sender, media);
  }
}
