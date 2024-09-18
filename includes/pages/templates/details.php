<div class="container px-4">
    <div class="columns is-centered">
        <div class="column is-narrow">
            <h2 class="title mt-4"><?php echo htmlentities($object['name']) ?> details</h2>
            <section class="content">
                <ul>
                    <li>Description: <?php echo htmlentities($object['description']) ?></li>
                    <li>Image: <?php echo htmlentities($object['file_path']) ?></li>
                    <li>User that published this object: <?php echo htmlentities($object['user_id']) ?></li>
                </ul>
            </section>
            <div>
                <a class="button" href="index.php">Go back to the list</a>
            </div>
        </div>
    </div>
</div>

