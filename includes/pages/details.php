<?php
//Always add the title of the page here
$title = 'Details';

/** @var mysqli $db */

    $db = \classes\Database::connect();

$objectId = $_GET['id'];

$statement = $db->prepare('SELECT * FROM objects WHERE id = :id');

$statement->bindValue(':id', $objectId);

$statement->execute();

$objectData = $statement->fetch(PDO::FETCH_ASSOC);

\classes\Database::disconnect();

