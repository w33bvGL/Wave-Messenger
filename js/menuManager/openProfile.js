async function openProfile() {
  if (openedPanel === 3) {
    return;
  } else {
    // animation scroll aneli
    await resetScrollAnimations("Profile");
    console.log("Profile status => opened");
    changeMenuIcon(3);
    changeMenuText(3);
    openedPanel = 3;

    profile.style.transition = transition;
    profile.style.opacity = "0";
    profile.style.display = "block";
    chats.style.display = "none";
    body.style.backgroundColor = "var(--cl-3)";
    index.scrollTo(0, 0);
    setTimeout(function () {
      profile.style.opacity = "1";
    }, 100);
  }
}
