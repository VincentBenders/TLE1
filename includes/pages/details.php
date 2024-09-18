<?php
session_start();
/** @var mysqli $db */

//beveilig tegen deeplinken
//if (!isset($_SESSION['user'])) {
//    header('Location: register.php');
//}
//beveiliging tegen sql injections.
$objectId = mysqli_escape_string($db,$_GET['id']);

$query = "SELECT * FROM objects WHERE id = $objectId";

$result = mysqli_query($db, $query) or die('Error ' . mysqli_error($db) . ' with query ' . $query);

$object = mysqli_fetch_assoc($result);

mysqli_close($db);

?>