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

$validationErrors = [];

// Check if form has been submitted
if (isset($_POST['submit'])) {
    // Validate email
    if (!empty($_POST['email'])) {
        if (!str_contains($_POST['email'], '@')) {
            $validationErrors['email'] = 'Email moet een @ bevatten.';
        }
    } else {
        $validationErrors['email'] = 'Email mag niet leeg zijn.';
    }

    // Validate password
    if (empty($_POST['password'])) {
        $validationErrors['password'] = 'Wachtwoord mag niet leeg zijn.';
    }

    // Check if there are no validation errors
    if (empty($validationErrors)) {
        // Connect to the database
        $db = Database::connect();

        // Check if the email exists in the database
        $user = User::selectByEmail($db, $_POST['email']);
        if (!$user) {
            // Add error if email not found
            $validationErrors['email'] = 'Gebruiker niet gevonden, probeer het opnieuw.';
        } else {
            // Verify password
            if (password_verify($_POST['password'], $user['password'])) {
                // Set session variables
                $_SESSION['email'] = $user['email'];
                $_SESSION['userId'] = $user['id'];
                $_SESSION['name'] = $user['name'];

                //Handle profile image
                $imagePath = 'includes/uploaded/images/' . $user['profile_image_path'];
                if (file_exists($imagePath)) {
                    $_SESSION['image'] = $user['profile_image_path'];
//                } else {
//                    //Update image if not found (if needed)
//                    User::updateImage($db, $user['id']);
                }

                // Redirect to home page
                header('Location: home');
                exit; // Prevent further code execution
            } else {
                // Add error if password is incorrect
                $validationErrors['email'] = 'Onjuiste inloggegevens, probeer het opnieuw.';
            }
        }

        // Disconnect from database
        Database::disconnect();
    }
}