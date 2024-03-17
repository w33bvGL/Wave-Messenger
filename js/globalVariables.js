var activePanel = 0;
var indexElement = document.querySelector(".index");
var lastScrollTop = 0;
var panelAddChatContactGroupState = false;
var openChatWindowState = false;

//reset styles
function resetScrollPositionAndStyles() {
  // profile
  let myProfile = document.getElementById("my-profile");
  let myUser = document.getElementById("user-profile");
  let myImage = document.getElementById("my-image");
  // chat
  let header = document.querySelector(".recent-chats");
  let chatSorting = document.getElementById("chat-sorting");
  let chatSortingButtons = document.querySelectorAll("#sort-button");
  let canvasChats = document.getElementById("canvas-chats");
  let newChatButton = document.getElementById("new-chat-button");

  //profile styles
  myProfile.style.backgroundColor = "var(--cl-3)";
  myProfile.style.padding = "30px 15px 0 15px";
  myImage.style.width = `64px`;
  myImage.style.height = `64px`;
  myUser.style.padding = "30px 15px 10px 15px";
  myUser.style.borderColor = "var(--cl-35)";

  //chats styles
  header.style.backgroundColor = "var(--cl-16)";
  header.style.padding = "30px 15px 0 15px";
  canvasChats.style.padding = "20px 0px 100px 0px";
  chatSorting.style.backgroundColor = "var(--cl-16)";
  chatSorting.style.padding = "0 15px 0 15px";
  chatSorting.style.height = "26px";
  chatSortingButtons.forEach(function (button) {
    button.style.border = "1px solid var(--cl-16)";
  });
  chatSorting.style.minHeight = "26px";
  newChatButton.style.display = "flex";
  setTimeout(() => {
    newChatButton.style.opacity = "1";
    newChatButton.style.transform = "translateY(0px)";
  }, 300);
}


function formatTimestamp(unixTimestamp) {
  const date = new Date(unixTimestamp * 1000);
  const hours = date.getHours();
  const minutes = "0" + date.getMinutes();
  const formattedTime = hours + ':' + minutes.substr(-2);
  return formattedTime;
}