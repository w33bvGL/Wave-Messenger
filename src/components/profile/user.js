function setUserAvatar() {
  const userImage = document.getElementById("my-user-image-path");
  let request = window.indexedDB.open("userData", 1);

  request.onerror = function () {
    console.error("IndexedDB error:", request.error);
  };

  request.onsuccess = function (event) {
    const db = event.target.result;
    const transaction = db.transaction(["avatar"], "readonly");

    const objectStore = transaction.objectStore("avatar");
    const getImageRequest = objectStore.get("userAvatar");

    getImageRequest.onerror = function () {
      console.log("No avatar found in IndexedDB, fetching...");
      fetchAndSaveImage(userImage);
    };

    getImageRequest.onsuccess = function (event) {
      const imageBlob = event.target.result;
      if (imageBlob) {
        console.log("image have in indexDB go!");
        displayImage(userImage, imageBlob);
      } else {
        console.log("no image in indexDb create one");
        fetchAndSaveImage(userImage);
      }
    };
  };
}

function displayImage(userImage, imageBlob) {
  const imageUrl = URL.createObjectURL(imageBlob);
  userImage.src = imageUrl;
  console.log(imageUrl);
}

function fetchAndSaveImage(userImage) {
  fetch("_inc/_user/setUserAvatar.php")
    .then(function (response) {
      if (!response.ok) {
        console.log("Avatar fetch error!");
        throw new Error("Avatar fetch error");
      }
      console.log("always fetching!!!");
      return response.blob();
    })
    .then(function (blob) {
      console.log("always fetching!!!");
      displayImage(userImage, blob);
      saveImageToIndexedDB(blob);
      console.log(blob);
    })
    .catch(function (error) {
      console.error("Fetch error:", error);
    });
}

function saveImageToIndexedDB(blob) {
  const request = window.indexedDB.open("userData", 1);

  request.onsuccess = function (event) {
    const db = event.target.result;
    const transaction = db.transaction(["avatar"], "readwrite");
    const objectStore = transaction.objectStore("avatar");
    objectStore.put(blob, "userAvatar");
  };
}

