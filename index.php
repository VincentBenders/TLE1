<?php
require_once 'includes/initialize.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Error: Title not set' ?></title>
    <link rel="stylesheet" href="includes/css/preview.css">
</head>

<nav>
    <a href="<?= BASE_PATH ?>login">login page</a>
    <a href="<?= BASE_PATH ?>register">register page</a>
    <a href="<?= BASE_PATH ?>logout">logout page</a>
</nav>

<body>

<?= $content ?? $errors[] = 'Error: content failed to load' ?>

</body>
</html>
