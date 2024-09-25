const { log } = require("three/webgpu");

window.addEventListener('load', init);

const webserviceUrl = 'webservice/';
let loaderButton

function init(){
    loaderButton = 'button';
    loaderButton.addEventListener('click',)

    let container =  

}

function ajaxRequest(url, succesHandler){
    fetch(url)
    .then(res => res.json())
    .then(succesHandler)
    .catch(ajaxErrorHandler);
}

function showData(data){
    console.log(data);
    const list = document.createElement('ul');

}

function removeData(e){
    e.preventDefault();
    const link = document.querySelector(`a[data-item='${item}']`)
    if(link){

    }else{
        
    }
}

function ajaxErrorHandler(error){
    console.log(error);    
}