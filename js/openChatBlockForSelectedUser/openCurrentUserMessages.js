function openCurrentUserMessages(userId) {
    return new Promise((resolve, reject) => {
      try {
        let request = window.indexedDB.open("messages", 1);
        request.onsuccess = function (event) {
          const db = event.target.result;
          const transaction = db.transaction(["chat_messages"], "readonly");
          const objectStore = transaction.objectStore("chat_messages");
  
          const index = objectStore.index("id");
          const getAllRequest = index.getAll(IDBKeyRange.only(userId));
  
          getAllRequest.onsuccess = function (event) {
            const messages = event.target.result;
            resolve(messages);
          };
  
          getAllRequest.onerror = function (event) {
            reject("Error retrieving messages: " + event.target.error);
          };
        };
      } catch (error) {
        reject("Error: " + error);
      }
    });
  }