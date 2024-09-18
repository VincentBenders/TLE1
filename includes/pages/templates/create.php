
<div class="container px-4">

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

    <section class="columns is-centered">
        <div class="column is-10">
            <h2 class="title mt-4">Create new object</h2>

            <form class="column is-6" action="" method="post">

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="name">Name</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" id="name" type="text" name="name" value=""/>
                            </div>
                            <p class="help is-danger">
                                <?php echo htmlentities($errorName ?? '') ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="species">Description</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" id="description" type="text" name="description" value=""/>
                            </div>
                            <p class="help is-danger">
                                <?php echo htmlentities($errorDescription ?? '') ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="group">3d image link</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" id="file_path" type="text" name="file_path" value=""/>
                            </div>
                            <p class="help is-danger">
                                <?php echo htmlentities($errorFile ?? '') ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal"></div>
                    <div class="field-body">
                        <button class="button is-link is-fullwidth" type="submit" name="submit">Save</button>
                    </div>
                </div>
            </form>

            <a class="button mt-4" href="<?= BASE_PATH ?>index.php">&laquo; Go back to the list</a>
        </div>
    </section>
</div>
