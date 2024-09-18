<?php

//Always add the title of the page here
$title = 'Logout';

// destroy the session.
session_destroy();

// Redirect to login page
header('location: index.php');

// Exit the code.
exit();


