indexElement.addEventListener("scroll", function () {
  if (activePanel == 3) {
    let myProfile = document.getElementById("my-profile");
    let scrollPosition = indexElement.scrollTop;
    let myUser = document.getElementById("user-profile");
    let myImage = document.getElementById("my-image");

    if (scrollPosition > 1) {
      myProfile.style.padding = "15px 15px";
    } else {
      myProfile.style.backgroundColor = "var(--cl-3)";
      myProfile.style.padding = "30px 15px 0 15px";
    }

    if (scrollPosition >= 20) {
      let wh = 67 - scrollPosition / 10;
      let avatarW = Math.round(wh);
      myImage.style.minWidth = "50px";
      myImage.style.minHeight = "50px";
      myImage.style.maxWidth = "64px";
      myImage.style.maxHeight = "64px";
      myImage.style.width = `${avatarW}px`;
      myImage.style.height = `${avatarW}px`;
      myUser.style.borderColor = "transparent";
      myUser.style.padding = "10px 15px 10px 15px";
    } else {
      myImage.style.width = `64px`;
      myImage.style.height = `64px`;
      myUser.style.padding = "30px 15px 10px 15px";
      myUser.style.borderColor = "var(--cl-35)";
    }
  } else {
    console.log("profile off: " + activePanel);
  }
});
