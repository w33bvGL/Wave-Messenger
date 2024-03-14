function openUserContactOrGroupAddPanel() {
  let addChatContactGroup = document.getElementById(
    "add-user-add-contact-add-group-panel"
  );
  let addChatContactGroupPanel = document.getElementById(
    "add-user-contact-group-panel"
  );

  if (panelAddChatContactGroupState == false) {
    panelAddChatContactGroupState = true;
    indexElement.style.overflow = "hidden";
    addChatContactGroup.style.display = "flex";
    setTimeout(() => {
      addChatContactGroupPanel.style.transform = "translateY(0)";
      addChatContactGroup.style.opacity = "1";
    }, 20);
  } else {
    panelAddChatContactGroupState = false;
    addChatContactGroupPanel.style.transform = "translateY(200px)";
    indexElement.style.overflow = "auto";
    addChatContactGroup.style.opacity = "0";
    setTimeout(() => {
      addChatContactGroup.style.display = "none";
    }, 170);
  }
}
