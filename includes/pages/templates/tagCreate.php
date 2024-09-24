<h1>Create new tag</h1>

<!-- If there's a success message, display it -->
<?php if (!empty($_SESSION['success'])) { ?>

    <h2><?= $_SESSION['success'] ?></h2>

<!--    After displaying the message once, clear it out-->
    <?php $_SESSION['success'] = ''; ?>

<?php } ?>


<!-- If there are any errors with the input, display them in a list -->
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