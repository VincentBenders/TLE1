<?php
session_start();
require_once 'secure.php';

// check of de gebruiker is ingelogd, zo ja, dan naar de hoofdpage
if (isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// check of het formulier is gestuurd
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of alle vereiste velden zijn ingevuld
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // check of het e-mailadres al bestaat in de database
        $existingUser = getUserByEmail($email);
        if ($existingUser) {
            $error_message = "Dit e-mailadres is al in gebruik.";
        } else {
            // Voeg de nieuwe gebruiker toe aan de database als het e-mailadres nog niet bestaat
            $success = registerUser($firstname, $lastname, $email, $password);

            if ($success) {
                // Gebruiker succesvol geregistreerd, stuur ze door naar de inlogpagina
                header("Location: login.php");
                exit();
            } else {
                $error_message = "Er is een fout opgetreden bij het registreren van de gebruiker";
            }
        }
    } else {
        $error_message = "Vul alle vereiste velden in";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
</head>
<body>

<h2>Registreren</h2>

<?php if (isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>

<form method="post">
    <label for="firstname">Voornaam:</label><br>
    <input type="text" id="firstname" name="firstname" required><br>

    <label for="lastname">Achternaam:</label><br>
    <input type="text" id="lastname" name="lastname" required><br>

    <label for="email">E-mail:</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Wachtwoord:</label><br>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Registreren</button>
</form>

<a href="login.php">Terug naar Inloggen</a>

</body>
</html>
