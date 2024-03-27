async function resetScrollAnimations(reset) {
  // let scrollPosition = indexElement.scrollTop;
  let myProfile = document.getElementById("my-profile");
  let myUser = document.getElementById("user-profile");
  let myImage = document.getElementById("my-image");

  indexElement.scrollTo(0, 0);
  async function resetProfile() {
    console.log("Reset all Profile styles => Successs!");
    // reset profile MyProfile Section
    myProfile.style.backgroundColor = "var(--cl-3)";
    myProfile.style.padding = "30px 15px 0 15px";

    // reset profile user Section
    myImage.style.width = `64px`;
    myImage.style.height = `64px`;
    myUser.style.padding = "15px 15px 10px 15px";
    myUser.style.borderColor = "var(--cl-35)";
  }

  async function resetCall() {
    console.log("Reset all Call Styles => Success!");
  }

  async function resetExplore() {
    console.log("Reset all Explore Styles => Success!");
  }

  async function resetChat() {
    console.log("Reset all Chat Styles => Success!");
  }

  if (reset == "Chat") {
    await resetChat();
  } else if (reset == "Explore") {
    await resetExplore();
  } else if (reset == "Call") {
    await resetCall();
  } else {
    await resetProfile();
  }
}
