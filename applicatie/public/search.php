<?php
    session_start();

    require("phpfunction/SQL_connection.php");
    require("shared/header.html");

    //gets
    function getMovies($zoekwoord)
    {
        global $dbh;

        $query = $dbh -> prepare("SELECT title FROM Movie WHERE title like '%$zoekwoord%' GROUP BY title");

        $query->execute();

        $result = $query->fetchALL();

        return $result;
    }

    function getGenres($zoekwoord)
    {
        global $dbh;

        $query = $dbh -> prepare("SELECT g.genre_name FROM Genre g WHERE g.genre_name IN (SELECT mg.genre_name FROM Movie m JOIN Movie_Genre mg ON m.movie_id = mg.movie_id WHERE m.title LIKE '%$zoekwoord%') GROUP BY g.genre_name");

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
        
            $link = 'https://discord.gg/3SjzP4cj'; //:)
        
            $html = $html . "<div><a href=$link>" . $film['title'] . $image . "</a></div>";
        }        
        
        return $html;
    }  

    function genresNaarHTML($genres){
        $html = '';

        foreach($genres as $genre)
        {
            $genrenaam = $genre['genre_name'];
            $label = "<label for=$genrenaam>$genrenaam</label>";
            $input = "<input id=$genrenaam type='checkbox'";

            $html = $html . $label . $input;
        } 
        
        return $html;
    }

    $filmlijst = getMovies($_GET['searchMessage']);

    $genrelijst = getGenres($_GET['searchMessage']);
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
                    <?=genresNaarHTML($genrelijst)?>
                </div>

                <div class="jaar">

                </div>

                <div class="regisseur">
                    
                </div>

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