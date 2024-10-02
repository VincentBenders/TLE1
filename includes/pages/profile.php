
<?php

//Check if user is logged in
if (!isset($_SESSION['email'])) {
    //if not: redirect to login page
    header('location: login');
    exit;
}

//Changes the page title for proper grammar when using the user's first name
if (str_ends_with($_SESSION['name'], 's')) {
    $titleSuffix = "' profiel";
} else {
    $titleSuffix = "'s profiel";
}

if (empty($_SESSION['image'])) {
    $profilePicturePath = BASE_PATH . 'includes/images/default-profile-picture.svg';
    $class = 'white';
} else {
    $profilePicturePath = BASE_PATH . 'includes/uploaded/images/' . $_SESSION['image'];
    $class = 'profilePicture';
}

$title = $_SESSION['name'] . $titleSuffix;

$db = \classes\Database::connect();

$user = \classes\User::selectByEmail($db, $_SESSION['email']);


\classes\Database::disconnect();