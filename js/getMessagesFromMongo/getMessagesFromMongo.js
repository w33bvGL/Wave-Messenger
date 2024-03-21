async function getMessagesFromMongo(userId) {
  try {
    const lastMessage = await getLastMessageFromIndexedDB(userId);

    console.log("Last message have => " + lastMessage + " fetching...");
    console.log(lastMessage);
    if (lastMessage !== null && Object.keys(lastMessage).length > 0) {
      const newMessages = await fetchMessagesFromMongo(
        userId,
        lastMessage["timestamp"]
      );
      console.log(
        "You have new messages  => " + lastMessage + "save in indexeddb"
      );

      if (newMessages !== undefined && Object.keys(newMessages).length > 0) {
        processNewMessages(newMessages);
        console.log("namak ka");
      } else {
        console.log("namak nema");
      }
    } else {
      console.log("lastMessage is empty, no messages to fetch from MongoDB");
    }
  } catch (error) {
    console.error("Error getting messages from MongoDB:", error);
  }
}
