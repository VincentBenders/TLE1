<?php
session_start();
/** @var mysqli $db */

//if (!isset($_SESSION['user'])) {
//    header('Location: register.php');
//}

require_once "includes/database.php";


$animalId = mysqli_escape_string($db, $_GET['id']);

$query = "SELECT * FROM objects WHERE id = $objectId";

$result = mysqli_query($db, $query) or die('Error ' . mysqli_error($db) . ' with query ' . $query);

$object = mysqli_fetch_assoc($result);

$errorName = '';
$errorDescription = '';
$errorFile = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $errorName = 'Name cannot be empty';
    }

    if (empty($_POST['description'])) {
        $errorDescription = 'Description cannot be empty';
    }

    if (empty($_POST['image'])) {
        $errorGroup = 'image cannot be empty';
    }


    if (empty($errorName) && empty($errorDescription) && empty($errorFile)) {
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $image = mysqli_real_escape_string($db, $_POST['image']);
        $user_id = $_SESSION['user_id'];

        $query = "UPDATE objects 
            SET name = '$name', description = '$description', image = '$image' WHERE id = $objectId";

        $result = mysqli_query($db, $query) or die('Error ' . mysqli_error($db) . ' with query ' . $query);

        if ($result) {
            header('Location: index.php');
            exit();
        } else {
            echo 'Error: ' . mysqli_error($db);
        }
    }
}

mysqli_close($db);
?>

    <!doctype html>
    <html lang="en">
    <head>
        <title>Edit animal data</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    </head>
    <body>
    <div class="container px-4">

        <section class="columns is-centered">
            <div class="column is-10">
                <h2 class="title mt-4">Edit animal data: <?= htmlentities($object['name']) ?></h2>

                <form class="column is-6" action="" method="post">

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label" for="name">Name</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input class="input" id="name" type="text" name="name" value="<?php echo htmlentities($object['name']) ?>"/>
                                </div>
                                <p class="help is-danger">
                                    <?php echo isset($errorName) ? $errorName : ''; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label" for="artist">Description</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input class="input" id="description" type="text" name="description" value="<?php echo htmlentities($object['description']) ?>"/>
                                </div>
                                <p class="help is-danger">
                                    <?php echo isset($errorDescription) ? $errorDescription : ''; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label" for="group">Image</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input class="input" id="file" type="file" name="image" value="<?php echo htmlentities($object['image']) ?>"/>
                                </div>
                                <p class="help is-danger">
                                    <?php echo isset($errorFile) ? $errorFile : ''; ?>
                                </p>
                            </div>
                        </div>
                    </div>


                    <input type="hidden" id="id" class="id" name="id" value="<?php echo htmlentities($objectId) ?>">

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
<?php
