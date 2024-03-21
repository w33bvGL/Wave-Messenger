function openCloseChatWindow() {
    if (openChatWindowState == false) {
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
      //update chatList
      getUserFriendsList(friendsList, userId);
      printUsersFromIndexedDB()
    }
  }