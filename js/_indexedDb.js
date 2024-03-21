async function openUserDataDB() {
  return new Promise((resolve, reject) => {
      const request = window.indexedDB.open("userData", 1);

      request.onupgradeneeded = function(event) {
          const db = event.target.result;
          db.createObjectStore("avatar");
          db.createObjectStore("friends");
      };

      request.onsuccess = function(event) {
          resolve(event.target.result);
      };

      request.onerror = function(event) {
          reject("indexDb error:", event.target.error);
      };
  });
}

async function openMessagesDB() {
  return new Promise((resolve, reject) => {
      const request = window.indexedDB.open("messages", 1);

      request.onupgradeneeded = function(event) {
          const db = event.target.result;
          const objectStore = db.createObjectStore("chat_messages", { keyPath: "index", autoIncrement: true });
          objectStore.createIndex("id", "id", { unique: false });
      };

      request.onsuccess = function(event) {
          resolve(event.target.result);
      };

      request.onerror = function(event) {
          reject("indexDb error:", event.target.error);
      };
  });
}

async function openUsersAvatars() {
     return new Promise((resolve, reject) => {
        const request = window.indexedDB.open("friendsCache", 1) 

        request.onupgradeneeded = function(event) {
            const db = event.target.result; 
            const objectStore = db.createObjectStore("avatars", { keyPath: "userId" });
        }

        request.onsuccess = function(event) {
            resolve(event.target.result);
        }

        request.onerror = function(event) {
            reject("indexDb error => " , event.target.error);
        }
     })
}

async function INIT_INDEXEDDB() {
  try {
      const userDataDB = await openUserDataDB();
      const messagesDB = await openMessagesDB();
      const usersAvatars = await openUsersAvatars();
  } catch (error) {
      console.error(error);
  }
}


INIT_INDEXEDDB();
