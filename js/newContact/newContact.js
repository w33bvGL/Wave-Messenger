async function closeAddnewChat() {
  let newContact = document.getElementById("new-contact-add");
  anime({
    targets: newContact,
    right: "-100%",
    opacity: 1,
    duration: 0.15,
    easing: "easeInOutQuad",
  });
  indexElement.style.overflow = "auto";
}

async function openAddnewChat() {
  let newContact = document.getElementById("new-contact-add");
  anime({
    targets: newContact,
    right: "0",
    opacity: 1,
    duration: 0.15,
    easing: "easeInOutQuad",
    complete: () => {
      openUserContactOrGroupAddPanel();
    },
  });
  indexElement.style.overflow = "hidden";
}

document
  .getElementById("send")
  .addEventListener("click", async function (event) {
    event.preventDefault();
    const username = document.getElementById("user-search-input").value;
    const userId = document.querySelector("input[name=userId]").value;
    console.log(`search user => ${username}, userId => ${userId}`)

    try {
      const response = await fetch(`_inc/_user/searchUser.php?username=${username}&userId=${userId}`, {
        headers: {
          "Content-Type": "application/json",
        },
      });
      const data = await response.json();
      //eta data ka null chi uremn user ka to baci profil@ vor nayenq ova incacuya
      if(data) {
        
      }
       else {
        console.warn("SearchUser no have data => ", data)
       }
      console.log("Response from server =>", data);
    } catch (error) {
      console.error("There was a problem with the fetch operation => ", error);
    }
  });
