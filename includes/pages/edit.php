<?php
//Always add the title of the page here
$title = 'Edit';

/** @var mysqli $db */

    $db = \classes\Database::connect();

$objectId = $_GET['id'];

$statement = $db->prepare('SELECT * FROM objects WHERE id = :id');

$statement->bindValue(':id', $objectId);

$statement->execute();

$objectData = $statement->fetch(PDO::FETCH_ASSOC);

$errorName = '';
$errorDescription = '';
$errorFile = '';


    if (isset($_POST['submit'])) {

        //Validate the input
        if (empty($_POST['name'])) {
            $validationErrors[] = 'Name cannot be empty!';
        }
        if (empty($_POST['description'])) {
            $validationErrors[] = 'Description cannot be empty!';
        }
        if (empty($_POST['file_path'])) {
            $validationErrors[] = 'Filepath cannot be empty!';
        }

        //If the form has been correctly filled in
        if (empty($validationErrors)) {

            //Package the posted data
            $newObject = [];

            $newObject['name'] = $_POST['name'];
            $newObject['description'] = $_POST['description'];
            $newObject['file_path'] = $_POST['file_path'];

            //Connect to the database
            $db = \classes\Database::connect();

            //Prepare the SQL query and statement
            $statement = $db->prepare('UPDATE objects SET name = :name, description = :description, file_path = :file_path WHERE id = :id');

            //Bind the values to the placeholders
            $statement->bindValue(':name', $newObject['name']);
            $statement->bindValue(':description', $newObject['description']);
            $statement->bindValue(':file_path', $newObject['file_path']);
            $statement->bindValue(':id', $objectId);


            //Perform the query on the database
            $statement->execute();

            //Disconnect from the database
            \classes\Database::disconnect();

            //Clear the post array
            $_POST = [];

            //Return the user to the same page with a success message
            header('location: create');
            $_SESSION['success'] = 'Successfully created object with the name ' . htmlentities($newObject['name']);
            exit;

        }

}
