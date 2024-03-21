async function fetchMessagesFromMongo(userId, lastMessage) {
    try {
      let requersObject = {
        userId: userId,
        timestamp: lastMessage
      };

      const response = await fetch('../_inc/_loading/fetchMessagesFromMongo.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(requersObject),
      });
  
      if (!response.ok) {
        throw new Error('Failed to fetch messages from MongoDB');
      }
  
      return await response.json();
    } catch (error) {
      console.error('Error fetching messages from MongoDB:', error);
      return [];
    }
  }