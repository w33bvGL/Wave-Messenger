let chats = document.querySelector(".chats");
let profile = document.querySelector(".profile");
let menuIcons = document.querySelectorAll(".menu-inner-tit .button svg path");
let menuText = document.querySelectorAll(
  ".menu-inner-tit .button .menu-button-text"
);
let body = document.body;

let index = document.getElementById("index");
let transition = "opacity 0.1s";
// default
profile.style.display = "none";
chats.style.display = "block";
menuIcons[0].style.fill = "var(--cl-26)";
menuText[0].style.color = "var(--cl-26)";

function openChat() {
  changeMenuIcon(0);
  changeMenuText(0);
  activePanel = 0;
  resetScrollPositionAndStyles();
  // standart styles
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

function openProfile() {
  changeMenuIcon(3);
  changeMenuText(3);
  activePanel = 3;
  resetScrollPositionAndStyles();
  // standart styles
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

// change icons
function changeMenuIcon(itemPos) {
  menuIcons.forEach((icon) => {
    icon.style.fill = "var(--cl-15)";
  });
  menuIcons[itemPos].style.fill = "var(--cl-26)";
}

function changeMenuText(textPos) {
  menuText.forEach((text) => {
    text.style.color = "var(--cl-15)";
  });
  menuText[textPos].style.color = "var(--cl-26)";
}
