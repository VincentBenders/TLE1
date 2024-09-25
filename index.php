<?php
require_once 'includes/initialize.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Error: Title not set' ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?= $content ?? $errors[] = 'Error: content failed to load' ?>

</body>
</html>
