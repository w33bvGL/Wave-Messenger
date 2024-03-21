async function getUsersAvatars(currUserAvatars) {
  return new Promise(async (resolve, reject) => {
    try {
      const avatars = {};
      for (const user of currUserAvatars) {
        const userId = user.friendId;
        const response = await fetch(
          `_inc/_user/setUsersAvatars.php?userId=${userId}`
        );
        if (response.ok) {
          const blob = await response.blob();
          avatars[userId] = blob;
       
          appendUsersAvatars(blob, userId);
          console.log("avatar have in => " + userId);
        } else {
          throw new Error(`Failed to fetch avatar for user with ID ${userId}`);
        }
      }
      resolve(avatars);
    } catch (error) {
      reject(error);
    }
  });
}


