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