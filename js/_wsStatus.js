const statusSocket = new WebSocket(`ws://localhost:9992?userId=${userId}`);

statusSocket.onopen = function () {
  console.log("status WebSocket connected successfully!");
};

statusSocket.onclose = function () {
  console.log("status WebSocket closed.");
};

statusSocket.onerror = function (error) {
  console.error("status WebSocket connection error => ", error);
};

statusSocket.onmessage = function (event) {
  let currUserStatus = JSON.parse(event.data);
  appendUserStatus(currUserStatus);
};

async function sendUserFriendsState(friendsList) {
  const message = JSON.stringify({ friends: friendsList });

  async function sendMessage() {
    if (statusSocket.readyState === WebSocket.OPEN) {
      statusSocket.send(message);
    } else {
     
      await new Promise(resolve => setTimeout(resolve, 1000));
      await sendMessage();
    }
  }

  await sendMessage();
}
