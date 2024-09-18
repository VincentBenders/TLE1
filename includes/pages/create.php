<?php

//Always add the title of the page here
$title = 'Replicator on the weblicator';

//beveilig tegen deeplinken
//if (!isset($_SESSION['user'])) {
//    header('Location: register.php');
//}

// $db bestaat al
/** @var mysqli $db */


// Maak variabelen voor alle Error Messages
$errorName = '';
$errorDescription = '';
$errorFile = '';

// Is de Form correct ingevuld?
if (
    isset($_POST['name'], $_POST['description'], $_POST['file'])
) {
    // Zo nee, stuur een Error Message naar het betreffende veld
    if (empty($_POST['name'])) {
        $errorName = 'Name cannot be empty';
    }

    if (empty($_POST['description'])) {
        $errorDescription = 'description cannot be empty';
    }

    if (empty($_POST['file'])) {
        $errorFile = 'file cannot be empty';
    }

    //Maak variabelen voor de eigenschappen van de animal aan
    if (empty($errorName) && empty($errorSpecies) && empty($errorGroup)) {
        $name = mysqli_escape_string($db, $_POST ['name']);
        $description = mysqli_escape_string($db, $_POST['description']);
        //deze moet nog uitgezocht worden.
        $image = mysqli_escape_string($db, $_POST['file']);
        $user_id = $_SESSION['user_id'];

        // Schrijf een Query om het album toe te voegen
        $query = "INSERT INTO objects (name, description, image, user_id)
                    VALUES ('$name', '$description', '$image', '$user_id')";

        // Voer de Query uit
        $result = mysqli_query($db, $query);

        // Terug naar indexpagina
        if ($result) {
            header('Location: index.php');
            exit();
            // Echo eventuele Errors
        } else {
            echo 'Error: ' . mysqli_error($db);
        }
    }
}

