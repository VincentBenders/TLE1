window.addEventListener('load', init)

//globals
let section;
let dataset;

function init() {

    fetchObjects();

}

function loadObjects(data) {
    // Display the object details in the details page

    console.log(data);

    section = document.querySelector("section");

    for(object of data) {

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

            fetchDetails(object.id);

        });

        section.appendChild(div);

    }



}

function loadObjectDetails(data) {
    console.log(data);

    // Clear the section element
    section.innerHTML = '';

    // Create a new div element to display the object details
    let div = document.createElement("div");
    let h2 = document.createElement("h2");
    let description = document.createElement("p");
    let image = document.createElement("img");
    let p = document.createElement("p");

    h2.innerHTML = data.name;
    description.innerHTML = data.description;
    image.src = data.file_path;
    p.innerHTML = `made by user: ${data.user_id}`;

    div.appendChild(h2);
    div.appendChild(description)
    div.appendChild(image);
    div.appendChild(p);

    // Append the div element to the section element
    section.appendChild(div);
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