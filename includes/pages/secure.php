<?php

//Always add the title of the page here
//Not sure if this page needs a title or not -Sander
$title = 'secure';

//May I visit this page? Check the SESSION
if (!isset($_SESSION['user'])) {
    // Redirect if not logged in
    header('Location: login.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}


//Get name from the SESSION
$name = $_SESSION['user']['name'];
?>