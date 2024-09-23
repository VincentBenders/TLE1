<?php

if (isset($_POST['submit'])) {

    $title = 'Delete Object';

    /** @var mysqli $db */

    $objectId = $_GET['id'];

    $db = \classes\Database::connect();

    $statement = $db->prepare('DELETE FROM objects WHERE id = :id');

    $statement->bindValue(':id', $objectId);

    $statement->execute();

    \classes\Database::disconnect();

    header('location:home');

    exit;

}



