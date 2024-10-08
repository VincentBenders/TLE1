<?php

//Remember to add the title
$title = 'Create new tag';

//Check if the user has logged in
if (!isset($_SESSION['userId'])) {
    //If not, send them to the login page
    header("Location: login");
    exit;
}

//Create an empty array for storing any form input errors
$validationErrors = [];

//Once the form has been submitted
if (isset($_POST['submit'])) {

    //Validate the input
    //Check to make sure the name field isn't empty
    if (empty($_POST['name'])) {
        //If it is empty, add an error to the array
        $validationErrors[] = 'Name cannot be empty!';
    } else {
        //Check to see if another tag already has the same name
        $db = \classes\Database::connect();

        $statement = $db->prepare('SELECT name FROM tags WHERE name = :name');
        $statement->bindValue(':name', $_POST['name']);
        $statement->execute();

        if (!empty($statement->fetch(PDO::FETCH_ASSOC))) {
            //If there's already a tag with the same name, add an error to the list
            $validationErrors[] = "There's already a tag with that name in the database!";
        }

        \classes\Database::disconnect();

    }

    //If the form has been correctly filled in
    if (empty($validationErrors)) {

        //Package the posted data
        $newTag = [];

        $newTag['name'] = $_POST['name'];

        //Connect to the database
        $db = \classes\Database::connect();

        //Prepare the SQL query and statement
        //The :name is a placeholder, remember to add the ':' to indicate it's a placeholder
        //This is the PDO equivalent of mysql_escape_string() to prevent SQL injection
        $statement = $db->prepare('INSERT INTO tags (name) VALUES(:name)');

        //Bind the values to the placeholders
        $statement->bindValue(':name', $newTag['name']);

        //Perform the query on the database
        $statement->execute();

        //Disconnect from the database
        \classes\Database::disconnect();

        //Clear the post array
        $_POST = [];

        //Return the user to the same page with a success message
        header('location: tagCreate');
        $_SESSION['success'] = 'Successfully created tag with the name ' . htmlentities($newTag['name']);
        exit;

    }


}