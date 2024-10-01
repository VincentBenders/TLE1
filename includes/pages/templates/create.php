<script src="<?= BASE_PATH ?>/includes/js/customUploadStyling.js"></script>

<main id="createMain">

    <h1>Create new object
        <?php if (!empty($_SESSION['success'])) { ?>
            <span id="success">
            <img src="<?= BASE_PATH ?>includes/images/warning-icon.svg" alt="" class="green">
            <?= $_SESSION['success'] ?>
        </span>
            <?php unset($_SESSION['success']); ?>
        <?php } ?>
    </h1>

    <form action="" method="post" enctype="multipart/form-data" class="extrude" id="createForm">

        <div>
            <label for="name">Name
                <?php if (!empty($validationErrors['name'])) { ?>
                    <span class="error">
                        <img src="<?= BASE_PATH ?>includes/images/warning-icon.svg" alt="" class="melon">
                        <?= $validationErrors['name'] ?>
                    </span>
                <?php } ?>
            </label>
            <input id="name" type="text" name="name" value="<?= htmlentities(($_POST['name']) ?? '') ?? '' ?>" maxlength="255">
        </div>

        <div>
            <label for="description">Description
                <?php if (!empty($validationErrors['description'])) { ?>
                    <span class="error">
                        <img src="<?= BASE_PATH ?>includes/images/warning-icon.svg" alt="" class="melon">
                        <?= $validationErrors['description'] ?>
                    </span>
                <?php } ?>
            </label>
            <input id="description" type="text" name="description" value="<?= htmlentities(($_POST['description']) ?? '') ?? '' ?>">
        </div>

        <div>
            <label for="object">Upload object
                <?php if (!empty($validationErrors['object'])) { ?>
                    <span class="error">
                        <img src="<?= BASE_PATH ?>includes/images/warning-icon.svg" alt="" class="melon">
                        <?= $validationErrors['object'] ?>
                    </span>
                <?php } ?>
            </label>
            <label id="customFileUpload">
                Upload an object...
                <input type="file" name="object" id="object">
                <img src="<?= BASE_PATH ?>includes/images/pencil-icon.svg" alt="" class="grey" id="pencilIcon">
                <span id="uploadedFileNameContainer"></span>
            </label>
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

        <button type="submit" name="submit" class="button">
            Save
            <img src="<?= BASE_PATH ?>includes/images/checkmark-icon.svg" alt="" class="grey">
        </button>

    </form>

    <a href="<?= BASE_PATH ?>home" class="button">
        Go back
        <img src="<?= BASE_PATH ?>includes/images/arrow-right.svg" alt="" class="white">
    </a>

</main>
