<?php
//onderstaande in de database
//$host = 'localhost';
//$user = 'root';
//$password = '';
//$database = 'herhaling_php';
//
//$db = mysqli_connect($host, $user, $password, $database)
//or die('Error: '.mysqli_connect_error());
require_once 'includes/database.php';

$query = "SELECT * FROM products";

$result = mysqli_query($db, $query)
    or die('error: '.mysqli_error($db));

$products = [];

while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}
mysqli_close;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>productenoverzhicht</title>
</head>
<body>
        <h1>Productenoverzicht</h1>>
        <?php foreach ($products as $product) { ?>
            <section>
                <h2><?= $product['name'] ?></h2>
                <p><?= $product['description'] ?></p>
                <a href="leseditpagina.php?id=<?= $product['id'] ?>">bewerk product</a>
            </section>
        <?php } ?>
</body>
</html>