<?php
    session_start();

    require("phpfunction/SQL_connection.php");
    require("shared/header.html");

    function getMovies($zoekwoord)
    {
        global $dbh;

        $query = $dbh -> prepare("SELECT title FROM Movie WHERE title like '%$zoekwoord%' GROUP BY title");

        $query->execute();

        $result = $query->fetchALL();

        return $result;
    }

    function filmsNaarHTMl($films) {
        $html = '';
        
        foreach($films as $film)
        {
            $image_src = 'images/cover3.jpg';
            $image = "<img src=$image_src alt='img'>";
        
            $link = 'https://discord.gg/3SjzP4cj'; //:)
        
            $html = $html . "<div><a href=$link>" . $film['title'] . $image . "</a></div>";
        }        
        
        return $html;
    }  

    $filmlijst = getMovies($_GET['searchMessage']);
?>

<!DOCTYPE php>
<html lang="en">
<head>
    <link rel="icon" href="images/logo.png">
    <meta http-equiv="Content-Type" content="text/php; charset=utf-8">
    <title>Fletnix - Zoek</title>
    <link rel="stylesheet" href="CSS/search.css">
</head>
    <body>
        <main>
            <div class ="filmlist">
                <?=filmsNaarHTMl($filmlijst)?>
            </div>

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