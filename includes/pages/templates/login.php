<main id="loginMain">

    <h1>Log in
        <?php if (!empty($_SESSION['success'])) { ?>
            <span id="success">
            <img src="<?= BASE_PATH ?>includes/images/warning-icon.svg" alt="" class="green">
            <?= $_SESSION['success'] ?>
        </span>
            <?php unset($_SESSION['success']); ?>
        <?php } ?>
    </h1>

    <form action="" method="post" class="extrude">
        <!-- Email -->
        <div>
            <label for="email">Email
                <?php if (!empty($validationErrors['email'])) { ?>
                    <span class="error">
                        <img src="<?= BASE_PATH ?>includes/images/warning-icon.svg" alt="" class="melon">
                        <?= $validationErrors['email'] ?>
                    </span>
                <?php } ?>
            </label>
            <input type="text" name="email" id="email"
                   value="<?= htmlentities($_POST['email'] ?? '') ?>" required>
        </div>

        <!-- Wachtwoord -->
        <div>
            <label for="password">Password
                <?php if (!empty($validationErrors['password'])) { ?>
                    <span class="error">
                        <img src="<?= BASE_PATH ?>includes/images/warning-icon.svg" alt="" class="melon">
                        <?= $validationErrors['password'] ?>
                    </span>
                <?php } ?>
            </label>
            <input type="password" name="password" id="password" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" name="submit" value="Log in" id="submit" class="button">
            Log in <img src="<?= BASE_PATH ?>includes/images/checkmark-icon.svg" alt="" class="grey">
        </button>

    </form>

    <div>
        <h2>No account yet?</h2>
        <a href="<?= BASE_PATH ?>register" class="button">
            Create a new account
            <img src="<?= BASE_PATH ?>includes/images/arrow-right.svg" alt="" class="white">
        </a>
    </div>

</main>
