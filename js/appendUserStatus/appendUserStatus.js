async function appendUserStatus(currUserStatus) {
  console.log("User status has updated successfully:", currUserStatus);

  for (const userId in currUserStatus) {
    if (currUserStatus.hasOwnProperty(userId)) {
      const status = currUserStatus[userId];
      console.log(userId +" <= => " + status)
      const userElement = document.getElementById(`user-${userId}`);
      if (userElement) {
        console.log(userElement)
        const userStatusElement = userElement.querySelector(".user-status");
        if (userStatusElement) {
          userStatusElement.classList.remove("is-online", "is-offline");

          if (status === "online") {
            userStatusElement.classList.add("is-online");
          } else {
            userStatusElement.classList.add("is-offline");
          }
        }
      } else {
        console.error("Error UserStatusElements No have => " + userElement)
      }
    }
  }
}