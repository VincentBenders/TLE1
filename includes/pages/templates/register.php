<script src="<?= BASE_PATH ?>/includes/js/customUploadStyling.js"></script>

<main id="registerMain">

    <h1>Create a new account</h1>

    <!-- Registratieformulier -->
    <form action="" method="post" enctype="multipart/form-data" class="extrude">
        <!-- Naam -->
        <div>
            <label for="name">Name</label>
            <input type="text" placeholder="Name..." name="name" id="name"
                   value="<?= htmlentities($_POST['name'] ?? '') ?>">
        </div>

        <!-- E-mail -->
        <div>
            <label for="email">Email</label>
            <input type="text" placeholder="Email..." name="email" id="email"
                   value="<?= htmlentities($_POST['email'] ?? '') ?>">
        </div>

        <!-- Wachtwoord -->
        <div id="passwordRepeat">

            <div>
                <label for="password">Password</label>
                <input type="password" placeholder="Password..." name="password" id="password"
                       value="<?= htmlentities($_POST['password'] ?? '') ?>">
            </div>

            <!-- Wachtwoord controle -->
            <div>
                <label for="passwordConfirm">Repeat password</label>
                <input type="password" placeholder="Password..." name="passwordConfirm" id="passwordConfirm"
                       value="<?= htmlentities($_POST['passwordConfirm'] ?? '') ?>">
            </div>

        </div>

        <!-- Profielfoto -->

        <div>
            <label for="image">Profiel picture</label>
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
