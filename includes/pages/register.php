<?php

$title = 'register';

//Check if the user is already logged in
if (isset($_SESSION['userId'])) {
    //if so, send them back to home
    header('location: home');
    exit;
}

// Als de submit-knop is ingedrukt
if (isset($_POST['submit'])) {

    // Verbinding maken met de database
    $db = classes\Database::connect();

    // Server-side validatie
    $errors = [];

    // Controleer of de volledige naam is ingevuld
    if (empty($_POST['name'])) {
        $errors['name'] = 'Naam mag niet leeg zijn.';
    }

    // Validatie voor e-mail
    if (!empty($_POST['email'])) {
        if (strpos($_POST['email'], '@') === false) {
            $errors['email'] = 'Email moet een @ bevatten.';
        }
    } else {
        $errors['email'] = 'Email mag niet leeg zijn.';
    }

    // Validatie voor wachtwoord
    if (empty($_POST['password'])) {
        $errors['password'] = 'Wachtwoord mag niet leeg zijn.';
    }

    // Controleer of de e-mail al in gebruik is
    else if (classes\User::selectByEmail($db, $_POST['email'])) {
        $errors['email'] = 'Email is al in gebruik.';
    }

    // Validatie voor wachtwoord herhaling
    if (empty($_POST['passwordConfirm'])) {
        $errors['passwordConfirm'] = 'Herhaal je wachtwoord';
    } else if ($_POST['password'] !== $_POST['passwordConfirm']) {
        $errors['passwordConfirm'] = 'Wachtwoord niet goed herhaald';
    }

    // Validatie voor profielfoto
    if (!empty($_FILES['image']['type'])) {
        if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg') {
            $errors[] = 'Foto moet van het type PNG of JPG zijn';
        }

        if ($_FILES['image']['size'] > 1000000) {
            $errors[] = 'Foto bestand is te groot';
        }
    }

    // Als er geen fouten zijn
    if (empty($errors)) {
        $image = new \classes\Image();

        // Gebruikersgegevens opslaan in een array
        $user = [
            'name' => $_POST['name'], // Volledige naam
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'profile_image_path' => !empty($_FILES['image']['name']) ? $image->save($_FILES['image']) : ''
        ];

        // Voeg de nieuwe gebruiker toe aan de database
        if (classes\User::createNew($user, $db)) {
            // Sluit de databaseverbinding
            classes\Database::disconnect();

            // Redirect naar de login pagina
            header('location: login');
            $_SESSION['success'] = 'Account is succesvol aangemaakt.';
            exit;
        } else {
            $errors[] = 'Er is iets mis gegaan met het opslaan van de gegevens, probeer het nog een keer.';
        }
    }

    // Sluit de databaseverbinding
    classes\Database::disconnect();
}
