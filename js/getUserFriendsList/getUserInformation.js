function getUserInformation(userId) {
  return new Promise((resolve, reject) => {
    try {
      let request = window.indexedDB.open("messages", 1);
      request.onsuccess = function (event) {
        const db = event.target.result;
        const transaction = db.transaction(["chat_messages"], "readonly");
        const objectStore = transaction.objectStore("chat_messages");

        const index = objectStore.index("id");

        const cursorRequest = index.openCursor(
          IDBKeyRange.only(userId),
          "prev"
        );

        cursorRequest.onsuccess = function (event) {
          const cursor = event.target.result;
          if (cursor) {
            resolve({
              timestamp: formatTimestamp(cursor.value.timestamp),
              message: cursor.value.message,
            });
          } else {
            // eta namak nema!
            resolve({ timestamp: "", message: "" });
          }
        };

        cursorRequest.onerror = function (event) {
          reject("Error in cursor request => " + event.target.error);
        };
      };

      request.onerror = function (event) {
        reject("Error opening database => " + event.target.error);
      };
    } catch (error) {
      reject("Error => " + error);
    }
  });
}
