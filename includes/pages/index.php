<?php
session_start();

//beveilig tegen deeplinken
if (!isset($_SESSION['user'])) {
    header('Location: register.php');
}

/** @var array $animals */
/** @var array $db */
// Setup connection with database
require_once 'includes/database.php';

// Select all the animals from the database
$query = "SELECT * FROM animals";
$joinQuery = "SELECT animals.*, users.first_name FROM animals INNER JOIN users ON animals.user_id = users.id"

or die('Error '.mysqli_error($db).' with query '.$query);

$result = mysqli_query($db, $query);
$joinResult = mysqli_query($db, $joinQuery);

$animals = [];
while($animal = mysqli_fetch_assoc($joinResult)) {
    $animals[] = $animal;
}

mysqli_close($db);

?>