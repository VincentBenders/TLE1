<?php
session_start();
/** @var mysqli $db */

require_once "includes/database.php";

if (isset($_GET['id'])) {
    $objectId = $_GET['id'];

    $query = "DELETE FROM objects WHERE id = $objectId";

    $result = mysqli_query($db, $query);

    if ($result) {
        header('Location: index.php');
        exit();
    } else {
        echo 'Error: ' . mysqli_error($db);
    }
} else {
    echo 'Invalid object ID';
}

mysqli_close($db);
?>
