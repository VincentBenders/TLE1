window.addEventListener('load', init)

//globals
let sectionTop;
let previewLink;

function init() {

    sectionTop = document.getElementById('detailsTop');
    previewLink = document.getElementById('preview');

    let id = window.location.href.split('?id=')[1];

    fetchDetails(id);

}

function loadObjects(data) {
    // Display the object details in the details page

    for (let object of data) {

        let div = document.createElement("div");
        let h2 = document.createElement("h2");
        let description = document.createElement("p");
        let link = document.createElement("a");
        let p = document.createElement("p");

        h2.innerHTML = object.name;
        description.innerHTML = object.description;
        link.innerHTML = `view: ${object.name}`;
        p.innerHTML = `made by user: ${object.user_id}`;
        div.appendChild(h2);
        div.appendChild(description)
        div.appendChild(link);
        div.appendChild(p);

        // Add an event listener to the link element

        link.addEventListener('click', () => {

            section.innerHTML = '';
            fetchDetails(object.id);

        });

        section.appendChild(div);

    }


}

function loadObjectDetails(data) {

    // Create a new div element to display the object details

    let name = document.createElement("h1");
    let description = document.createElement("p");
    let credits = document.createElement("p");
    let shareLevel = document.createElement('div');
    let shareText = document.createElement('h3');
    let shareDescription = document.createElement('p');

    name.innerHTML = data.name;
    description.innerHTML = data.description;
    credits.innerHTML = `made by user: ${data.user_id}`;
    shareLevel.id = 'shareLevel';
    shareText.innerText = 'Share level';

    if (data.share === 1) {
        shareDescription.innerText = 'Public';
    } else {
        shareDescription.innerText = 'Private';
    }

    // Append the div element to the section element
    shareLevel.appendChild(shareText);
    shareLevel.appendChild(shareDescription);

    sectionTop.appendChild(name);
    sectionTop.appendChild(description);
    sectionTop.appendChild(credits);
    sectionTop.appendChild(shareLevel);

    previewLink.href += data.id.toString();

}

function fetchObjects() {
    // Fetch the objects from the api endpoint
    fetch(`api`)
        .then(response => response.json())
        .then(data => {
            loadObjects(data)
        });
}

function fetchDetails(id) {
    // Fetch the object details from the api endpoint
    fetch(`api?id=${id}`)
        .then(response => response.json())
        .then(data => {
            loadObjectDetails(data)
        });
}