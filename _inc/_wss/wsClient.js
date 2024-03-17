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
    var messageData = JSON.parse(event.data);
    var recipient = messageData.recipient;
    var sender = messageData.sender;
    var message = messageData.message;
    if (recipient === userId) {
        addRecipientMessage(message);
        saveMessageToIndexedDb(recipient, sender, message, recipient)
    } else {
        addRecipientMessage(message);
        saveMessageToIndexedDb(recipient, sender, message, sender)
    }
};

function sendMessageWSS(recipient, sender, message) {
    console.log("SEND TO WS! : " + " recepientID: " +  recipient + " senderID: " + sender + " message: " + message);

        let messageObject = {
            recipient: recipient,
            sender: sender,
            message: message 
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
