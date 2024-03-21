function appendCurrentUserMessages(currUserMessages) {
    currUserMessages.forEach((message) => {
      console.log(message.recipient);

      if (message.recipient == userId) {
        addRecipientMessage(message.message,formatTimestampFunctionSystem(message.timestamp))
      } else {
        addSenderMessage(message.message, formatTimestampFunctionSystem(message.timestamp))
      }
    });
  }