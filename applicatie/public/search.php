<?php
    session_start();

    require("phpfunction/SQL_connection.php");
    require("shared/header.html");

    //gets
    function getMovies($zoekwoord)
    {
        global $dbh;

        $query = $dbh -> prepare("SELECT title, movie_id FROM Movie WHERE title like '%$zoekwoord%'");

        $query->execute();

        $result = $query->fetchALL();

        return $result;
    }

    function getGenres($zoekwoord)
    {
        global $dbh;

        $query = $dbh -> prepare("SELECT genre_name FROM genre ORDER BY genre_name");

        $query->execute();

        $result = $query->fetchALL();

        return $result;
    }

    //tohtmls
    function filmsNaarHTMl($films) {
        $html = '';
        
        foreach($films as $film)
        {
            $image_src = 'images/cover3.jpg';
            $image = "<img src=$image_src alt='img'>";
        
            $link = 'product.php?id=' . $film['movie_id']; //:)
        
            $html = $html . "<div><a href=$link>" . $film['title'] . $image . "</a></div>";
        }        
        
        return $html;
    }  

    function genresNaarHTML($genres){
        $html = '';

        foreach($genres as $genre)
        {
            
            $html = "";
        } 
        
        return $html;
    }

    $filmlijst = getMovies($_GET['searchMessage']);

    //$genrelijst = getGenres();
    
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
            <div class="filmlist">
                <?=filmsNaarHTMl($filmlijst)?>
            </div>

            <form class="filterlist">
                <div class="genres">

                </div>

                <div class="jaar">

                </div>

                <div class="regisseur">
                    
                </div>

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
        </main>

        <footer>
            <div>
            </div>
        </footer>
    </body>
</php>