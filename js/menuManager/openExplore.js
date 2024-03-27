async function openExplore() {
  if (openedPanel === 1) {
    return;
  } else {
    // animation scroll aneli
    await resetScrollAnimations("Explore");
    console.log("Explore status => opened");
    changeMenuIcon(1);
    changeMenuText(1);
    openedPanel = 1;
  }
}
