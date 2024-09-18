<?php
// Start the session.
session_start();

// destroy the session.
session_destroy();

// Redirect to login page
header('location: index.php');

// Exit the code.
exit();
?>


