
<div class="main_container">
    <h1 class="title_profile"><?= htmlentities($title ?? 'Jouw profiel') ?></h1>

    <?php if ($_SESSION['success'] ?? false) { ?>

        <ul>

            <li class="positive"><?= $_SESSION['success'] ?></li>

        </ul>

        <?php unset($_SESSION['success']);
    } ?>

    <?php if (isset($user)) { ?>
    <div class="profile_info">
        <table class="profile_table">

            <tr>
                <td>
                    Naam:
                </td>
                <td>
                    <?= htmlentities($user['name']) ?>
                </td>
            </tr>

            <tr>
                <td>
                    email:
                </td>
                <td>
                    <?= htmlentities($user['email']) ?>
                </td>
            </tr>

            <tr class="profilePagePicture">
                <td>
                    Profiel foto:
                </td>
                <td>
                    <img src="<?= $profilePicturePath ?? '' ?>" alt="Profile picture" class="<?= $class ?? '' ?>">
                </td>
            </tr>

        </table>

        <?php } ?>


    </div>
    <div class="update">
        <div class="updateProfile">
            <a class="updateProfileButton" href="<?= BASE_PATH ?>userUpdate?id=<?= $_SESSION['userId'] ?>">
                Profiel bewerken
            </a>
            <a class="profileBackButton" href="<?= BASE_PATH ?> home.php <?= $_SESSION['userId']?>"></a>
        </div>
    </div>
    <br>
</div>