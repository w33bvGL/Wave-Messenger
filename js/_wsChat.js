const chatSocket = new WebSocket(`ws://localhost:9991?userId=${userId}`);

chatSocket.onopen = function () {
  console.log("Chat WebSocket connected successfully!");
};

chatSocket.onclose = function () {
  console.log("Chat WebSocket closed.");
};

chatSocket.onerror = function (error) {
  console.error("Chat WebSocket connection error:", error);
};

chatSocket.onmessage = function (event) {
  console.log("Received message from chat server:", event.data);
  let messageData = JSON.parse(event.data);
  let recipient = messageData.recipient;
  let sender = messageData.sender;
  let timestamp = messageData.timestamp;
  let message = messageData.message;
  console.log(timestamp);
  let messageCurrUserOpened = document.getElementById(
    `user-banner-${recipient}`
  );
  console.log("Opened Chats panel => " + messageCurrUserOpened);

  if (messageCurrUserOpened) {
    if (recipient === userId) {
      // aysinqn user@ mtela konkret es chat ! uremn tesela debil chi
      saveMessageToIndexedDb(
        recipient,
        sender,
        message,
        sender,
        true,
        timestamp
      );
      // uxarkmenq namak@ u timestamp@
      addRecipientMessage(message, formatTimestamp(timestamp));
    } else {
      console.log("Error cgitem senc ban hnaravora te che => " + recipient);
    }
  } else {
    // ay ste chi tese
    console.log("Curr user not opened message go to indexedDb...");
    saveMessageToIndexedDb(
      recipient,
      sender,
      message,
      sender,
      false,
      timestamp
    );
    // eta update enq anm list@ userneri => klienti vraya heriq exav bol exav =)
    getUserFriendsList(friendsList, userId);
    printUsersFromIndexedDB();
  }
};

function sendMessageWSS(recipient, sender, message) {
  console.log(
    "SEND TO WS! : " +
      " recepientID: " +
      recipient +
      " senderID: " +
      sender +
      " message: " +
      message
  );
  // message i nersi hamar moment.js ovem time tali karoxa zazor lini 0.2s 0.3s :) 
  let timestamp = Date.now();

  let messageObject = {
    recipient: recipient,
    sender: sender,
    message: message,
    timestamp: timestamp,
  };

  let messageToJson = JSON.stringify(messageObject);

  saveMessageToIndexedDb(
    recipient,
    sender,
    message,
    recipient,
    true,
    timestamp
  );
  console.log(messageToJson);
  chatSocket.send(messageToJson);
}
