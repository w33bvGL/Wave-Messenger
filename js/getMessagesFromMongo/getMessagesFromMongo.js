async function getMessagesFromMongo(userId) {
    try {
      const lastMessage = await getLastMessageFromIndexedDB(userId);
      console.log("Last message have => " + lastMessage + " fetching...");
      const newMessages = await fetchMessagesFromMongo(userId, lastMessage['timestamp']);
      console.log("You have new messages  => " + lastMessage + "save in indexeddb");
      processNewMessages(newMessages);
    } catch (error) {
      console.error("Error getting messages from MongoDB:", error);
    }
  }
      
