<main id="detailsMain">

    <?php if (isset($objectData)) { ?>

        <section id="details">

            <h2><?= htmlentities($objectData['name']) ?></h2>

            <p><?= htmlentities($objectData['description']) ?></p>

            <div>
                <p>Share level</p>
                <p><?= $objectData['share'] ?></p>
            </div>

        </section>

    <?php } ?>

    <section id="detailLinks">
        <a href="">Preview</a>
        <a href="<?= BASE_PATH ?>home">Go back</a>
    </section>

</main>

