<?php

//Remember to add the title
$title = 'Create new object';

//Check if the user has logged in
if (!isset($_SESSION['userId'])) {
    //If not, send them to the login page
    header("Location: login");
    exit;
}


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
    if (empty($_FILES['object']['type'])) {
        $validationErrors[] = 'You must upload an object file';
    }

    //If the form has been correctly filled in
    if (empty($validationErrors)) {

        //Package the posted data
        $newObject = [];

        $newObject['name'] = $_POST['name'];
        $newObject['description'] = $_POST['description'];
        $newObject['share'] = intval($_POST['share']);

        //Save the uploaded file
        // TODO: Change this from an image to a .obj file

    if (!empty($_FILES['object'])) {
        $image = new \classes\Image();
        $newObject['file_path'] = $image->save($_FILES['object']);
    }


        //Connect to the database
        $db = \classes\Database::connect();

        //Prepare the SQL query and statement
        $statement = $db->prepare('INSERT INTO objects (user_id, name, description, file_path, share) VALUES(:user_id, :name, :description, :file_path, :share)');

        //Bind the values to the placeholders
        $statement->bindValue(':user_id', $_SESSION['userId']);
        $statement->bindValue(':name', $newObject['name']);
        $statement->bindValue(':description', $newObject['description']);
        $statement->bindValue(':file_path', $newObject['file_path']);
        $statement->bindValue(':share', $newObject['share']);


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

