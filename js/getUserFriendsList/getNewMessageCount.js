async function getNewMessageCount(userId) {
    return new Promise((resolve, reject) => {
      try {
        let request = window.indexedDB.open("messages", 1);
        request.onsuccess = function (event) {
          const db = event.target.result;
          const transaction = db.transaction(["chat_messages"], "readonly");
          const objectStore = transaction.objectStore("chat_messages");
  
          const index = objectStore.index("id");
          const cursorRequest = index.openCursor(IDBKeyRange.only(userId));
  
          let unreadMessageCount = 0;
  
          cursorRequest.onsuccess = function (event) {
            const cursor = event.target.result;
            if (cursor) {
              const message = cursor.value;
              if (!message.read) {
                unreadMessageCount++;
              }
              cursor.continue();
            } else {
              transaction.oncomplete = function () {
                db.close();
                resolve(unreadMessageCount);
              };
            }
          };
  
          cursorRequest.onerror = function (event) {
            console.error("Error in cursor request:", event.target.error);
            reject("Error in cursor request: " + event.target.error);
          };
  
        };
        request.onerror = function (event) {
          console.error("Error opening database:", event.target.error);
          reject("Error opening database: " + event.target.error);
        };
      } catch (error) {
        console.error("Error retrieving new message count:", error);
        reject(error);
      }
    });
  }