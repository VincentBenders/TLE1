<main id="createMain">
    <h2>Create new object</h2>

    <form action="" method="post" enctype="multipart/form-data">

        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="<?= htmlentities(($_POST['name']) ?? '') ?? '' ?>">
        </div>

        <div>
            <label for="description">Description</label>
            <input id="description" type="text" name="description" value="<?= htmlentities(($_POST['description']) ?? '') ?? '' ?>">
        </div>

        <div>
            <label for="object">Object</label>
            <input id="object" type="file" name="object">
        </div>

        <div>
            <h3>Share level</h3>

            <div>
                <label for="private">Private</label>
                <input id="private" type="radio" name="share" value="0" <?= ($_POST['share'] ?? '0') === '0' ? 'checked' : '' ?>>
            </div>

            <div>
                <label for="public">Public</label>
                <input id="public" type="radio" name="share" value="1" <?= ($_POST['share'] ?? '') === '1' ? 'checked' : '' ?>>
            </div>

        </div>

        <button type="submit" name="submit">Save</button>

    </form>

    <a href="<?= BASE_PATH ?>home">&laquo; Go back</a>
</main>
