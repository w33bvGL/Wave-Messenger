function saveMessageToIndexedDb(
  recipient,
  sender,
  message,
  id,
  read,
  timestamp
) {
  let request = window.indexedDB.open("messages", 1);

  request.onsuccess = function (event) {
    const db = event.target.result;

    var transaction = db.transaction(["chat_messages"], "readwrite");
    var objectStore = transaction.objectStore("chat_messages");

    var messageObject = {
      id: id,
      recipient: recipient,
      sender: sender,
      message: message,
      read: read,
      timestamp: timestamp,
    };

    var addRequest = objectStore.add(messageObject);

    addRequest.onsuccess = function () {
      console.log("Message added to IndexedDB with key:", addRequest.result);
    };

    addRequest.onerror = function (event) {
      console.error("Error adding message to IndexedDB:", event.target.error);
    };
  };

  request.onerror = function (event) {
    console.error("Error opening IndexedDB:", event.target.error);
  };
}
