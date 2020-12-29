<?php
    session_start();

    require_once("phpfunction/SQL_connection.php");

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
            $image = "<img src='$image_src' alt='img'>";

            $link = 'https://discord.gg/3SjzP4cj'; //:)

            $html = $html . "<div><a href=$link>" . $film['title'] . $image . "</a></div>";
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
            <!--Recent bekeken-->
            <div class ="filmlist">
                <?=filmsNaarHTMl($filmlijst)?>
            </div>

            <!--Willekeurige films-->

            <!--films met willekeurig genre #1-->

            <!--films met willekeurig genre #2-->

            <!--films met willekeurig genre #3-->
        </main>

        <footer>
            <div>
            </div>
        </footer>
    </body>

</html>