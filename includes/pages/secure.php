<?php
session_start();

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