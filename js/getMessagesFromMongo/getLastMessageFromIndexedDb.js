async function getLastMessageFromIndexedDB(userId) {
    return new Promise((resolve, reject) => {
      try {
        let request = window.indexedDB.open("messages", 1);
        
        request.onsuccess = function(event) {
          const db = event.target.result;
          const transaction = db.transaction(["chat_messages"], "readonly");
          const objectStore = transaction.objectStore("chat_messages");
  
          const index = objectStore.index("id");
          const cursorRequest = index.openCursor(null, "prev");
          console.log(cursorRequest);
          let lastMessage = null;

          cursorRequest.onsuccess = function(event) {
            const cursor = event.target.result;
            if (cursor) {
              lastMessage = cursor.value;
              transaction.oncomplete = function() {
                db.close();
                resolve({ id: userId, timestamp: lastMessage.timestamp });
              };
            } else {
              transaction.oncomplete = function() {
                db.close();
                // nema namak hl@ ches gre ara
                resolve(null);
              };
            }
          };
  
          cursorRequest.onerror = function(event) {
            reject("Cursor error => ", event.target.error);
          };
        };
  
        request.onerror = function(event) {
          reject("Error opnning IndexedDb: => ", event.target.error);
        };
      } catch (error) {
        reject("Error to get last message from IndexedDB => ", error);
      }
    });
  }