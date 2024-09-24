<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

<main id="delete">
    <section>
        <h1 class="register_new_account is-size-1 has-text-centered is-black has-text-weight-bold">Maak een nieuw account aan</h1>

        <div class="error_list">
            <!-- Toon fouten als deze er zijn -->
            <?php if (isset($errors)) { ?>
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li> -<?= $error ?> </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>

        <!-- Registratieformulier -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Naam -->
            <div class="columns is-centered">
                <div class="column is-one-third is-centered">
                    <input class="input" type="text" placeholder="Naam" name="name" id="name" value="<?= htmlentities($_POST['name'] ?? '') ?>">
                </div>
            </div>

            <!-- E-mail -->
            <div class="columns is-centered">
                <div class="column is-one-third is-centered">
                    <input class="input" type="text" placeholder="Email" name="email" id="email" value="<?= htmlentities($_POST['email'] ?? '') ?>">
                </div>
            </div>

            <!-- Wachtwoord -->
            <div class="columns is-centered">
                <div class="column is-one-third is-centered">
                    <input class="input" type="password" placeholder="Wachtwoord" name="password" id="password" value="<?= htmlentities($_POST['password'] ?? '') ?>">
                </div>
            </div>

            <!-- Profielfoto -->
            <div class="columns is-centered">
                <div class="column is-one-third is-centered">
                    <div class="field">
                        <label for="image">Profiel foto</label>
                        <div class="control">
                            <input type="file" name="image" id="image">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit-knop -->
            <div class="buttons is-centered" id="submit_id">
                <button class="button is-link is-half is-warning" type="submit" name="submit">Account aanmaken</button>
            </div>
        </form>
    </section>

    <section class="existing_account_section">
        <h2 class="existing_account is-size-6 has-text-centered is-black has-text-weight-bold">Heb je al een account?</h2>
        <a class="existing_account is-size-6 has-text-centered is-black has-text-weight-bold" href="<?= BASE_PATH ?>login">Log in</a>
    </section>
</main>
