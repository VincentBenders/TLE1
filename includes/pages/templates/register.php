<main id="registerMain">

    <h1>Maak een nieuw account aan</h1>

    <!-- Registratieformulier -->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Naam -->
        <div>
            <label for="name"></label>
            <input type="text" placeholder="Naam" name="name" id="name"
                   value="<?= htmlentities($_POST['name'] ?? '') ?>">
        </div>

        <!-- E-mail -->
        <div>
            <label for="email"></label>
            <input type="text" placeholder="Email" name="email" id="email"
                   value="<?= htmlentities($_POST['email'] ?? '') ?>">
        </div>

        <!-- Wachtwoord -->
        <div>
            <label for="password">Wachtwoord</label>
            <input type="password" placeholder="Wachtwoord" name="password" id="password"
                   value="<?= htmlentities($_POST['password'] ?? '') ?>">
        </div>

        <!-- Wachtwoord controle -->
        <div>
            <label for="passwordConfirm">Herhaal wachtwoord</label>
            <input type="password" placeholder="Wachtwoord" name="passwordConfirm" id="passwordConfirm"
                   value="<?= htmlentities($_POST['passwordConfirm'] ?? '') ?>">
        </div>

        <!-- Profielfoto -->

        <div class="control">
            <label for="image">Profiel foto</label>
            <input type="file" name="image" id="image">
        </div>


        <!-- Submit-knop -->
        <button type="submit" name="submit">Account aanmaken</button>
    </form>

    <h2>Heb je al een account?</h2>
    <a href="<?= BASE_PATH ?>login">Log in</a>
</main>
