<?php

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header('location: login');
    exit;
}

// Verbinding maken met de database
$db = \classes\Database::connect();

// Haal de huidige gebruiker op
$user = \classes\User::selectByEmail($db, $_SESSION['email']);

// Verwerk het formulier als het is ingediend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedUser = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'profile_image_path' => $_POST['profile_image_path'] ?? $user['profile_image_path'], // behoud oude afbeelding als geen nieuwe is geüpload
    ];

    // Update de gebruiker in de database
    if (\classes\User::update($db, $_SESSION['userId'], $updatedUser)) {
        $_SESSION['success'] = 'Profiel succesvol bijgewerkt!';
        header('location: profile'); // Redirect naar profielpagina na succesvol bijwerken
        exit;
    } else {
        $_SESSION['error'] = 'Er is een fout opgetreden bij het bijwerken van je profiel.';
    }
}

\classes\Database::disconnect();
