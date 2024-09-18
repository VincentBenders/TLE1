<?php

//Always add the title of the page here
$title = 'Register';

if(isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "includes/database.php";

    // Get form data
    $firstName = mysqli_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_escape_string($db, $_POST['lastName']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = mysqli_escape_string($db, $_POST['password']);
    $hashed = password_hash($password,PASSWORD_DEFAULT);

    // Server-side validation
    $errors = [];
    if ($firstName == "") {
        $errors['firstName'] = "Vul aub uw voornaam in";
    }
    if ($lastName == "") {
        $errors['lastName'] = "Vul aub uw achternaam in";
    }
    if ($email == "") {
        $errors['email'] = "Vul aub uw email in";
    }
    if ($password == "") {
        $errors['password'] = "Vul aub uw wachtwoord in";
    }

    if (empty($errors)) {
        //INSERT in DB
        $query = "INSERT INTO users (first_name, last_name, email, password)
                    VALUES('$firstName', '$lastName', '$email', '$hashed')";
        $result = mysqli_query($db, $query);

        if ($result) {
            $success = "Hij is toegevoegd aan de DB";
            header('Location: login.php');
            exit;
        } else {
            $errors['db'] = mysqli_error($db);
        }
    }

}
?>