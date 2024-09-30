//Wait for the page to fully load before doing things with javascript
window.addEventListener('load', init);

//Global variables
let objectContainer;

//The function to run when the page has loaded
function init() {

    objectContainer = document.getElementById('objectContainer');
    objectContainer.addEventListener('click', objectClickHandler);

    //Turn all the objects into articles and add them to the document
    showObjects();

}

//Functions

//Creates DOM elements for each object and adds them to the main page
function showObjects() {

    for (const Object of Objects) {

        //Create all the elements and add relevant text
        let article = document.createElement('article');
        article.dataset.objectId = Object.id;
        article.classList.add('listObject');

        let image = document.createElement('img');
        image.src = (BASE_PATH + 'includes/images/star-icon.svg');
        image.classList.add('listImg');

        let nameElement = document.createElement('h3');
        nameElement.innerText = Object.name;

        // Create buttons instead of <p> for description and user_name
        let descriptionButton = document.createElement('button');
        descriptionButton.innerText = "Details";
        descriptionButton.classList.add('detailsButton');
        descriptionButton.dataset.objectId = Object.id; // Assign object ID

        let userNameButton = document.createElement('button');
        userNameButton.innerText = "Edit";
        userNameButton.classList.add('editButton');
        userNameButton.dataset.objectId = Object.id; // Assign object ID

        let deleteButton = document.createElement('button');
        deleteButton.innerText = "Delete";
        deleteButton.classList.add('deleteButton');
        deleteButton.dataset.objectId = Object.id; // Assign object ID

        //If the user has the object's id in their localstorage, add styling to indicate this
        if (localStorage.getItem(Object.id)) {
            image.classList.add('favorite');
            article.classList.add('favorite');
        }

        //Append all the elements in order to the article element
        article.appendChild(image);
        article.appendChild(nameElement);
        article.appendChild(descriptionButton);
        article.appendChild(userNameButton);
        article.appendChild(deleteButton);

        //Finally add the article to the page
        objectContainer.appendChild(article);

    }

}

//Handle all click events that happen in the object container
function objectClickHandler(e) {

    //Put the tag name in a variable for ease of use
    let tagName = e.target.tagName;

    //Create some empty variables that we'll fill in the following switch statement
    let id;
    let action;

    switch (tagName) {
        case 'ARTICLE': id = e.target.dataset.objectId; action = 'details'; break;
        case 'H3': id = e.target.parentElement.dataset.objectId; action = 'details'; break;
        case 'IMG': id = e.target.parentElement.dataset.objectId; action = 'favorite'; break;
        case 'BUTTON':
            id = e.target.dataset.objectId;
            if (e.target.classList.contains('detailsButton')) {
                action = 'details';
            } else if (e.target.classList.contains('editButton')) {
                action = 'edit';
            }
            else if (e.target.classList.contains('deleteButton')) {
                action = 'delete'
            }
            break;
        default: return;
    }

    //Depending on the action, do something
    switch (action) {
        case 'details': redirectToDetails(id); break;
        case 'favorite': toggleFavorite(id); break;
        case 'edit': redirectToEdit(id); break;
        case 'delete': redirectToDelete(id); break;
    }

}

//Go to the details page
function redirectToDetails(id) {
    window.location.href = (BASE_PATH + 'details?id=' + id);
}

//Go to the edit page
function redirectToEdit(id) {
    window.location.href = (BASE_PATH + 'edit?id=' + id);
}

function redirectToDelete(id) {
    window.location.href = (BASE_PATH + 'delete?id=' + id);
}

//Toggles favorite class and updates the localstorage
function toggleFavorite(id) {

    //Update the localstorage
    if (localStorage.getItem(id)) {
        //If the key does exist in the localstorage, remove it
        localStorage.removeItem(id);
    } else {
        //If the key does not exist, add it
        localStorage.setItem(id, 'favorite');
    }

    //Toggle the favorite class on the article element
    let article = document.querySelector(`article[data-object-id='${id}']`);
    article.classList.toggle('favorite');

    //Also toggle it on the svg image, which should be the first child
    article.children.item(0).classList.toggle('favorite');

}
