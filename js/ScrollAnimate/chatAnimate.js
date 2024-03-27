let prevAvatarWidth = 64;
let prevScrollPosition = 0;

indexElement.addEventListener("scroll", function () {
  if (openedPanel == 3) {
    let myProfile = document.getElementById("my-profile");
    let scrollPosition = indexElement.scrollTop;
    let myUser = document.getElementById("user-profile");
    let myImage = document.getElementById("my-image");

    let scrollThreshold = 10;
    let avatarWidthThreshold = 5;

    if (Math.abs(scrollPosition - prevScrollPosition) >= scrollThreshold) {
      if (scrollPosition > 10) {
        myProfile.style.padding = "15px 15px";
      } else {
        myProfile.style.backgroundColor = "var(--cl-3)";
        myProfile.style.padding = "30px 15px 0 15px";
      }

      if (scrollPosition > 20) {
        let wh = 64 - scrollPosition / 10;
        let avatarW = Math.round(wh);

        if (Math.abs(avatarW - prevAvatarWidth) >= avatarWidthThreshold) {
          myImage.style.minWidth = "45px";
          myImage.style.minHeight = "45px";
          myImage.style.maxWidth = "64px";
          myImage.style.maxHeight = "64px";
          myImage.style.width = `${avatarW}px`;
          myImage.style.height = `${avatarW}px`;

          myUser.style.borderColor = "transparent";
          myUser.style.padding = "0px 15px 10px 15px";

          prevAvatarWidth = avatarW;
        }
      } else {
        myImage.style.width = `64px`;
        myImage.style.height = `64px`;
        myUser.style.padding = "15px 15px 10px 15px";
        myUser.style.borderColor = "var(--cl-35)";
        prevAvatarWidth = 64;
      }
      prevScrollPosition = scrollPosition;
    }
  } else {
    console.log("profile off => " + openedPanel);
  }
});
