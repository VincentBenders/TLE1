<?php if ($_SESSION['success'] ?? false) { ?>
    <div class="columns is-centered">
        <div class="column is-one-third is-centered">
            <ul>
                <li class="positive has-text-centered"><?= $_SESSION['success'] ?></li>
            </ul>
        </div>
    </div>
    <?php unset($_SESSION['success']);
} ?>

<main class="container" id="delete">
    <section>
        <div class="columns is-centered login-form">
            <div class="column is-one-third">
                <h1 class="login-head">Log in</h1>

                <!-- Display errors if there are any -->
                <?php if (!empty($errors)) { ?>
                    <ul>
                        <?php foreach ($errors as $error) { ?>
                            <li class="has-text-danger"> <?= $error ?> </li>
                        <?php } ?>
                    </ul>
                <?php } ?>

                <form class="login-form" action="" method="post">
                    <!-- Email -->
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" type="text" name="email" id="email" value="<?= htmlentities($_POST['email'] ?? '') ?>" required>
                        </div>
                    </div>

                    <!-- Wachtwoord -->
                    <div class="field">
                        <label class="label">Wachtwoord</label>
                        <div class="control">
                            <input class="input" type="password" name="password" id="password" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="field">
                        <div class="control">
                            <input class="button is-primary" type="submit" name="submit" value="Log in">
                        </div>
                    </div>
                </form>

                <h2>Nog geen account?</h2>
                <a href="<?= BASE_PATH ?>register">Maak een nieuw account aan</a>
            </div>
        </div>
    </section>
</main>

<footer></footer>
