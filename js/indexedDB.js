var request = window.indexedDB.open("userData", 1);

request.onupgradeneeded = function (event) {
  const db = event.target.result;

  db.createObjectStore("avatar");
  db.createObjectStore("friends");
};

request.onsuccess = function (event) {
  const db = event.target.result;
  getUserFriendsList(friendsList, userId);
  setUserAvatar();
};

request.onerror = function (event) {
  console.error("indexDb error:", event.target.error);
};

var request = window.indexedDB.open("messages", 1);
request.onupgradeneeded = function (event) {
  const db = event.target.result;

  var objectStore = db.createObjectStore("chat_messages", { keyPath: "index", autoIncrement: true });

    objectStore.createIndex("id", "id", { unique: false });
};
