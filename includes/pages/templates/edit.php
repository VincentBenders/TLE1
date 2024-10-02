<!--<div>-->
<!---->
<!--    <section>-->
<!--        <div>-->
<!--            <h2>Edit animal data: --><?//= htmlentities($objectData['name']) ?><!--</h2>-->
<!---->
<!--            <form action="" method="post">-->
<!---->
<!--                <div>-->
<!--                    <label for="name">Name</label>-->
<!--                    <input id="name" type="text" name="name" value="--><?//= htmlentities($objectData['name']) ?><!--"/>-->
<!--                    <p>-->
<!--                        --><?php //echo isset($errorName) ? $errorName : ''; ?>
<!--                    </p>-->
<!--                </div>-->
<!---->
<!--                <div>-->
<!--                    <label for="artist">Description</label>-->
<!--                    <input id="description" type="text" name="description" value="--><?//= htmlentities($objectData['description']) ?><!--"/>-->
<!--                    <p>-->
<!--                        --><?php //echo isset($errorDescription) ? $errorDescription : ''; ?>
<!--                    </p>-->
<!--                </div>-->
<!---->
<!--                <div>-->
<!--                    <label for="group">Image</label>-->
<!--                    <input id="file" type="file" name="image" value="--><?//= htmlentities($objectData['image']) ?><!--"/>-->
<!--                    <p>-->
<!--                        --><?//= isset($errorFile) ? $errorFile : ''; ?>
<!--                    </p>-->
<!--                </div>-->
<!---->
<!---->
<!--                <input type="hidden" id="id" class="id" name="id" value="--><?//= htmlentities($objectId) ?><!--">-->
<!---->
<!--                <button type="submit" name="submit">Save</button>-->
<!--            </form>-->
<!---->
<!--            <a href="--><?//= BASE_PATH ?><!--index.php">&laquo; Go back to the list</a>-->
<!--        </div>-->
<!--    </section>-->
<!--</div>-->
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
            <input id="name" type="text" name="name" value="<?= htmlentities($objectData['name']) ?>">
        </div>

        <div>
            <label for="description">Description</label>
            <input id="description" type="text" name="description" value="<?= htmlentities($objectData['description']) ?>">
        </div>

        <div class=" editImageLink">
            <label class="fileLabel" for="file_path">3d image link</label>
            <input id="file_path" type="file" name="file_path" value="<?= htmlentities($objectData['file_path']) ?>">
        </div>

        <button type="submit" name="submit">Save</button>

    </form>

    <a href="<?= BASE_PATH ?>index.php">&laquo; Go back to the list</a>
</section>