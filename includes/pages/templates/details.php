<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>Details <?php $object ?> | Published Objects</title>
</head>
<body>
<div class="container px-4">
    <div class="columns is-centered">
        <div class="column is-narrow">
            <h2 class="title mt-4"><?php echo htmlentities($object['name']) ?> details</h2>
            <section class="content">
                <ul>
                    <li>Description: <?php echo htmlentities($object['description']) ?></li>
                    <li>Image: <?php echo htmlentities($object['file']) ?></li>
                    <li>User that published this object: <?php echo htmlentities($object['user_id']) ?></li>
                </ul>
            </section>
            <div>
                <a class="button" href="index.php">Go back to the list</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
