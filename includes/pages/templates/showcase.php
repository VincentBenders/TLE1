<script>
    let publicObjects = <?= json_encode($objects ?? '') ?? '' ?>;
    let BASE_PATH = <?= BASE_PATH ?>;
</script>
<script src="<?= BASE_PATH ?>/includes/js/showcase.js"></script>

<main id="showcaseMain">

    <section id="homeTop">

        <h1>Showcase</h1>

        <button>Filter</button>

        <div id="filterContainer">

        </div>

    </section>

    <section id="objectDisplay">

        <div id="objectDisplayTop">

            <div id="objectContainer">

            </div>

            <div id="scrollWheel">

            </div>

        </div>

        <div id="searchBarContainer">

            <form action="" id="searchBar">
                <label for="search">Search</label>
                <input type="text" id="search" name="search">
            </form>

        </div>

    </section>

</main>