const openUserContactOrGroupAddPanel = () => {
  const addChatContactGroup = document.getElementById(
    "add-user-add-contact-add-group-panel"
  );
  const addChatContactGroupPanel = document.getElementById(
    "add-user-contact-group-panel"
  );

  if (!panelAddChatContactGroupState) {
    panelAddChatContactGroupState = true;
    indexElement.style.overflow = "hidden";
    addChatContactGroup.style.display = "flex";
    setTimeout(() => {
      addChatContactGroup.style.opacity = "1";
    }, 1);
    anime({
      targets: addChatContactGroupPanel,
      translateY: 0,
      opacity: 1,
      duration: 150,
      easing: "easeInOutQuad",
    });
  } else {
    panelAddChatContactGroupState = false;
    anime({
      targets: addChatContactGroupPanel,
      translateY: 200,
      opacity: 0,
      duration: 150,
      easing: "easeInOutQuad",
      complete: () => {
        addChatContactGroup.style.opacity = "0";
        indexElement.style.overflow = "auto";
        setTimeout(() => {
          addChatContactGroup.style.display = "none";
        }, 150);
      },
    });
  }
};
