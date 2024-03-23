function appendUsersAvatars(imageBlob, userId) {
  let userImagePath = document.getElementById(`user-avatar-path-${userId}`);
  const imageUrl = URL.createObjectURL(imageBlob);
  userImagePath.src = imageUrl;
  console.log(imageUrl);

  // linker@ pahmenq localstorage!!!!
  localStorage.setItem(userId, imageUrl);
}
