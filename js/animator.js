var previousUrl = document.referrer;

function anulikAnimStart(selector, styles, animationClass) {
  function applyStyles() {
    let elements = document.querySelectorAll(selector);

    elements.forEach(function (element) {
      for (var style in styles) {
        element.style[style] = styles[style];
      }
    });
  }

  function addAnimationClass(animationClass) {
    document.querySelector(selector).classList.add(animationClass);
  }

  function removeAnimationClasses() {
    var elements = document.querySelectorAll(selector);
    elements.forEach(function (element) {
      element.classList.remove(
        "page-fade-in_right",
        "page-fade-out_right",
        "page-fade-in_left",
        "page-fade-out_left",
        "page-fade-in_top"
      );
    });
  }

  function applyAnimationAndStyles() {
    if (document.readyState === "complete") {
      removeAnimationClasses();
      addAnimationClass(animationClass);
      applyStyles();
    } else {
      window.addEventListener("load", function () {
        removeAnimationClasses();
        addAnimationClass(animationClass);
        applyStyles();
      });
    }
  }

  applyAnimationAndStyles();
}

function ANULIK_START_INIT(animationPosition) {
  if (
    window.performance &&
    performance.getEntriesByType &&
    performance.getEntriesByType("navigation").length > 0
  ) {
    let navigationType = performance.getEntriesByType("navigation")[0].type;
    let currentUrl = window.location.href;
    console.log(currentUrl + "  " + previousUrl);
    if (navigationType !== "reload" && currentUrl !== previousUrl) {
      setTimeout(() => {
        anulikAnimStart(".wrapper", styles, animationPosition);
      }, 500);
      
    } else {
      let wrapperElement = document.querySelector(".wrapper");
      if (wrapperElement) {
        wrapperElement.style.display = "block";
        wrapperElement.style.opacity = "1";
      }
    }
  }
}

document.addEventListener("DOMContentLoaded", function () {
  var elements = document.querySelectorAll("[class~=anul-trigger]");

  elements.forEach(function (element) {
    var targetURL = element.getAttribute("href");
    if (targetURL) {
      element.onclick = function (event) {
        event.preventDefault();
        let directionClass;
        if (element.classList.contains("slide-left")) {
          directionClass = "page-fade-out_right";
        } else if (element.classList.contains("slide-right")) {
          directionClass = "page-fade-out_left";
        } else {
          console.error("pls add button or link direction class");
        }
        console.log(directionClass);
        anulikAnimStart(".wrapper", styles, directionClass);
        setTimeout(function () {
          window.location.href = targetURL;
        }, 1000);
      };
    }

    var onclickAttr = element.getAttribute("onclick");
    if (onclickAttr) {
      element.onclick = function (event) {
        event.preventDefault();
        let directionClass;
        if (element.classList.contains("slide-left")) {
          directionClass = "page-fade-out_right";
        } else if (element.classList.contains("slide-right")) {
          directionClass = "page-fade-out_left";
        } else {
          console.error("pls add button or link direction class");
        }
        console.log(directionClass);
        anulikAnimStart(".wrapper", styles, directionClass);
        setTimeout(function () {
          eval(onclickAttr);
        }, 1000);
      };
    }
  });

  document.querySelectorAll("form").forEach(function (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      var currentForm = this;
      anulikAnimStart(".wrapper", styles, "page-fade-out_right");
      setTimeout(function () {
        currentForm.submit();
      }, 1100);
    });
  });
});



var styles = {
  
};
