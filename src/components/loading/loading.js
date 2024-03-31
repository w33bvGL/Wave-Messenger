document.addEventListener("DOMContentLoaded", function () {

  indexElement.style.overflow = 'hidden';

  setTimeout(function () {
      const loadingElement = document.querySelector(".loading");
      loadingElement.classList.add("hidden");

      setTimeout(function () {
          loadingElement.style.display = "none";
        
          indexElement.style.overflow = '';
      }, 100);
  }, 1000);
});
