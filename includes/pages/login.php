<?php

$title = 'log in';

use classes\User;
use classes\Database;

//Check if already logged in
if (isset($_SESSION['userId'])) {
    // Redirect to home page
    header('Location: home');
    exit; // Prevent further code execution
}

$errors = [];

// Check if form has been submitted
if (isset($_POST['submit'])) {
    // Validate email
    if (!empty($_POST['email'])) {
        if (strpos($_POST['email'], '@') === false) {
            $errors['email'] = 'Email moet een @ bevatten.';
        }
    } else {
        $errors['email'] = 'Email mag niet leeg zijn.';
    }

    // Validate password
    if (empty($_POST['password'])) {
        $errors['password'] = 'Wachtwoord mag niet leeg zijn.';
    }

    // Check if there are no validation errors
    if (empty($errors)) {
        // Connect to the database
        $db = Database::connect();

        // Check if the email exists in the database
        $user = User::selectByEmail($db, $_POST['email']);
        if (!$user) {
            // Add error if email not found
            $errors[] = 'Gebruiker niet gevonden, probeer het opnieuw.';
        } else {
            // Verify password
            if (password_verify($_POST['password'], $user['password'])) {
                // Set session variables
                $_SESSION['email'] = $user['email'];
                $_SESSION['userId'] = $user['id'];
                $_SESSION['name'] = $user['name'];

                // Handle profile image
                //if (file_exists('includes/images/uploaded/' . $user['profile_image_path'])) {
                  //  $_SESSION['image'] = $user['profile_image_path'];
                //} else {
                    // Update image if not found (if needed)
                   // User::updateImage($db, $user['id']);
               // }

                // Redirect to home page
                header('Location: home');
                exit; // Prevent further code execution
            } else {
                // Add error if password is incorrect
                $errors[] = 'Onjuiste inloggegevens, probeer het opnieuw.';
            }
        }

        // Disconnect from database
        Database::disconnect();
    }
}