function processNewMessages(newMessages) {
    console.log("The new messages object => ", newMessages);
    newMessages.forEach(message => {
        saveMessageToIndexedDb(message.recipient, message.sender, message.message, message.sender, false, message.timestamp);
    });
}
