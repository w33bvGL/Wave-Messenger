function changeMenuIcon(itemPos) {
  menuIcons.forEach((icon) => {
    icon.style.color = "var(--cl-15)";
  });
  menuIcons[itemPos].style.color = "var(--cl-26)";
}
