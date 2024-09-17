<?php
session_start();

//beveilig tegen deeplinken
//if (!isset($_SESSION['user'])) {
//    header('Location: register.php');
//}

// $db bestaat al
/** @var mysqli $db */

// Maak verbinding met de Database
require_once 'includes/database.php';

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
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>Replicator on the weblicator</title>
</head>
<body>
<div class="container px-4">

    <section class="columns is-centered">
        <div class="column is-10">
            <h2 class="title mt-4">Create new object</h2>

            <form class="column is-6" action="" method="post">

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="name">Name</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" id="name" type="text" name="name" value=""/>
                            </div>
                            <p class="help is-danger">
                                <?php echo htmlentities($errorName) ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="species">Species</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" id="description" type="text" name="description" value=""/>
                            </div>
                            <p class="help is-danger">
                                <?php echo htmlentities($errorDescription) ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="group">Group</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" id="file" type="file" name="image" value=""/>
                            </div>
                            <p class="help is-danger">
                                <?php echo htmlentities($errorFile) ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal"></div>
                    <div class="field-body">
                        <button class="button is-link is-fullwidth" type="submit" name="submit">Save</button>
                    </div>
                </div>
            </form>

            <a class="button mt-4" href="index.php">&laquo; Go back to the list</a>
        </div>
    </section>
</div>
</body>
</html>
