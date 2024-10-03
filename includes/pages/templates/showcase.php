<script src="<?= BASE_PATH ?>/includes/js/showcase.js"></script>
<div id="fakeJson" style="display: none"><?= json_encode($objects ?? '') ?? '' ?></div>
<div id="basePath" style="display: none"><?= BASE_PATH ?></div>

<main id="homeMain">

    <section id="homeTop">

        <h1>Showcase</h1>

        <button class="button">
            Filter
            <img src="<?= BASE_PATH ?>includes/images/filter-icon.svg" alt="" class="white">
        </button>

        <div id="filterContainer">

        </div>

    </section>


    <section id="objectDisplay" class="extrude">

        <div id="objectDisplayTop">

            <div id="objectContainer" class="indent">
                <div id="scrollWheel">

                </div>
            </div>

        </div>

        <div id="searchBarContainer">

            <form action="" id="searchBar">
                <label for="search">Search</label>
                <input type="text" id="search" name="search">
            </form>

        </div>

    </section>


    <section id="homeBottom">

        <a href="<?= BASE_PATH ?>home" class="button">
            Go back
            <img src="<?= BASE_PATH ?>includes/images/arrow-right.svg" alt="" class="white">
        </a>

    </section>

</main>

