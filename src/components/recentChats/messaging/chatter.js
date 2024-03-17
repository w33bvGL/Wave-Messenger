function sendMessageFromUser(recipient) {
  let sender = userId;
  let senderForm = document.getElementById("input-message-form-box");
  let message = document.getElementById("chatter-input");
  let media = document.getElementById("chatter-file");
  console.log("message start to send. recipient userID: " + recipient);
  console.log(typeof(recipient) + " : recipiiiiii");
  console.log("message start to send. sender userID: " + sender);

  senderForm.addEventListener("submit", function (event) {
    event.preventDefault(); // stop form submit
    if (message.value === "") {
      if (media.value === "") {
        console.log("No message and no media to send.");
      } else {
        console.log("No message to send, sending only media.");
        addSenderMessage(message.value);
        clearMessageAndMedia(media, message);
      }
    } else {
      if (media.value === "") {
        console.log("No media to send, sending only message.");
        sendMessageWSS(recipient, sender, message.value);
        addSenderMessage(message.value);
        saveMessageToIndexedDb(recipient, sender, message.value , recipient);
        clearMessageAndMedia(media, message);
        
      } else {
        console.log("Have media and message, sending.");
        addSenderMessage(message.value);

        clearMessageAndMedia(media, message);
  
      }
    }
  });


}

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


function saveMessageToIndexedDb(recipient, sender, message, id) {
  let request = window.indexedDB.open("messages", 1);

  request.onsuccess = function(event) {
    const db = event.target.result;

    var transaction = db.transaction(["chat_messages"], "readwrite");
    var objectStore = transaction.objectStore("chat_messages");

    var messageObject = {
      id: id,
      recipient: recipient,
      sender: sender,
      message: message,
      timestamp: new Date().getTime()
    };

    var addRequest = objectStore.add(messageObject);

    addRequest.onsuccess = function() {
      console.log("Message added to IndexedDB with key:", addRequest.result);
    };

    addRequest.onerror = function(event) {
      console.error("Error adding message to IndexedDB:", event.target.error);
    };
  };

  request.onerror = function(event) {
    console.error("Error opening IndexedDB:", event.target.error);
  };
}
