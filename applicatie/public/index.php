<?php
    session_start();

    require_once("phpfunction/SQL_connection.php");

    //returns array of movie info, idk i'm just trying shit out
    function getMovies()
    {
        global $dbh;

        $query = $dbh -> prepare('SELECT title FROM Movie WHERE movie_id < 12 GROUP BY title');

        $query->execute();

        $result = $query->fetchALL();

        return $result;
    }

    function filmsNaarHTMl($films) {
        $html = ' ';
        foreach ($films as $film) {
            $html = $html . " " . $film['title'];
        }

        return $html;
    }

    $yes = filmsNaarHTMl(getMovies());
    //print($yes);

    //<h1> Film titel </h1>
?>

<!DOCTYPE php>
<html lang="en">
    <head>
        <link rel="icon" href="images/logo.png">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Fletnix - Main</title>
        <link rel="stylesheet" href="index.css"/>
    </head>

    <body>
        <?php
            require("shared/header.html");
        ?>

        <main style="color:gray;">
            <?=$yes?>
        </main>

        <footer>
            <div>
            </div>
        </footer>
    </body>

</html>