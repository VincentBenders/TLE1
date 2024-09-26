<?php

//Always remember to set the title
$title = 'Showcase';

//Check to see if the user is logged in
if (!isset($_SESSION['userId'])) {
    //If not, send them to the login page
    header('location: login');
    exit;
}

//Connect to the database
$db = \classes\Database::connect();

//Get all the public objects from the database
$objects = \classes\ReplicatorObject::getAllPublic($db);

//If the objects weren't able to get fetched, show an error
if (!$objects) {
    $objects = ['Error' => "The public objects couldn't be loaded! please try again later"];
}

//Finally, disconnect from the database
\classes\Database::disconnect();