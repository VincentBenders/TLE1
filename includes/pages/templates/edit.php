<div class="container px-4">

    <section class="columns is-centered">
        <div class="column is-10">
            <h2 class="title mt-4">Edit animal data: <?= htmlentities($object['name']) ?></h2>

            <form class="column is-6" action="" method="post">

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="name">Name</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" id="name" type="text" name="name" value="<?php echo htmlentities($object['name']) ?>"/>
                            </div>
                            <p class="help is-danger">
                                <?php echo isset($errorName) ? $errorName : ''; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="artist">Description</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" id="description" type="text" name="description" value="<?php echo htmlentities($object['description']) ?>"/>
                            </div>
                            <p class="help is-danger">
                                <?php echo isset($errorDescription) ? $errorDescription : ''; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="group">Image</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" id="file" type="file" name="image" value="<?php echo htmlentities($object['image']) ?>"/>
                            </div>
                            <p class="help is-danger">
                                <?php echo isset($errorFile) ? $errorFile : ''; ?>
                            </p>
                        </div>
                    </div>
                </div>


                <input type="hidden" id="id" class="id" name="id" value="<?php echo htmlentities($objectId) ?>">

                <div class="field is-horizontal">
                    <div class="field-label is-normal"></div>
                    <div class="field-body">
                        <button class="button is-link is-fullwidth" type="submit" name="submit">Save</button>
                    </div>
                </div>
            </form>

            <a class="button mt-4" href="index.php">&laquo; Go back to the list</a>
        </div>
    </section>
</div>