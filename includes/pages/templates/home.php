<!--The live server was acting weird with this workaround, so I'm using another-->
<!--<script>-->
<!--    let Objects = --><?php //= json_encode($objects ?? '') ?? '' ?><!--;-->
<!--    let BASE_PATH = --><?php //= BASE_PATH ?><!--;-->
<!--</script>-->
<script src="<?= BASE_PATH ?>/includes/js/home.js"></script>
<div id="fakeJson" style="display: none"><?= json_encode($objects ?? '') ?? '' ?></div>
<div id="basePath" style="display: none"><?= BASE_PATH ?></div>

<main id="homeMain">

    <section id="homeTop">

        <h1>Your items</h1>

        <button class="button">
            Filter
            <img src="<?= BASE_PATH ?>includes/images/filter-icon.svg" alt="" class="white">
        </button>

        <div id="filterContainer">

        </div>

        <a href="<?= BASE_PATH ?>profile" class="button">
            <?= htmlentities($_SESSION['name']) ?>
            <img src="<?= $profilePicturePath ?? '' ?>" alt="Profile picture" class="<?= $class ?? '' ?>">
            <img src="<?= BASE_PATH ?>includes/images/arrow-right.svg" alt="" class="white">
        </a>

    </section>


    <section id="objectDisplay" class="extrude">

        <div id="objectDisplayTop">

            <div id="objectContainer" class="indent">
                <div id="scrollWheel"></div>

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

        <a href="<?= BASE_PATH ?>create" id="createNewObject" class="button">
            Create new
            <img src="<?= BASE_PATH ?>includes/images/plus-icon.svg" alt="" class="green">
        </a>

        <a href="<?= BASE_PATH ?>showcase" id="viewPublicObjects" class="button">
            View public items
            <img src="<?= BASE_PATH ?>includes/images/arrow-right.svg" alt="" class="white">
        </a>

        <a href="<?= BASE_PATH ?>logout" class="button">
            Logout
            <img src="<?= BASE_PATH ?>includes/images/plus-icon.svg" alt="" class="purple cross">
        </a>

    </section>

</main>
