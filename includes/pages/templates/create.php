<section>
    <h2>Create new object</h2>

    <?php if (!empty($_SESSION['success'])) { ?>

        <h2 style="color:white"><?= $_SESSION['success'] ?></h2>

        <?php $_SESSION['success'] = ''; ?>

    <?php } ?>

    <?php if (!empty($validationErrors)) { ?>

        <ul>

            <?php foreach ($validationErrors as $validationError) { ?>
                <li style="color:white"><?= $validationError ?></li>
            <?php } ?>

        </ul>

    <?php } ?>


    <form action="" method="post">

        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="">
        </div>

        <div>
            <label for="description">Description</label>
            <input id="description" type="text" name="description" value="">
        </div>

        <div>
            <label for="file_path">3d image link</label>
            <input id="file_path" type="text" name="file_path" value="">
        </div>

        <button type="submit" name="submit">Save</button>

    </form>

    <a href="<?= BASE_PATH ?>index.php">&laquo; Go back to the list</a>
</section>
