async function openCall() {
  if (openedPanel === 2) {
    return;
  } else {
    // animation scrool aneli!
    await resetScrollAnimations("Call");
    console.log("Calls status => opened");
    changeMenuIcon(2);
    changeMenuText(2);
    openedPanel = 2;
  }
}
