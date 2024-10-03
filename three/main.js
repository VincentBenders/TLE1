window.addEventListener("load", init);
//Globals
const apiUrl = "../api/index.php";
let itemData = {};

function init() {
    // getData(apiUrl, successHandler);
}

function getData(url, success) {
  fetch(url)
    .then((response) => {
      if (!response.ok) {
        throw new Error(response.statusText);
      }
      return response.json();
    })
    .then(success)
    .catch(errorHandler);
}

function successHandler(data) {
  for (let weapon of data) {
    let weaponurl =
      "../api/index.php?id=" + weapon.id;
    getData(weaponurl, weaponSuccessData);
  }
}

function errorHandler(error) {
  console.log(error);
  const errordiv = document.createElement("div");
  errordiv.classList.add("error");
  errordiv.innerText = "data not available";
}

function weaponSuccessData(data) {
    console.log(data,"WEAPONSUCCES")
}

