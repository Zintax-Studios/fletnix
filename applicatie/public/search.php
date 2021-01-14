<?php
    session_start();

    require("phpfunction/SQL_connection.php");
    require("shared/header.html");

    #region parameters
    //get parameters from search
    if(isset($_GET['searchMessage'])){
        $searchInput = $_GET['searchMessage'];
    }
    if(isset($_GET['pubyearmin'])){
        $jaarmin = $_GET['pubyearmin'];
    }
    if(isset($_GET['pubyearmax'])){
        $jaarmax = $_GET['pubyearmax'];
    }
    if(isset($_GET['reg'])){
        $regisseur = $_GET['reg'];
    }

    $selectedGenres = array();
    #endregion

    //get all selected genres
    if(isset($_GET['genre'])){
        foreach($_GET['genre'] as $value){
            $selectedGenres[] = $value;
        }
    }

    //gets
    function getMovies()
    {
        //hier moet ook genre toegevoegt worden aan de where
        global $dbh;

        global $searchInput;
        global $jaarmax;
        global $jaarmin;
        global $regisseur;
        global $selectedGenres;

        $whereStatement = "";

        //extra filters toevoegen op de command
        if(!empty($jaarmin)){
            $whereStatement = "$whereStatement AND publication_year > $jaarmin";
        }

        if(!empty($jaarmax)){
            $whereStatement = "$whereStatement AND publication_year < $jaarmax";
        }

        if(!empty($regisseur)){
            $whereStatement = "$whereStatement AND (p.firstname + ' ' + p.lastname) like '%$regisseur%'";
            //deze is kut, want query
        }

        if(!empty($searchInput)){
            $whereStatement = "$whereStatement AND m.title like '%$searchInput%'";
        }

        if(!empty($selectedGenres)){
            $list = '';
            foreach($selectedGenres as $genre){
                $list = "$list, '$genre'";
            }
            $list = substr($list, 2);
            $whereStatement = "$whereStatement AND m.movie_id IN (SELECT movie_id FROM Movie_Genre WHERE genre_name IN ($list))";
        }

        //remove first 'AND' from query to prevent error with where statement starting with "AND"
        if(!empty($whereStatement)){
            $whereStatement = (substr($whereStatement, 4));
        }

        //queryen
        $query = $dbh -> prepare("SELECT m.movie_id, m.title, (p.firstname + ' ' + p.lastname) FROM Movie_Director md join Movie m on md.movie_id = m.movie_id join Person p on md.person_id = p.person_id WHERE $whereStatement");

        $query->execute();

        $result = $query->fetchALL();

        return $result;
    }

    //pas dit aan om de filmlijst te gebruiken in de plaats van get zoekwoord
    function getGenres($lijst)
    {
        $list = array();

        foreach($lijst as $item){

            global $dbh;

            $current = $item['movie_id'];
            $query = $dbh -> prepare("SELECT mg.genre_name FROM movie m join Movie_Genre mg on m.movie_id = mg.movie_id where m.movie_id = $current group by genre_name");

            $query->execute();

            $result = $query->fetchALL();

            if(!empty($result)){
                foreach($result as $thing){
                    if(!in_array($thing, $list)){
                        $list[] = $thing;
                    }
                }
            }
        }

        return $list;
    }

    //tohtmls
    function filmsNaarHTMl($films) {
        $html = '';
        
        if(empty($films)){
            $html = 'Geen films gevonden! Controleer je spelling of probeer een ander zoekterm';
        }
        else{
            foreach($films as $film)
            {
                $image_src = 'images/cover3.jpg';
                $image = "<img src=$image_src alt='img'>";
            
                $link = 'product.php?id=' . $film['movie_id'];
            
                $html = $html . "<div><a href=$link>" . $film['title'] . $image . "</a></div>";
            } 
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
            $input = "<input type='checkbox' name='genre[]' value='$genrenaam'>";

            $html = $html . $label . $input;
        }
        
        return $html;
    }

    $filmlijst = getMovies();

    //this needs to use the movie list instead of just the searchword
    $genrelijst = getGenres($filmlijst);
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