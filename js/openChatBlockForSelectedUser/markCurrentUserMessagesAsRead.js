function markCurrentUserMessagesAsRead(currUser) {
  console.log("Marking user messages as read: " + currUser);
  return new Promise((resolve, reject) => {
    try {
      let request = window.indexedDB.open("messages", 1);

      request.onsuccess = function (event) {
        const db = event.target.result;
        const transaction = db.transaction(["chat_messages"], "readwrite");
        const objectStore = transaction.objectStore("chat_messages");

        const index = objectStore.index("id");
        const cursorRequest = index.openCursor(IDBKeyRange.only(currUser));

        cursorRequest.onsuccess = function (event) {
          const cursor = event.target.result;
          if (cursor) {
            const message = cursor.value;
            if (!message.read) {
              message.read = true;
              const updateRequest = cursor.update(message);
              updateRequest.onsuccess = function () {
                cursor.continue();
              };
              updateRequest.onerror = function (event) {
                reject(
                  "Error updating messages => ",
                  event.target.error
                );
              };
            } else {
              cursor.continue();
            }
          } else {
            resolve();
          }
        };

        cursorRequest.onerror = function (event) {
          reject("Cursor error => ", event.target.error);
        };
      };

      request.onerror = function (event) {
        reject("Error opening indexeddb => ", event.target.error);
      };
    } catch (error) {
      console.error("Error marking messsages => ", error);
      reject("Error marking messages => " + error.message);
    }
  });
}
