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
        $validationErrors['name'] = 'Name cannot be empty!';
    }
    if (empty($_POST['description'])) {
        $validationErrors['description'] = 'Description cannot be empty!';
    }
    if (empty($_FILES['object']['type'])) {
        $validationErrors['object'] = 'You must upload an object file';
    } elseif (pathinfo($_FILES['object']['full_path'])['extension'] !== 'glb') {
        $validationErrors['object'] = 'The file must be a .glb file';
    }

    //If the form has been correctly filled in
    if (empty($validationErrors)) {

        //Package the posted data
        $newObject = [];

        $newObject['name'] = $_POST['name'];
        $newObject['description'] = $_POST['description'];
        $newObject['share'] = intval($_POST['share']);

        //Save the uploaded file
        if (!empty($_FILES['object'])) {
            $objectFile = new \classes\ObjectFile();
            $newObject['file_path'] = $objectFile->save($_FILES['object']);
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
        if ($statement->execute()) {
            //Clear the post array
            $_POST = [];

            //Disconnect from the database
            \classes\Database::disconnect();

            //Return the user to the same page with a success message
            header('location: create');
            $_SESSION['success'] = 'Successfully created object with the name ' . htmlentities($newObject['name']);

            exit;
        } else {

            $validationErrors['name'] = 'Something went wrong with sending the item to the database, please try again';

        //Disconnect from the database
        \classes\Database::disconnect();
        }


    }


}

