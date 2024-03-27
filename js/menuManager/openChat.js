async function openChat() {
  if (openedPanel === 0) {
    return;
  } else {
    // animation scroll aneli
    await resetScrollAnimations("Chat");
    console.log("Chats status => opened");
    changeMenuIcon(0);
    changeMenuText(0);
    openedPanel = 0;

    chats.style.transition = transition;
    chats.style.opacity = "0";
    chats.style.display = "block";
    profile.style.display = "none";
    body.style.backgroundColor = "var(--cl-16)";
    index.scrollTo(0, 0);
    setTimeout(function () {
      chats.style.opacity = "1";
    }, 100);
  }
}
