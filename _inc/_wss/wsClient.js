console.log("WebSocket Work! Connecting to websockets...");

// Chat socket
const chatSocket = new WebSocket(`ws://localhost:9991?userId=${userId}`);

chatSocket.onopen = function() {
    console.log('Chat WebSocket connected successfully!');
};

chatSocket.onclose = function() {
    console.log('Chat WebSocket closed.');
};

chatSocket.onerror = function(error) {
    console.error('Chat WebSocket connection error:', error);
};

chatSocket.onmessage = function(event) {
    console.log('Received message from chat server:', event.data);
    let messageData = JSON.parse(event.data);
    let recipient = messageData.recipient;
    let sender = messageData.sender;
    let timestamp = messageData.timestamp;
    let message = messageData.message;
    console.log(timestamp);
    let messageCurrUserOpened = document.getElementById(`user-banner-${recipient}`);
    console.log(messageCurrUserOpened);

    if(messageCurrUserOpened) {
    if (recipient === userId) {
        // aysinqn user@ mtela konkret es chat ! uremn tesela debil chi
        saveMessageToIndexedDb(recipient, sender, message, sender, true, timestamp)
        addRecipientMessage(message);
    } else {
        saveMessageToIndexedDb(recipient, sender, message, sender, true, timestamp)
        addRecipientMessage(message);
    }
    } else {
        // ay ste chi tese
        console.log("curr user not opened message go to indexeddb...");
        saveMessageToIndexedDb(recipient, sender, message, sender, false, timestamp)
    }
};

function sendMessageWSS(recipient, sender, message) {
    console.log("SEND TO WS! : " + " recepientID: " +  recipient + " senderID: " + sender + " message: " + message);

        let messageObject = {
            recipient: recipient,
            sender: sender,
            message: message,
            timestamp: Date.now() 
        }

        let messageToJson = JSON.stringify(messageObject);

        console.log(messageToJson);
        chatSocket.send(messageToJson);
}; 

// Status socket
const statusSocket = new WebSocket('ws://localhost:9992');

statusSocket.onopen = function() {
    console.log('Status WebSocket connected successfully!');
};

statusSocket.onclose = function() {
    console.log('Status WebSocket closed.');
};

statusSocket.onerror = function(error) {
    console.error('Status WebSocket connection error:', error);
};

statusSocket.onmessage = function(event) {
    console.log('Received message from status server:', event.data);
};
