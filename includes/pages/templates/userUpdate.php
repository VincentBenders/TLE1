<div class="main_container">
    <h1 class="title_profile">Profiel bewerken</h1>

    <?php if ($_SESSION['error'] ?? false) { ?>
        <ul>
            <li class="negative"><?= htmlentities($_SESSION['error']) ?></li>
        </ul>
        <?php unset($_SESSION['error']);
    } ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="form_group">
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" value="<?= htmlentities($user['name'] ?? '') ?>" required>
        </div>

        <div class="form_group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlentities($user['email'] ?? '') ?>" required>
        </div>

        <div class="form_group">
            <label for="profile_image">Profiel foto:</label>
            <input type="file" id="profile_image" name="profile_image">
            <input type="hidden" name="profile_image_path" value="<?= htmlentities($user['profile_image_path']) ?>">
            <p>Huidige foto: <img src="<?= BASE_PATH . 'includes/uploaded/images/' . htmlentities($user['profile_image_path']) ?>" alt="Profile picture" class="profilePicture"></p>
        </div>

        <button type="submit" class="updateProfileButton">Profiel bijwerken</button>
    </form>

    <a href="<?= BASE_PATH ?>profile" class="button">
        Go back
        <img src="<?= BASE_PATH ?>includes/images/arrow-right.svg" alt="" class="white">
    </a>

</div>
