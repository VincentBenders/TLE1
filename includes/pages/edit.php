<?php
session_start();
/** @var mysqli $db */

//if (!isset($_SESSION['user'])) {
//    header('Location: register.php');
//}

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
