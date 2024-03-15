const searchPanel = document.getElementById("search-panel");
const searchInput = document.getElementById("search-input");

function openSearch() {
  searchPanel.style.display = "flex";
  setTimeout(() => {
    searchPanel.style.opacity = "1";
  }, 10);
  searchInput.focus();
}

function closeSearch() {
  searchPanel.style.opacity = "0";
  setTimeout(() => {
    searchPanel.style.display = "none";
  }, 200);
}



