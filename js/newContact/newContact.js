async function closeAddnewChat() {
  let messageBox = document.getElementById("new-contact-add");
  messageBox.style.right = "-100%";
  messageBox.style.opacity = "0";
  indexElement.style.overflow = "auto";
}

async function openAddnewChat() {
  let messageBox = document.getElementById("new-contact-add");
  messageBox.style.right = "0";
  messageBox.style.opacity = "1";
  indexElement.style.overflow = "hidden";
  setTimeout(() => {
    openUserContactOrGroupAddPanel();
  }, 150);
}
