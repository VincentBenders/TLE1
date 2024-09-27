<main id="loginMain">

    <h1>Log in</h1>

    <form action="" method="post" class="extrude">
        <!-- Email -->
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email"
                   value="<?= htmlentities($_POST['email'] ?? '') ?>" required>
        </div>

        <!-- Wachtwoord -->
        <div>
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password" required>
        </div>

        <!-- Submit Button -->
        <input type="submit" name="submit" value="Log in" class="button">
    </form>

    <div>
        <h2>Nog geen account?</h2>
        <a href="<?= BASE_PATH ?>register" class="button">Maak een nieuw account aan <img
                    src="<?= BASE_PATH ?>includes/images/arrow-right.svg" alt="" class="white"></a>
    </div>

</main>
