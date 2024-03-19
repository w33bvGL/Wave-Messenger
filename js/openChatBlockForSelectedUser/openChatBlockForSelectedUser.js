function openChatBlockForSelectedUser(
    userId,
    username,
    firstName,
    lastName,
    currUser
  ) {
    console.log("all ok userid: " + userId);
    fetch(
      `src/components/recentChats/messaging/chatter.php?userId=${userId}&username=${username}&firstName=${firstName}&lastName=${lastName}&currUser=${currUser}`
    )
      .then((response) => {
        if (!response.ok) {
          console.log("error");
        }
        return response.text();
      })
      .then((html) => {
        console.log("chatOpened");
        document.getElementById("chatterMessagePanelGen").innerHTML = html;
        openCurrentUserMessages(userId).then((currUserMessages) => {
          appendCurrentUserMessages(currUserMessages);
          // mark new messages to read
          markCurrentUserMessagesAsRead(userId);
        });
        openCloseChatWindow();
      })
      .catch((error) => {
        console.error(error);
      });
  }