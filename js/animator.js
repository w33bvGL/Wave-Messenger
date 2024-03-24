async function removeAnimationClassesAsync(selector) {
  let element = document.querySelector(selector);
  element.classList.remove(
    "page-fade-in_right",
    "page-fade-out_right",
    "page-fade-in_left",
    "page-fade-out_left",
    "page-fade-in_top"
  );
}

async function addAnimationClass(selector, animationClass) {
  let element = document.querySelector(selector);
  element.classList.remove(
    "page-fade-in_right",
    "page-fade-out_right",
    "page-fade-in_left",
    "page-fade-out_left",
    "page-fade-in_top"
  );
  element.classList.add(animationClass);
}


async function applyAnimationAndStyles(animationClass) {
  return new Promise(async (resolve, reject) => {
    if (document.readyState === "complete") {
      await removeAnimationClassesAsync(".wrapper");
      await addAnimationClass(".wrapper", animationClass);
      // await applyStyles(".wrapper");
      resolve();
    } else {
      window.addEventListener("load", async function () {
        await removeAnimationClassesAsync(".wrapper");
        await addAnimationClass(".wrapper", animationClass);
        // await applyStyles(".wrapper");
        resolve();
      });
    }
  });
}

async function anulikAnimStart(selector, styles, animationClass) {
  async function applyStyles(selector) {
    let elements = document.querySelectorAll(selector);
    elements.forEach(function (element) {
      for (var style in styles) {
        element.style[style] = styles[style];
      }
    });
  }
  await addAnimationClass(selector, animationClass);
  // await applyStyles(selector);
}

let previousUrl = document.referrer;

async function ANULIK_START_INIT(animationPosition) {
  let styles = {}; 

  return new Promise((resolve, reject) => {
    if (
      window.performance &&
      performance.getEntriesByType &&
      performance.getEntriesByType("navigation").length > 0
    ) {
      let navigationType = performance.getEntriesByType("navigation")[0].type;
      let currentUrl = window.location.href;
      console.log(currentUrl + "  " + previousUrl);
      if (navigationType !== "reload" && currentUrl !== previousUrl) {
        setTimeout(async () => {
          await anulikAnimStart(".wrapper", styles, animationPosition);
          resolve();
        }, 500);
      } else {
        console.log("no have animations")
        let wrapperElement = document.querySelector(".wrapper");
        if (wrapperElement) {
          wrapperElement.style.display = "block";
          wrapperElement.style.opacity = "1";
        }
        resolve();
      }
    }
  });
}

document.addEventListener("DOMContentLoaded", async function () {
  let styles = {};

  var elements = document.querySelectorAll("[class~=anul-trigger]");

  elements.forEach(function (element) {
    var targetURL = element.getAttribute("href");
    if (targetURL) {
      element.onclick = async function (event) {
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
        await anulikAnimStart(".wrapper", styles, directionClass);
        setTimeout(function () {
          window.location.href = targetURL;
        }, 500);
      };
    }

    var onclickAttr = element.getAttribute("onclick");
    if (onclickAttr) {
      element.onclick = async function (event) {
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
        await anulikAnimStart(".wrapper", styles, directionClass);
        setTimeout(function () {
          eval(onclickAttr);
        }, 500);
      };
    }
  });

  document.querySelectorAll("form").forEach(function (form) {
    form.addEventListener("submit", async function (event) {
      event.preventDefault();
      await anulikAnimStart(".wrapper", styles, "page-fade-out_right");
      setTimeout(function () {
        form.submit();
      }, 1100);
    });
  });
});
