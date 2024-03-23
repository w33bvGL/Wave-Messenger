function getCurrUserAvatar(userId) {
  console.log(userId)
  const avatarUrl = localStorage.getItem(userId);
  console.log(avatarUrl)
  return avatarUrl;
}
