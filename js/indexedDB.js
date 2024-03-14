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
