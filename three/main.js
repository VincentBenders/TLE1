window.addEventListener("load", init);
//Globals
const apiUrl = "http://localhost/programmeren3/soulsmagazine/index.php";

function init() {
  getData(apiUrl, successHandler);
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

function weaponSuccessData(data) {
  
}


function errorHandler(error) {
  console.log(error);
  const errordiv = document.createElement("div");
  errordiv.classList.add("error");
  errordiv.innerText = "data not available";
  document.body.before(errordiv);
}
