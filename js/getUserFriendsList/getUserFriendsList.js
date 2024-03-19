function getUserFriendsList(userFriends, currentUserId) {
    console.log(userFriends);
    try {
      let request = window.indexedDB.open("userData", 1);
  
      request.onsuccess = function (event) {
        let db = event.target.result;
        const transaction = db.transaction(["friends"], "readwrite");
        const objectStore = transaction.objectStore("friends");
  
        const existingDataRequest = objectStore.getAll();
  
        existingDataRequest.onsuccess = function () {
          const existingData = existingDataRequest.result;
          const existingFriendIds = existingData.map((friend) => friend.id);
  
          const newFriendIds = userFriends.map((friend) => friend.friendId)
                                           .filter((friendId) => !existingFriendIds.includes(friendId));
          console.log(newFriendIds); 
          
          if (newFriendIds.length > 0 && !arraysAreEqual(newFriendIds, existingFriendIds)) {
            console.log("have new frineds..");
  
            fetch("_inc/_user/getUserFriends.php", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({ userFriends: userFriends, currentUserId }),
            })
            .then((response) => {
              if (!response.ok) {
                throw new Error("HTTP: " + response.status);
              }
              return response.json();
            })
            .then((data) => {
              console.log(data)
              const addTransaction = db.transaction(["friends"], "readwrite");
              const addObjectStore = addTransaction.objectStore("friends");
  
              existingData.forEach((existingFriend) => {
                if (
                  !data.some((newFriend) => newFriend.id === existingFriend.id)
                ) {
                  addObjectStore.delete(existingFriend.id);
                  console.log("old data deleted...");
                  
                }
              });
  
              data.forEach((newFriend) => {
                newFriend.forEach((friend) => {
                  addObjectStore.put(friend, friend.id);
                  console.log("new data addded in indexedDb");
                });
                printUsersFromIndexedDB()
              });
  
              addTransaction.onerror = function (event) {
                console.error(
                  "error to adding db => ",
                  event.target.error
                );
              };
            })
            .catch((error) => {
              console.error("error to connect db => ", error);
            });
          } else {
            console.log("no new users");
            printUsersFromIndexedDB();
          }
        };
      };
  
      request.onerror = function (event) {
        console.error("indexedDb not connected =>", event.target.error);
      };
    } catch (error) {
      console.error(error);
    }
  }
  
  function arraysAreEqual(arr1, arr2) {
    if (arr1.length !== arr2.length) {
      return false;
    }
    for (let i = 0; i < arr1.length; i++) {
      if (arr1[i] !== arr2[i]) {
        return false;
      }
    }
    return true;
  }