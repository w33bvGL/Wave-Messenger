indexElement.addEventListener("scroll", function () {
  if (activePanel == 0) {
    let scrollPosition = indexElement.scrollTop;
    let header = document.querySelector(".recent-chats");
    let chatSorting = document.getElementById("chat-sorting");
    let chatSortingButtons = document.querySelectorAll("#sort-button");
    let canvasChats = document.getElementById("canvas-chats");
    let newChatButton = document.getElementById("new-chat-button");

    if (scrollPosition > 90) {
      if (scrollPosition > lastScrollTop) {
        newChatButton.style.opacity = "0";
        newChatButton.style.transform = "translateY(10px)";
        setTimeout(() => {
          newChatButton.style.display = "none";
        }, 300);
      } else {
        newChatButton.style.display = "flex";
        setTimeout(() => {
          newChatButton.style.opacity = "1";
          newChatButton.style.transform = "translateY(0px)";
        }, 300);
      }
    }

    lastScrollTop = scrollPosition;

    if (scrollPosition > 1) {
      var opacity = (scrollPosition - 20) / 50;
      header.style.backgroundColor = `rgba(255, 255, 255, ${opacity})`;
      header.style.padding = "15px 15px";
    } else {
      header.style.backgroundColor = "var(--cl-16)";
      header.style.padding = "30px 15px 0 15px";
    }

    if (scrollPosition > 105) {
      var opacity = (scrollPosition - 80) / 50;
      canvasChats.style.padding = "5px 0px 100px 0px";
      chatSorting.style.backgroundColor = `rgba(255, 255, 255, ${opacity})`;
      chatSorting.style.padding = "5px 15px 10px 15px";
      chatSorting.style.height = "41px";
      chatSortingButtons.forEach(function (button) {
        button.style.border = "1px solid var(--cl-33)";
      });
      chatSorting.style.minHeight = "41px";
    } else {
      canvasChats.style.padding = "20px 0px 100px 0px";
      chatSorting.style.backgroundColor = "var(--cl-16)";
      chatSorting.style.padding = "0 15px 30px 15px";
      chatSortingButtons.forEach(function (button) {
        button.style.border = "1px solid var(--cl-16)";
      });
      chatSorting.style.minHeight = "26px";
    }
  } else {
    console.log("Chat off: " + activePanel);
  }
});
