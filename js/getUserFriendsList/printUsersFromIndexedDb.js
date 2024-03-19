async function printUsersFromIndexedDB() {
    console.log("user have... print!");
    try {
      let request = window.indexedDB.open("userData", 1);
      const db = await new Promise((resolve, reject) => {
        request.onsuccess = function (event) {
          resolve(event.target.result);
        };
        request.onerror = function (event) {
          reject("Error in indexdb null userdata:", event.target.error);
        };
      });
      const transaction = db.transaction(["friends"], "readonly");
      const objectStore = transaction.objectStore("friends");
  
      const getAllUsersRequest = objectStore.getAll();
  
      getAllUsersRequest.onsuccess = async function () {
        const users = getAllUsersRequest.result;
        console.log("indexdb users:", users);
        const usersContainer = document.getElementById("chats");
  
        for (const user of users) {
          console.log("ID:", user.id, "userName:", user.username, "email:", user.email, "firstName:", user.firstName, "lastName:", user.lastName);
          const newMessageCount = await getNewMessageCount(user.id);
          console.log(newMessageCount)
          let lastUserMessageInformation = await getUserInformation(user.id);
          //HTML
          const userHtml = `
            <div class="user" onclick="openChatBlockForSelectedUser(${user.id}, '${user.username}', '${user.firstName}', '${user.lastName}', '${userId}');" id="user-${user.id}">
              <div class="user-image">
                <img src="assets/images/waveUser/userNotLoaded.png" alt="User Image">
                <div class="user-status is-online"></div>
              </div>
              <div class="user-info">
                <div class="name-time">
                  <p class="username">${user.firstName + ' ' + user.lastName}</p>
                  <span class="message-send-time">${lastUserMessageInformation.timestamp}</span>
                </div>
                <div class="message-send">
                  <p>${lastUserMessageInformation.message}</p>
                  ${newMessageCount > 0 ? `<div class="new-message-banner">
                    <p>${newMessageCount}</p>
                  </div>` : ''}
                </div>
              </div>
            </div>
          `;
          usersContainer.insertAdjacentHTML('beforeend', userHtml);
        }
      };
    } catch (error) {
      console.error(error);
    }
  }
  