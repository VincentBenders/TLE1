<main id="home">

    <section id="homeTop">

        <h1>Your items</h1>

        <button>Filter</button>

        <div id="filterContainer">

        </div>

        <a href="<?= BASE_PATH ?>profile">
            <p></p>
            <img src="" alt="Profile picture">
            <svg></svg>
        </a>

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

    <section id="homeBottom">

        <a href="<?= BASE_PATH ?>create" id="createNewObject">
            Create new
            <svg></svg>
        </a>

        <a href="<?= BASE_PATH ?>showcase" id="viewPublicObjects">
            View public items
            <svg></svg>
        </a>

    </section>


</main>

