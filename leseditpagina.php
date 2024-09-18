<?php
require_once 'includes/database.php';
/* @var mysqli $db */
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $id = $_POST['id'];

    $name = mysqli_real_escape_string($db, $name);

    if($name === '') {

    }
    /* @var mysqli $db */

$query = "UPDATE products
        SET name = '$name', description = '$description'
        WHERE id = $id";

    $result = mysqli_query($db, $query)
        or die('Error: '.mysqli_error($db));

    mysqli_close($db);

    header('Location: lesindexpagina.php');
    exit;
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    require_once 'includes/database.php';
    $query = "SELECT * FROM products WHERE id = $id";

    $result = mysqli_query($db, $query)
        or die('Error: '.mysqli_error($db));

    if(mysqli_num_rows($result) == 1) {
        $product = mysqli_fetch_assoc($result);
    } else {
        header('Location: lesindexpagina.php');
        exit;
    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <h1>Edit product</h1>
    <form action="" method="post">
        <label for="name">Naam</label>
        <input type="text" id="name" name="name" value="<?= $product['name'] ?>"/>

        <input type="submit" name="submit" value="Bewerk product"/>

        <label for="description">Beschrijving</label>
        <input type="text" id="description" name="description" value="<?= $product['description'] ?>"/>

        <input type="hidden" name="id" value="<?= $product['id'] ?>"

        <input type="submit" name="submit" value="Bewerk product"/>
    </form>>

</body>
</html>