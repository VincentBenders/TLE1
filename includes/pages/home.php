<?php

//Always remember to set the title
$title = 'home';

//Check if the user has logged in
if (!isset($_SESSION['userId'])) {
    //If not, send them to the login page
    header("Location: login");
    exit;
}

