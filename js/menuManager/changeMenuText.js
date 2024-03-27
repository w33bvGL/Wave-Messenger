function changeMenuText(textPos) {
  menuText.forEach((text) => {
    text.style.color = "var(--cl-15)";
  });
  menuText[textPos].style.color = "var(--cl-26)";
}
