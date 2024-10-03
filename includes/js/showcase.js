//Wait for the page to fully load before doing things with javascript
window.addEventListener('load', init);

//Global variables
let objectContainer;
let scrollWheel
let ticking = false;
let scrollTimeout;
let publicObjects;
let BASE_PATH;

//The function to run when the page has loaded
function init() {

    publicObjects = JSON.parse(document.getElementById('fakeJson').innerText);
    BASE_PATH = document.getElementById('basePath').innerText;

    objectContainer = document.getElementById('objectContainer');
    objectContainer.addEventListener('click', objectClickHandler);
    scrollWheel = document.getElementById('scrollWheel')
    objectContainer.addEventListener('scroll', objectContainerScrollHandler);
    //Turn all the public objects into articles and add them to the document
    showPublicObjects();

}

//Functions

//Creates DOM elements for each public object and adds them to the main page
function showPublicObjects() {

    for (const publicObject of publicObjects) {

        //Create all the elements and add relevant text
        let article = document.createElement('article');
        article.dataset.objectId = publicObject.id;
        article.classList.add('listObject');

        let image = document.createElement('img');
        image.src = (BASE_PATH + 'includes/images/star-icon.svg');
        image.classList.add('listImg');

        let nameElement = document.createElement('h3');
        nameElement.innerText = publicObject.name;

        let descriptionElement = document.createElement('p');
        descriptionElement.innerText = publicObject.description;

        let userNameElement = document.createElement('p');
        userNameElement.innerText = publicObject.user_name;

        //If the user has the object's id in their localstorage, add styling to indicate this
        if (localStorage.getItem(publicObject.id)) {
            image.classList.add('favorite');
            article.classList.add('favorite');
        }

        //Append all the elements in order to the article element
        article.appendChild(image);
        article.appendChild(nameElement);
        article.appendChild(descriptionElement);
        article.appendChild(userNameElement);

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
        case 'H3':
        case 'P': id = e.target.parentElement.dataset.objectId;  action = 'details'; break;
        case 'IMG': id = e.target.parentElement.dataset.objectId; action = 'favorite'; break;
        default: return;
    }

    //Depending on the action, do something
    switch (action) {
        case 'details': redirectToDetails(id); break;
        case 'favorite': toggleFavorite(id); break;
    }

}

function objectContainerScrollHandler() {
    const scrollTop = objectContainer.scrollTop;
    const containerHeight = objectContainer.scrollHeight - objectContainer.clientHeight;

    if (!ticking) {
        window.requestAnimationFrame(() => {
            updateScrollWheel(scrollTop, containerHeight);
            ticking = false;
        });
        ticking = true;
    }

    // Optional: revert after scroll stops
    if (scrollTimeout) {
        clearTimeout(scrollTimeout);
    }
    scrollTimeout = setTimeout(stopScrolling, 150);
}

function updateScrollWheel(scrollPos, containerHeight) {
    const scrollPercentage = (scrollPos / containerHeight) * 100;

    // Move the scrollWheel along the right edge of the container
    scrollWheel.style.top = `${scrollPercentage}%`; // Vertical movement
    scrollWheel.style.backgroundColor = 'darkgreen'; // Feedback during scrolling
}

function stopScrolling() {
    scrollWheel.style.backgroundColor = 'var(--green)'; // Reset when scrolling stops
}

//Go to the details page
function redirectToDetails(id) {

    window.location.href = (BASE_PATH + 'details?id=' + id);

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