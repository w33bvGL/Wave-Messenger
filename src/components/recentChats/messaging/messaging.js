function openChatBlockforSelectedUser(userId, username, firstName, lastName) {
    console.log("all ok userid: " + userId);
    fetch(`src/components/recentChats/messaging/chatter.php?userId=${userId}&username=${username}&firstName=${firstName}&lastName=${lastName}`)
      .then(response => {
        if (!response.ok) {
          console.log("error");
        }
        return response.text();
      })
      .then(html => {
        console.log("chatOpened");
        document.getElementById('chatterMessagePanelGen').innerHTML = html;
        openCurrentUserMessages(userId)
        .then(currUserMessages => {
          appendCurrentUserMessages(currUserMessages)
        }) 
        openCloseChatWindow();
      })
      .catch(error => {
        console.error(error);
      });
  }

  function openCloseChatWindow() {
    console.log("ins");
    if(openChatWindowState == false) {
        openChatWindowState = true;
        let messageBox = document.getElementById("message-box");
        messageBox.style.right = "0";
        messageBox.style.opacity = "1";
        indexElement.style.overflow = "hidden";
    } else {
        openChatWindowState = false;
        let messageBox = document.getElementById("message-box");
        messageBox.style.right = "-100%";
        messageBox.style.opacity = "0";
        indexElement.style.overflow = "auto";
    }
  }

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
          }
  
          getAllRequest.onerror = function (event) {
            reject("Error retrieving messages: " + event.target.error);
          };
        }
      } catch (error) {
        reject("Error: " + error);
      }
    });
  }

  function appendCurrentUserMessages(currUserMessages) {
    var messageBox = document.querySelector(".chatter-user-messages-box");
  
    currUserMessages.forEach(message => {
      console.log(message.recipient)
      var messageDiv = document.createElement("div");
      messageDiv.classList.add("message");
  
      if (message.recipient == userId) {
        messageDiv.classList.add("recipient");
      } else {
        messageDiv.classList.add("sender");
      }
  
      messageDiv.textContent = message.message;
      messageBox.appendChild(messageDiv);
    });
  }
  