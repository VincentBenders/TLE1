<?php

//Always remember to set the title
$title = 'home';

//Check if the user has logged in
if (!isset($_SESSION['userId'])) {
    //If not, send them to the login page
    header("Location: login");
    exit;
}

if (empty($_SESSION['image'])) {
    $profilePicturePath = BASE_PATH . 'includes/images/default-profile-picture.svg';
    $class = 'white';
} else {
    $profilePicturePath = BASE_PATH . 'includes/uploaded/images/' . $_SESSION['image'];
    $class = 'profilePicture';
}

