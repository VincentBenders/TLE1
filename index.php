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

<?= $content ?? 'Something went wrong while loading the content! Please check the javascript console for errors' ?>

<script>
//    Shows errors in the javascript console
    console.log('<?= !empty($errors) ? (json_encode(print_r($errors, true))) : 'No errors found!' ?>')
</script>

</body>
</html>
