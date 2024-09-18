<h1>Create new tag</h1>

<?php if (!empty($_SESSION['success'])) { ?>

    <h2><?= $_SESSION['success'] ?></h2>

    <?php $_SESSION['success'] = ''; ?>

<?php } ?>

<?php if(!empty($validationErrors)) { ?>

    <ul>

        <?php foreach ($validationErrors as $validationError) { ?>
            <li><?= $validationError ?></li>
        <?php } ?>

    </ul>

<?php } ?>


<form action="" method="post">

    <label for="name">name:</label>
    <input type="text" id="name" name="name" placeholder="Insert tag name here...">

    <button type="submit" name="submit">Submit</button>

</form>

<a href="<?= BASE_PATH ?>home">Go back</a>