const searchPanel = document.getElementById("search-panel");
const searchInput = document.getElementById("search-input");

function animateSearchPanel(element, targetOpacity, duration) {
  const startTime = performance.now();
  const startOpacity = parseFloat(element.style.opacity) || 0;

  function updateAnimateSearchPanel(currentTime) {
    const elapsedTime = currentTime - startTime;
    const progress = Math.min(elapsedTime / duration, 1);
    const newOpacity = startOpacity + (targetOpacity - startOpacity) * progress;
    element.style.opacity = newOpacity;

    if (progress < 1) {
      requestAnimationFrame(updateAnimateSearchPanel);
    }
  }

  requestAnimationFrame(updateAnimateSearchPanel);
}

function openSearch() {
  searchPanel.style.display = "flex";
  animateSearchPanel(searchPanel, 1, 0.2);
  searchInput.focus();
}

function closeSearch() {
  animateSearchPanel(searchPanel, 0, 0.2);
  setTimeout(() => {
    searchPanel.style.display = "none";
  }, 200);
}
