<?php
    session_start();

    require_once("phpfunction/SQL_connection.php");

    //returns array of movie info, idk i'm just trying shit out
    function getMovies()
    {
        global $dbh;

        $query = $dbh -> prepare('SELECT title FROM Movie WHERE movie_id < 1000 GROUP BY title');

        $query->execute();

        $result = $query->fetchALL();

        return $result;
    }

    $filmlijst = getMovies();

    function filmsNaarHTMl($films) {
        $html = '';

        foreach($films as $film)
        {
            $image_src = 'images/cover3.jpg';
            $image = "<img src=" . $image_src . " alt='img'>";
            $html = $html . "<div><a>" . $film['title'] . $image . "</a></div>";
        }        

        return $html;
    }
?>

<!DOCTYPE php>
<html lang="en">
    <head>
        <link rel="icon" href="images/logo.png">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Fletnix - Main</title>
        <link rel="stylesheet" href="CSS/index.css"/>
    </head>

    <body>
        <?php
            require("shared/header.html");
        ?>

        <main>
            <div class ="filmlist">
                <?=filmsNaarHTMl($filmlijst)?>
            </div>
        </main>

        <footer>
            <div>
            </div>
        </footer>
    </body>

</html>