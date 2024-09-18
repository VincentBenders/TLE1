<?php
//Always add the title of the page here
$title = 'Login';

/** @var mysqli $db */
/** @var array $errors */

$login = false;


$errorEmail = '';
$errorPassword = '';

// Is user logged in?
if (isset($_POST['submit'])) {

    // Get form data
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = mysqli_escape_string($db, $_POST['password']);

    // Server-side validation
    if (isset($_POST['email'], $_POST['password'])) {
        if (empty($_POST['email'])) {
            $errorEmail = 'Vul je email in';
        }

        if (empty($_POST['password'])) {
            $errorPassword = 'Vul je wachtwoord in';
        }
    }

    // If data valid
    if (empty($errorEmail) && empty($errorPassword)) {

        // SELECT the user from the database, based on the email address.
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($db, $query);

        // check if the user exists
        if ($result) {

            // Get user data from result
            $user = mysqli_fetch_assoc($result);
            $hash = $user['password'];

            // Check if the provided password matches the stored password in the database
            if (password_verify($password, $hash)) {

                // Store the user in the session
                $_SESSION['user'] = [
                    'name' => $user['first_name'],
                    'email' => $user['email'],
                ];


                $_SESSION["user_id"] = $user['id'];

                // Redirect to secure page
                header('Location: secure.php');
                exit;
            } else {

                // Credentials not valid
                $errors['loginFailed'] = 'Incorrect login credentials.';
            }
        } else {
            // User doesn't exist
            $errors['loginFailed'] = 'No User found.';
        }
    }
}
?>