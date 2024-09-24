<div>
            <section>
                <h2><?= htmlentities($objectData['name']) ?> details</h2>

                <ul>
                    <li>Description: <?= htmlentities($objectData['description']) ?></li>
                    <li>Image: <?= htmlentities($objectData['file_path']) ?></li>
                    <li>User that published this object: <?= htmlentities($objectData['user_id']) ?></li>
                </ul>

                <div>
                    <a class="button" href="index.php">Go back to the list</a>
                </div>

            </section>

</div>

