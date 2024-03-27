let chats = document.querySelector(".chats");
let profile = document.querySelector(".profile");

let menuIcons = document.querySelectorAll(".menu-inner-tit .button i");
let menuText = document.querySelectorAll(".menu-inner-tit .button .menu-button-text");
let body = document.body;

let index = document.getElementById("index");
let transition = "opacity 0.1s";

// default
// explore.style.display = "none";
// calls.style.display = "none";
profile.style.display = "none";
chats.style.display = "block";
changeMenuIcon(0);
changeMenuText(0);
