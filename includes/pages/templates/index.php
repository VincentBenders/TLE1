
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animals collection</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<div class="container px-4">
    <h1 class="title mt-4">Animals</h1>
    <a class = button href="login.php">Login</a>
    <a class = button href="register.php">Register</a>

    <a class = button href="logout.php">Logout</a>

    <hr>

    <div class="columns is-centered">
        <div class="column is-narrow">
            <a class = button href="create.php">Add Animal</a>
            <hr>

            <table class="table is-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>animal</th>
                    <th>species</th>
                    <th>group</th>
                    <th>type</th>
                    <th>user_id</th>
                    <th>first name</th>
                    <th>details</th>
                    <th>edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="9" class="has-text-centered">&copy; Animal collection</td>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach ($animals as $index => $animal) { ?>
                    <tr>
                        <td><?= htmlentities($index + 1) ?></td>
                        <td><?= htmlentities($animal['name']) ?></td>
                        <td><?= htmlentities($animal['species']) ?></td>
                        <td><?= htmlentities($animal['animal_group']) ?></td>
                        <td><?= htmlentities($animal['type']) ?></td>
                        <td><?= htmlentities($animal['user_id']) ?></td>
                        <td><?= htmlentities($animal['first_name']) ?></td>
                        <td><a href="details.php?id=<?= htmlentities($animal['id']) ?>">Details</a></td>
                        <td><a href="edit.php?id=<?= htmlentities($animal['id']) ?>">Edit</a></td>
                        <td><a href="delete.php?id=<?= htmlentities($animal['id']) ?>">Delete</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
    <div>
        <img src="images/animal_groups.webp">
    </div>
</body>
</html>

