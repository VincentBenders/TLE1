<?php
// Database connect
$host = "localhost";
$database = "TLE1Experimenteren";
$user = "root";
$password = "";

// Maak een verbinding met de database
$db = mysqli_connect($host, $user, $password, $database);

// Controleer of de verbinding succesvol is
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Functie om een gebruiker toe te voegen aan de database
function registerUser($firstname, $lastname, $email, $password) {
    global $db;

    // Voorbereid de query om SQL injection te voorkomen
    $query = "INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
    $statement = mysqli_prepare($db, $query);

    // Hash het wachtwoord voordat het wordt opgeslagen in de database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Bind de parameters aan de voorbereide query
    mysqli_stmt_bind_param($statement, "ssss", $firstname, $lastname, $email, $hashedPassword);

    // Voer de voorbereide query uit
    $success = mysqli_stmt_execute($statement);

    // Sluit de voorbereide statement
    mysqli_stmt_close($statement);

    return $success;
}

// Functie om een gebruiker te vinden op basis van het e-mailadres
function getUserByEmail($email) {
    global $db;

    // Voorbereid de query om SQL injection te voorkomen
    $query = "SELECT * FROM users WHERE email = ?";
    $statement = mysqli_prepare($db, $query);

    // Bind de parameters aan de voorbereide query
    mysqli_stmt_bind_param($statement, "s", $email);

    // Voer de voorbereide query uit
    mysqli_stmt_execute($statement);

    // Haal het resultaat op
    $result = mysqli_stmt_get_result($statement);

    // Haal de gebruiker op als deze bestaat, anders return null
    $user = mysqli_fetch_assoc($result);

    // Sluit de voorbereide statement
    mysqli_stmt_close($statement);

    return $user;
}

// Sluit de databaseverbinding
function closeDatabase() {
    global $db;
    mysqli_close($db);
}
?>
