<script src="<?= BASE_PATH ?>/includes/js/customUploadStyling.js"></script>

<main id="registerMain">

    <h1>Create a new account
        <?php if (!empty($_SESSION['success'])) { ?>
            <span id="success">
            <img src="<?= BASE_PATH ?>includes/images/warning-icon.svg" alt="" class="green">
            <?= $_SESSION['success'] ?>
        </span>
            <?php unset($_SESSION['success']); ?>
        <?php } ?>
    </h1>

    <!-- Registratieformulier -->
    <form action="" method="post" enctype="multipart/form-data" class="extrude">
        <!-- Naam -->
        <div>
            <label for="name">Name
                <?php if (!empty($validationErrors['name'])) { ?>
                    <span class="error">
                        <img src="<?= BASE_PATH ?>includes/images/warning-icon.svg" alt="" class="melon">
                        <?= $validationErrors['name'] ?>
                    </span>
                <?php } ?>
            </label>
            <input type="text" placeholder="Name..." name="name" id="name"
                   value="<?= htmlentities($_POST['name'] ?? '') ?>" maxlength="255">
        </div>

        <!-- E-mail -->
        <div>
            <label for="email">Email
                <?php if (!empty($validationErrors['email'])) { ?>
                    <span class="error">
                        <img src="<?= BASE_PATH ?>includes/images/warning-icon.svg" alt="" class="melon">
                        <?= $validationErrors['email'] ?>
                    </span>
                <?php } ?>
            </label>
            <input type="text" placeholder="Email..." name="email" id="email"
                   value="<?= htmlentities($_POST['email'] ?? '') ?>" maxlength="255">
        </div>

        <!-- Wachtwoord -->
        <div id="passwordRepeat">

            <div>
                <label for="password">Password
                    <?php if (!empty($validationErrors['password'])) { ?>
                        <span class="error">
                        <img src="<?= BASE_PATH ?>includes/images/warning-icon.svg" alt="" class="melon">
                        <?= $validationErrors['password'] ?>
                    </span>
                    <?php } ?>
                </label>
                <input type="password" placeholder="Password..." name="password" id="password"
                       value="<?= htmlentities($_POST['password'] ?? '') ?>" maxlength="255">
            </div>

            <!-- Wachtwoord controle -->
            <div>
                <label for="passwordConfirm">Repeat password
                    <?php if (!empty($validationErrors['passwordConfirm'])) { ?>
                        <span class="error">
                        <img src="<?= BASE_PATH ?>includes/images/warning-icon.svg" alt="" class="melon">
                        <?= $validationErrors['passwordConfirm'] ?>
                    </span>
                    <?php } ?>
                </label>
                <input type="password" placeholder="Password..." name="passwordConfirm" id="passwordConfirm"
                       value="<?= htmlentities($_POST['passwordConfirm'] ?? '') ?>" maxlength="255">
            </div>

        </div>

        <!-- Profielfoto -->

        <div>
            <label for="image">Profiel picture
                <?php if (!empty($validationErrors['image'])) { ?>
                    <span class="error">
                        <img src="<?= BASE_PATH ?>includes/images/warning-icon.svg" alt="" class="melon">
                        <?= $validationErrors['image'] ?>
                    </span>
                <?php } ?>
            </label>
            <label id="customFileUpload">
                Upload an image...
                <input type="file" name="image" id="image">
                <img src="<?= BASE_PATH ?>includes/images/pencil-icon.svg" alt="" class="grey" id="pencilIcon">
                <span id="uploadedFileNameContainer"></span>
            </label>
        </div>


        <!-- Submit-knop -->
        <button type="submit" name="submit" class="button">Create account
            <img src="<?= BASE_PATH ?>includes/images/checkmark-icon.svg" alt="" class="grey">
        </button>

    </form>

    <div>
        <h2>Already have an account?</h2>
        <a href="<?= BASE_PATH ?>login" class="button">Log in
            <img src="<?= BASE_PATH ?>includes/images/arrow-right.svg" alt="" class="white">
        </a>
    </div>

</main>
