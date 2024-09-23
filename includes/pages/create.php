// File upload fixen
<?php

/** @var mysqli $db */
//Remember to add the title
$title = 'Create new object';

$validationErrors = [];

//Once the form has been submitted
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
        $statement = $db->prepare('INSERT INTO objects (user_id, name, description, file_path, share) VALUES(1, :name, :description, :file_path, 1)');

        //Bind the values to the placeholders
        $statement->bindValue(':name', $newObject['name']);
        $statement->bindValue(':description', $newObject['description']);
        $statement->bindValue(':file_path', $newObject['file_path']);


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

