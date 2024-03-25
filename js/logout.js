async function logOutSystem() {
  try {
    // remove cookies storage and indexeddb
    await deleteAllCookies();
    await deleteAllLocalStorageData();
    await deleteAllIndexedDBData();

    // goto logout.php
    const response = await fetch("_inc/logout.php");
    if (response.ok) {
      console.log("response log logout...");
      // helanq pa damam
      locateToWelcome();
    } else {
      console.error("Error to logout => ", response.status);
    }
  } catch (error) {
    console.error("Error request => ", error);
  }
}

function locateToWelcome() {
  window.location.href = "welcome.php";
}

function deleteAllCookies() {
  const cookies = document.cookie.split("; ");
  for (let i = 0; i < cookies.length; i++) {
    const cookie = cookies[i];
    const eqPos = cookie.indexOf("=");
    const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
    // de gna qo...
    document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
  }
}

function deleteAllLocalStorageData() {
  localStorage.clear();
}

async function deleteAllIndexedDBData() {
  const dbs = await window.indexedDB.databases();
  for (const dbInfo of dbs) {
    try {
      const connection = await window.indexedDB.open(dbInfo.name);
      connection.onerror = function (event) {
        console.error("Error to IndexedDb => ", event.target.error);
      };
      connection.onsuccess = function (event) {
        const db = event.target.result;
        const transaction = db.transaction(db.objectStoreNames, "readwrite");
        transaction.onerror = function (event) {
          console.error("Error to transaction => ", event.target.error);
        };
        for (const storeName of db.objectStoreNames) {
          transaction.objectStore(storeName).clear();
        }
        transaction.oncomplete = function () {
          console.log("Clearing completed for " + dbInfo.name);
          connection.close();
        };
      };
    } catch (error) {
      console.error("Error to open IndexedDb => ", error);
    }
  }
}
