//Wait for the page to load before doing anything
window.addEventListener('load', init);

//Global variables
let fileNameContainer;
let pencilIcon;

//Initializing function
function init() {

    //Get all the DOM elements we need
    fileNameContainer = document.getElementById('uploadedFileNameContainer');
    pencilIcon = document.getElementById('pencilIcon');

    //Add an event listener to the file upload input element
    document.querySelector('input[type=file]').addEventListener('change', showFileName);

}


//Functions

//Displays the name of the file on the page and changes some styling
function showFileName(e) {

    if (e.target.files[0]) {
        //If a file was uploaded
        //Put the name in the container
        fileNameContainer.innerText = e.target.files[0].name;

        //Change the pencil icon's color to green
        pencilIcon.classList.replace('grey', 'green');

    } else {
        //If no file was uploaded or the file was removed
        //Empty out the name container
        fileNameContainer.innerText = '';

        //Change the pencil icon's color to grey
        pencilIcon.classList.replace('green', 'grey');
    }

}