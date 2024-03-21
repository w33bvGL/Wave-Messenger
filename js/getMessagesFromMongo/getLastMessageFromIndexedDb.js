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
              
              let lastMessage = null;
  
              cursorRequest.onsuccess = function(event) {
                  const cursor = event.target.result;
                  if (cursor) {
                      lastMessage = cursor.value;
                      if (lastMessage.timestamp !== undefined) {
                          transaction.oncomplete = function() {
                              db.close();
                              resolve({ id: userId, timestamp: lastMessage.timestamp });
                          };
                      } else {
                          console.error("Timestamp is undefined for last message => ", lastMessage);
                          transaction.oncomplete = function() {
                              db.close();
                              resolve(null);
                          };
                      }
                  } else {
                      transaction.oncomplete = function() {
                          db.close();
        
                          resolve(null);
                      };
                  }
              };
  
              cursorRequest.onerror = function(event) {
                  reject("Cursor error => ", event.target.error);
              };
          };
  
          request.onerror = function(event) {
              reject("Error opening IndexedDb: => ", event.target.error);
          };
      } catch (error) {
          reject("Error getting last message from IndexedDB => ", error);
      }
  });
}
