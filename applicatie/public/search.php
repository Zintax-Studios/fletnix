<?php
    session_start();

    require("phpfunction/SQL_connection.php");
    require("shared/header.html");

    #region parameters
    //get parameters from search
    $searchInput = $_GET['searchMessage'];
    $jaarmin = $_GET['pubyearmin'];
    $jaarmax = $_GET['pubyearmax'];
    $regisseur = $_GET['reg'];

    $selectedGenres = [];
    #endregion

    //gets
    function getMovies($zoekwoord, $jaarmin, $jaarmax, $regisseur)
    {
        //hier moet ook genre toegevoegt worden aan de where
        global $dbh;

        $whereStatement = "";
        $command = "SELECT movie_id, title FROM Movie WHERE movie_id < 10000";

        //extra filters toevoegen op de command
        if(!empty($jaarmin)){
            $whereStatement = "$whereStatement AND YEAR(publication_year) > $jaarmin";
        }

        if(!empty($jaarmax)){
            $whereStatement = "$whereStatement AND YEAR(publication_year) < $jaarmax";
        }

        if(!empty($regisseur)){
            $whereStatement = "$whereStatement AND (p.firstname + ' ' + p.lastname) like '%$regisseur%'";
            //deze is kut, want query
        }

        if(!empty($zoekwoord)){
            $whereStatement = "$whereStatement AND m.title like '%$zoekwoord%'";
        }

        //remove first 'AND' from query to prevent error with where statement starting with "AND"
        if(!empty($whereStatement)){
            $whereStatement = (substr($whereStatement, 4));
        }

        //queryen
        $query = $dbh -> prepare("SELECT m.movie_id, m.title, (p.firstname + ' ' + p.lastname) FROM Movie_Director md join Movie m on md.movie_id = m.movie_id join Person p on md.person_id = p.person_id WHERE $whereStatement");

        var_dump($query);

        $query->execute();

        $result = $query->fetchALL();

        var_dump($result);

        //zoekwoord, jaarmin and jaarmax have been filtered
        //now filter regisseur and genre

        return $result;
    }

    //pas dit aan om de filmlijst te gebruiken in de plaats van get zoekwoord
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
        
            $link = 'product.php?id=' . $film['movie_id']; //:)
        
            $html = $html . "<div><a href=$link>" . $film['title'] . $image . "</a></div>";
        }        
        
        return $html;
    }  

    function genresNaarHTML($genres){
        $html = '';

        foreach($genres as $genre)
        {
            //label and input are connected via "for" and "id"
            $genrenaam = $genre['genre_name'];
            $label = "<label for=$genrenaam>$genrenaam</label>";
            $input = "<input type='checkbox' name='$genrenaam' id='$genrenaam'>";

            $html = $html . $label . $input;
        }
        
        return $html;
    }

    $filmlijst = getMovies($searchInput, $jaarmin, $jaarmax, $regisseur);

    //this needs to use the movie list instead of just the searchword
    $genrelijst = getGenres($searchInput);
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

            <form class="filterlist" action="search.php">
                <div class="genres">
                    <?=genresNaarHTML($genrelijst)?>
                </div>

                <div class="jaar">
                    <label for="pubyearmin">publicatie jaar minimum</label>
                    <input type="text" name="pubyearmin" id="pubyearmin">

                    <label for="pubyearmax">publicatie jaar maximum</label>
                    <input type="text" name="pubyearmax" id="pubyearmax">

                </div>

                <div class="regisseur">
                    <label for="reg">regisseur</label>
                    <input id="reg" name="reg" type="text">
                </div>

                <div class="search">
                    <input id="go" name="searchMessage" value=<?=$searchInput?>>
                </div>

                <input class="submitbutton" type="submit" value="filter">
            </form>
        </main>

        <footer>
            <div>
            </div>
        </footer>
    </body>
</php>