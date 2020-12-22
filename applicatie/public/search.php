<!DOCTYPE php>

<php lang="en">

<head>
    <link rel="icon" href="images/logo.png">
    <meta http-equiv="Content-Type" content="text/php; charset=utf-8">
    <title>Fletnix - Zoek</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="search.css">
</head>
    <body>
        <?php
            require("shared/header.html");
        ?>

        <main>
            <h1>Resultaten:</h1>
            <div class="filmlist">
                <form class="filterlist">
                    <label for="18+">18+</label>
                    <input id="18+" type="checkbox">
                    <label for="actie">actie</label>
                    <input id="actie" type="checkbox">
                    <label for="horror">horror</label>
                    <input id="horror" type="checkbox">
                    <label for="geweld">geweld</label>
                    <input id="geweld" type="checkbox">
                    <label for="pubyearmin">publicatie jaar minimum</label>
                    <input type="text" id="pubyearmin">
                    <label for="pubyearmax">publicatie jaar maximum</label>
                    <input type="text" id="pubyearmax">
                    <label for="reg">regisseur</label>
                    <input id="reg" type="text">
                    <input class="submitbutton" type="submit" value="filter">
                </form>
                <div>
                    <a href="DetectivePikachu.php">
                        Pokemon Detective Pikachu
                        <img src="images/cover3.jpg" alt="img">
                    </a>
                </div>
            </div>
        </main>

        <footer>
            <div>
            </div>
        </footer>
    </body>
</php>