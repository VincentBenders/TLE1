<?php
session_start();
require_once 'secure.php';

// check of de gebruiker al is ingelogd, zo ja, stuur door naar login
if(isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// check of het formulier is gestuurd
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of de email en wachtwoord zijn ingevoerd
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Haal de gebruiker op basis van het e-mailadres uit de database
        $user = getUserByEmail($email);

        if($user) {
            // Controleer of het ingevoerde wachtwoord overeenkomt met het opgeslagen wachtwoord in de database
            if(password_verify($password, $user['password'])) {
                // Sla de e-mail op in de sessie om de gebruiker ingelogd te houden
                $_SESSION['email'] = $email;
                // Stuur de gebruiker door naar de hoofdpagina na succesvol inloggen
                header("Location: index.php");
                exit();
            } else {
                $error_message = "Ongeldige e-mail of wachtwoord";
            }
        } else {
            $error_message = "Ongeldige e-mail of wachtwoord";
        }
    } else {
        $error_message = "Vul zowel e-mail als wachtwoord in";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php if(isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>

<form method="post">
    <label for="email">E-mail:</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Wachtwoord:</label><br>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Login</button>
</form>

<a href="register.php">Registreren</a>

</body>
</html>
