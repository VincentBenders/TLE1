
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

            <tr>
                <td>
                    Profiel foto:
                </td>
                <td>
                    <img class="image is-64x64" src="includes/uploaded<?= empty($user['profile_image_path']) ? "profile_placeholder.png" : ("uploaded/" . $user['profile_image_path']) ?>" alt="Profiel foto">
                </td>
            </tr>

        </table>

        <?php } ?>


    </div>
    <div class="buttons_profile_page">
        <div class="buttons">
            <a class="button is-warning is-light is-small is-outlined" href="<?= BASE_PATH ?>userUpdate?id=<?= $_SESSION['id'] ?>">
                Profiel bewerken
            </a>
        </div>
    </div>
    <br>
</div>