function openChatBlockForSelectedUser(
  userId,
  username,
  firstName,
  lastName,
  currUser
) {
  console.log("all ok userid: " + userId);
  // userId enq tali vor eta gtni link@ localstorage ic
  let image = getCurrUserAvatar(userId);
  fetch(
    `src/components/recentChats/messaging/chatter.php?userId=${userId}&username=${username}&firstName=${firstName}&lastName=${lastName}&currUser=${currUser}&avatarLink=${image}`
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
        // amen chat baceluc etanq nerqev
        scrollToBottom();
        // mark new messages to read
        markCurrentUserMessagesAsRead(userId);
      });
      openCloseChatWindow();
    })
    .catch((error) => {
      console.error(error);
    });
}
