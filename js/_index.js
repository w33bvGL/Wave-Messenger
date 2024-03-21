async function main() {
  await getUserFriendsList(friendsList, userId);
  await printUsersFromIndexedDB();
  await getMessagesFromMongo(userId);
  await setUserAvatar();
  await sendUserFriendsState(friendsList);
  await getUsersAvatars(friendsList);
}

window.addEventListener('load', async function() {
    await main();
});

